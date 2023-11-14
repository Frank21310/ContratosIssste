<?php

namespace App\Http\Controllers;

use App\Models\DetalleRequesicion;
use Illuminate\Http\Request;
use App\Models\Requesicion;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $requisiciones = Requesicion::where('estado', '1')->orderBy('id_requisicion', 'DESC');
        $limit = (isset($request->limit)) ? $request->limit : 5;

        if (isset($request->search)) {
            $requisiciones = $requisiciones->where('id_requisicion', 'like', '%' . $request->search . '%')
                ->orWhere('no_requesicion', 'like', '%' . $request->search . '%');
        }
        $requisiciones = $requisiciones->paginate($limit)->appends($request->all());
        return view('SeguimientoRequisicion.index', compact('requisiciones'));
    }

    public function Updatedetalle(Request $request, $detalle)
    {
        if ($request->has('requisicion_id')) {
            $detalle->requisicion_id = $request->requisicion_id;
        }
    
        $detalle->num_partida = $request->num_partida;
        $detalle->cucop = $request->cucop;
        $detalle->descripcion = $request->descripcion;
        $detalle->cantidad = $request->cantidad;
        $detalle->unidad_medida = $request->unidad_medida;
        $detalle->precio = $request->precio;
        $detalle->importe = $request->importe;
    
        $detalle->save();
        return  $detalle;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $requisicion = Requesicion::where('id_requisicion', $id)->firstOrFail();
        return view('SeguimientoRequisicion.edit', compact('requisicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detalle = DetalleRequesicion::where('id', $id)->firstOrFail();

        $detalle = $this->Updatedetalle($request, $detalle);
        return redirect()->route('SeguimientoRequisicion.edit', ['id' => $detalle->requisicion_id]);
    }

}
