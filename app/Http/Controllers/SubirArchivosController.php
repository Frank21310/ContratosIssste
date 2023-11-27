<?php

namespace App\Http\Controllers;

use App\Models\ArchivosRequisicion;
use App\Models\Requisicion;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubirArchivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solopeticiones', ['only' => ['index']]);
    }

    public function mostrarVistaConModal($requisicion_id) {
        return view('tu_vista', compact('requisicion_id'));
    }
    public function subir(Request $request, $requisicion_id)
    {
        // Puedes usar $requisicion_id para crear el registro en la base de datos
        // Guardar los archivos
        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $file) {
                // Guardar el archivo en S3
                $filePath = Storage::disk('s3')->put('ruta/archivos', $file);

                // Crear registro en la base de datos
                ArchivosRequisicion::create([
                    'requisicion_id' => $requisicion_id,
                    'name' => $request->name,
                    'image_path' => $filePath,
                ]);
            }
        }

        // Redirección o respuesta después de guardar exitosamente
        return view('Requesiciones.index');
    }

    public function create($requisicion_id)
    {
        // Puedes recuperar la requisición con el ID pasado
        $requisicion = Requisicion::find($requisicion_id);

        return view('upload-file', compact('requisicion'));
    }

    public function store(Request $request, $requisicion_id)
    {
        // Lógica para almacenar el archivo en S3 y guardar los detalles en la base de datos
        // Recupera la requisición utilizando el ID

        $file = new File();
        // Asigna los detalles del archivo y la asociación con la requisición
        // Guarda los detalles del archivo en la base de datos

        // Puedes mostrar una ventana emergente o redirigir a alguna vista después de guardar el archivo
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = ArchivosRequisicion::findOrFail($id);
            Storage::disk('s3')->delete($post->image_path);

            $post->delete();

            return redirect()->route('Requesiciones.index')
                ->with('success', 'Post eliminado correctamente!');
        } catch (\Exception $e) {

            return redirect()->route('Requesiciones.index')
                ->with('error', 'No se pudo eliminar el post. Error: ' . $e->getMessage());
        }
    }
}
