<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Condicion;
use App\Models\Garantia;
use App\Models\Insumos_cucop;
use App\Models\Pais;
use App\Models\Partidas_cucop;
use App\Models\Requesicion;
use Illuminate\Http\Request;

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
    public function index()
    {

        return view('Requesiciones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas  = Area::all();
        $condiciones  = Condicion::all();
        $garantias  = Garantia::all();
        $paises  = Pais::all();

        $partidas = Partidas_cucop::all();


        $insumos = Insumos_cucop::all();


        return view('Requesiciones.create', compact(
            'areas',
            'garantias',
            'condiciones',
            'paises',
            'partidas',
            'insumos'
        ));
    }

    public function cargarInsumos( $id_partida)
    {
        $insumos = Insumos_cucop::where('id_partida', $id_partida)->get();

        return response()->json($insumos);
    }




    /*public function getinsumos($idpartidas) {
        $models = Insumos_cucop::where('id_partida_especifica_id' == $idpartidas)->get();
        $html = '<option value="">Seleccione un modelo</option>';

        foreach ($models as $model) {
            $html .= "<option value='{$model->cucop}'>{$model->descripcion_insumo}</option>";
        }

        return $html;
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requisicion = new Requesicion();
        $requisicion = $this->createUpdateRol($request, $requisicion);
        return redirect()
            ->route('Requesiciones.index3');
    }
    public function createUpdateRequisicion(Request $request, $requisicion)
    {
        $requisicion->dependencia_id_dependencia = $request->dependencia_id_dependencia;
        $requisicion->area_id_area = $request->area_id_area;
        $requisicion->fecha_elaboracion = $request->fecha_elaboracion;
        $requisicion->no_requesicion = $request->no_requesicion;
        $requisicion->fecha_requerida = $request->fecha_requerida;
        $requisicion->otros_gravamientos = $request->otros_gravamientos;
        $requisicion->total = $request->total;
        $requisicion->anexos = $request->anexos;
        $requisicion->aticipos = $request->aticipos;
        $requisicion->autorizacion_presupuesto = $request->autorizacion_presupuesto;
        $requisicion->existencia_almacen = $request->existencia_almacen;
        $requisicion->observaciones = $request->observaciones;
        $requisicion->registro_sanitario = $request->registro_sanitario;
        $requisicion->normas = $request->normas;
        $requisicion->capacitacion = $request->capacitacion;
        $requisicion->pais_id_pais = $request->pais_id_pais;
        $requisicion->metodos_id_metodos = $request->metodos_id_metodos;
        $requisicion->garantia_id_garantia = $request->garantia_id_garantia;
        $requisicion->porcentaje = $request->porcentaje;
        $requisicion->pluralidad = $request->pluralidad;
        $requisicion->penas_convencionales = $request->penas_convencionales;
        $requisicion->tiempo_fabricacion = $request->tiempo_fabricacion;
        $requisicion->condicion_id_condicion = $request->condicion_id_condicion;
        $requisicion->solicita = $request->solicita;
        $requisicion->autoriza = $request->autoriza;
        $requisicion->save();
        return  $requisicion;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
