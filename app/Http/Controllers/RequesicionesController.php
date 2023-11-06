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
use App\Models\Requesicion;
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
        $requisiciones = Requesicion::select('*')->orderBy('id_requisicion', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

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

        $partidaId  = $request->input('nPartida');
        $data = Insumos_cucop::where('id_partida_especifica_id', $partidaId)->get();
        $datacucopid  = $request->input('datacucop');

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'area_id_area' => 'required',
            'fecha_elaboracion' =>'required',
            'fecha_requerida'  =>'required',
            'lugar_entrega'  =>'required',
            'otros_gravamientos'  =>'required',
            'total'  => 'required',
            'anexos'  => 'required',
            'aticipos'  => 'required',
            'existencia_almacen'  =>'required',
            'observaciones' =>'required',
            'registro_sanitario' =>'required',
            'capacitacion'  =>'required',
            'pais_id_pais'  =>'required',
            'metodos_id_metodos'  =>'required',
            'garantia_id_garantia'  =>'required',
            'pluralidad'  =>'required',
            'tiempo_fabricacion'  =>'required',
            'condicion_id_condicion'  =>'required',

        ]);

        Requesicion::create($request->all());
        



        /*$requisicion = new Requesicion();
        /*$detallerequisicion = new DetalleRequesicion();*/
        /*$requisicion = $this->createUpdateRequisicion($request, $requisicion);
            return redirect()
            ->route('Requesiciones.index');*/
        /*$detallerequisicion = $this->createUpdateDetalleRequisicion($request, $detallerequisicion);
        return redirect()
            ->route('Requesiciones.index');*/
    }

    /*public function createUpdateDetalleRequisicion(Request $request, $detallerequisicion)
    {
        $detallerequisicion->requesicion_id_requesicion = $request->requesicion_id_requesicion;
        $detallerequisicion->num_partida = $request->num_partida;
        $detallerequisicion->cucop = $request->cucop;
        $detallerequisicion->descripcion = $request->descripcion;
        $detallerequisicion->cantidad = $request->cantidad;
        $detallerequisicion->unidad_medida = $request->unidad_medida;
        $detallerequisicion->precio = $request->precio;
        $detallerequisicion->importe = $request->importe;
        $detallerequisicion->save();
        return  $detallerequisicion;
    }

    public function createUpdateRequisicion(Request $request, $requisicion)
    {
        $requisicion->dependencia_id_dependencia = $request->input('dependencia_id_dependencia');
        $requisicion->area_id_area = $request->option('area_id_area');
        $requisicion->fecha_elaboracion = $request->fecha_elaboracion;
        $requisicion->no_requesicion = $request->no_requesicion;
        $requisicion->fecha_requerida = $request->fecha_requerida;
        $requisicion->lugar_entrega = $request->lugar_entrega;
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
    }*/

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $requisicion = Requesicion::where('id_requisicion', $id)->firstOrFail();
        return view('Requesiciones.show', compact('requisicion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $requisicion = Requesicion::where('id_requisicion', $id)->firstOrFail();
        return view('Requesiciones.edit', compact('requisicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requisicion = Requesicion::where('id_requisicion', $id)->firstOrFail();
        $requisicion = $this->createUpdateRol($request, $requisicion);
        return redirect()
            ->route('Requesiciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $requisicion = Requesicion::findOrFail($id);
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
