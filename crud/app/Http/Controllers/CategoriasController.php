<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        //
        $Datos['categorias']=categorias::paginate(5);
        return view('categorias.index',$Datos); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categorias.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCategorias = request()->except('_token');

        categorias::insert($datosCategorias);

        return redirect('categorias')->with('mensaje','Categoria agregada con éxito, que bien te vez Ken');
    }

    /**
     * Display the specified resource.
     */
    public function show(categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categoria=categorias::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        //
        $datosCategorias = request()->except(['_token','_method']);

        $categoria=categorias::findOrFail($id);

        categorias::where('id','=',$id)->update($datosCategorias);
        $categoria=categorias::findOrFail($id);
        //return view('Empleado.edit', compact('empleado'));

        return redirect('categorias')->with('mensaje','Categoria modificado, no se ni para ken');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $categoria=categorias::findOrFail($id);
        categorias::destroy($id);
        return redirect('categorias')->with('mensaje','Categoria borrada, no necesitabamos kenpañol despues de todo');
    }
}
