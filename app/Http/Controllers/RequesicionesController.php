<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Condicion;
use App\Models\Dependencia;
use App\Models\DetalleRequesicion;
use App\Models\Garantia;
use App\Models\Insumos_cucop;
use App\Models\Metodo;
use App\Models\Pais;
use App\Models\Partidas_cucop;
use App\Models\Requisicion;
use App\Models\Unidad_medida;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class RequesicionesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solopeticiones', ['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $requisiciones = Requisicion::where('estado', '1')->orderBy('id_requisicion', 'DESC');
        $limit = (isset($request->limit)) ? $request->limit : 5;

        if (isset($request->search)) {
            $requisiciones = $requisiciones->where('id_requisicion', 'like', '%' . $request->search . '%')
                ->orWhere('no_requesicion', 'like', '%' . $request->search . '%');
        }
        $requisiciones = $requisiciones->paginate($limit)->appends($request->all());
        return view('Requesiciones.index', compact('requisiciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dependenciaempleados = Dependencia::all();
        $areas  = Area::all();
        $condiciones  = Condicion::all();
        $garantias  = Garantia::all();
        $paises  = Pais::all();
        $partidas = Partidas_cucop::all();
        $unidades = Unidad_medida::all();
        $metodos = Metodo::all();

        return view('Requesiciones.create', compact(
            'dependenciaempleados',
            'areas',
            'garantias',
            'condiciones',
            'paises',
            'partidas',
            'unidades',
            'metodos',

        ));
    }

    public function fclaveCucop(Request $request)
{
    $partidaId = $request->input('nPartida');
    $data = Insumos_cucop::where('id_partida_especifica_id', $partidaId)->get();

    return response()->json($data);
}

    

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'area_id_area' => 'required',
            'fecha_elaboracion' => 'required',
            'fecha_requerida'  => 'required',
            'lugar_entrega'  => 'required',
            'otros_gravamientos'  => 'required',
            'total'  => 'required',
            'anexos'  => 'required',
            'aticipos'  => 'required',
            'existencia_almacen'  => 'required',
            'observaciones' => 'required',
            'registro_sanitario' => 'required',
            'capacitacion'  => 'required',
            'pais_id_pais'  => 'required',
            'metodos_id_metodos'  => 'required',
            'garantia_id_garantia'  => 'required',
            'pluralidad'  => 'required',
            'tiempo_fabricacion'  => 'required',
            'condicion_id_condicion'  => 'required',
            'detalles.*.num_partida' => 'required',
            'detalles.*.cucop' => 'required',
            'detalles.*.descripcion' => 'required',
            'detalles.*.cantidad' => 'required|numeric|min:1',
            'detalles.*.unidad_medida' => 'required',
            'detalles.*.precio' => 'required|numeric|min:0',
            'detalles.*.importe' => 'required|numeric|min:0',
        ]);

        $requisicion = Requisicion::create([

            'dependencia_id_dependencia' => $request->dependencia_id_dependencia,
            'area_id_area' => $request->area_id_area,
            'fecha_elaboracion' => $request->fecha_elaboracion,
            'no_requesicion' => $request->no_requesicion,
            'fecha_requerida' => $request->fecha_requerida,
            'lugar_entrega' => $request->lugar_entrega,
            'otros_gravamientos' => $request->otros_gravamientos,
            'total' => $request->total,
            'anexos' => $request->anexos,
            'aticipos' => $request->aticipos,
            'autorizacion_presupuesto' => $request->autorizacion_presupuesto,
            'existencia_almacen' => $request->existencia_almacen,
            'observaciones' => $request->observaciones,
            'registro_sanitario' => $request->registro_sanitario,
            'normas' => $request->normas,
            'capacitacion' => $request->capacitacion,
            'pais_id_pais' => $request->pais_id_pais,
            'metodos_id_metodos' => $request->metodos_id_metodos,
            'garantia_id_garantia' => $request->garantia_id_garantia,
            'porcentaje' => $request->porcentaje,
            'pluralidad' => $request->pluralidad,
            'penas_convencionales' => $request->penas_convencionales,
            'tiempo_fabricacion' => $request->tiempo_fabricacion,
            'condicion_id_condicion' => $request->condicion_id_condicion,
            'solicita' => $request->solicita,
            'autoriza' => $request->autoriza,
            'estado' => $request->estado,

        ]);


        if ($requisicion && $request->filled('detalles') && is_array($request->detalles)) {
            $requisicion_id = $requisicion->id_requisicion;

            $detalles = [];
            foreach ($request->detalles as $detalle) {
                $detalles[] = new DetalleRequesicion([
                    'requisicion_id' => $requisicion_id,
                    'num_partida' => $detalle['num_partida'],
                    'cucop' => $detalle['cucop'],
                    'descripcion' => $detalle['descripcion'],
                    'cantidad' => $detalle['cantidad'],
                    'unidad_medida' => $detalle['unidad_medida'],
                    'precio' => $detalle['precio'],
                    'importe' => $detalle['importe'],
                ]);
            }

            $requisicion->detalles()->saveMany($detalles);

            // Redirección a la lista de requisiciones después de guardar exitosamente
            return view('Requesiciones.formularios.subirarchivos');

        } else {
            return redirect()->back()->with('error', 'Hubo un error al crear la requisición. Por favor, inténtalo de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $requisicion = Requisicion::with('detalles')->where('id_requisicion', $id)->firstOrFail();

        return view('Requesiciones.show', compact('requisicion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        return view('Requesiciones.edit', compact('requisicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        $requisicion_id = $requisicion->id_requisicion;
        $requisicion = $this->createUpdateRol($request, $requisicion);
        return redirect()
            ->route('Requesiciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requisicion = Requisicion::findOrFail($id);
        try {
            $requisicion->delete();
            return redirect()
                ->route('Requesiciones.index');
        } catch (QueryException $e) {
            return redirect()
                ->route('Requesiciones.index');
        }
    }
}
