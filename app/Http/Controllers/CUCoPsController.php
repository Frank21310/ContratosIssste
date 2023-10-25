<?php

namespace App\Http\Controllers;

use App\Models\Cucops;
use App\Models\Insumos_cucop;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CUCoPsController extends Controller
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
        $CUCops = Insumos_cucop::select('*')->orderBy('clave_cucop', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;

        if (isset($request->search)) {
            $CUCops = $CUCops
                ->where('clave_cucop', 'like', '%' . $request->search . '%')
                ->orWhere('id_partida_especifica_id', 'like', '%' . $request->search . '%')
                ->orWhere('descripcion_insumo', 'like', '%' . $request->search . '%')
                ->orWhere('CABM', 'like', '%' . $request->search . '%')
                ->orWhere('tipo_contratacion', 'like', '%' . $request->search . '%');
        }
        $CUCops = $CUCops->paginate($limit)->appends($request->all());
        return view('CUCop.index', compact('CUCops'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
