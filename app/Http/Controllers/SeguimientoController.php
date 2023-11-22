<?php

namespace App\Http\Controllers;

use App\Models\DetalleRequesicion;
use App\Models\Insumos_cucop;
use App\Models\Partidas_cucop;
use Illuminate\Http\Request;
use App\Models\Requesicion;
use App\Models\Requisicion;
use App\Models\Unidad_medida;
use Database\Seeders\PartidaSeeder;
use Illuminate\Database\QueryException;


class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
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
        $unidades = Unidad_medida::all();

        $partidas = Partidas_cucop::all();
        $cucops = Insumos_cucop::all();
        $requisicion = Requisicion::where('id_requisicion', $id)->firstOrFail();
        return view('SeguimientoRequisicion.edit', compact('requisicion', 'partidas','cucops','unidades'));
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

    public function destroy(string $id)
    {
        $detalle = DetalleRequesicion::findOrFail($id);
        try {
            $detalle->delete();
            return redirect()->route('SeguimientoRequisicion.edit', ['id' => $detalle->requisicion_id]);
        } catch (QueryException $e) {
            return redirect()->route('SeguimientoRequisicion.edit', ['id' => $detalle->requisicion_id]);
        }
    }

}
