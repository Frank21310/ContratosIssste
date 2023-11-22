<?php

namespace App\Http\Controllers;

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

    public function index()
    {
        //
    }

    public function subir(Request $request)
    {
       try{
        $folder = "archivos";

        $post = new Post;
        $post ->name = $request->name;
        $post ->description = $request->description;
        $archivo_path = Storage::disk('s3')->put($folder, $request->archivo, 'public');

        $post->archivo_path = $archivo_path;
        $post->save();

       
        return redirect()->route('Requesiciones.index')->with('success', 'Archivos subidos correctamente.');

        }
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
