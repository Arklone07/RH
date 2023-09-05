<?php

namespace App\Http\Controllers;

use App\Models\libros;
use App\Models\categorias;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        //
        /* $Libros=libros::all();
        return view('libros.index',$Libros); */
        $Categorias=categorias::all();
        $Datos['libros']=libros::paginate(5);
        return view('libros.index',$Datos, compact('Categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $Categorias=categorias::all();
        return view('libros.create', compact('Categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $libros=new libros;
        $libros->Categoria_id=$request->input('Categoria_id');
        $libros->Nombre=$request->input('Nombre');
        $libros->save();
        return redirect('libros')->with('mensaje','Libro agregada con éxito, que bien se siente Ken');
    }

    /**
     * Display the specified resource.
     */
    public function show(libros $libros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libros $libros)
    {
        //
        $libros=new libros;
        $libros->Categoria_id=$request->input('Categoria_id');
        $libros->Nombre=$request->input('Nombre');
        $libros->save();
        return redirect('libros')->with('mensaje','Libro agregada con éxito, que bien se siente Ken');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libros $libros)
    {
        //
        $libros=new libros;
        $libros->Categoria_id=$request->input('Categoria_id');
        $libros->Nombre=$request->input('Nombre');
        $libros->save();
        return redirect('libros')->with('mensaje','Libro agregada con éxito, que bien se siente Ken');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libros $libros)
    {
        //
        $libros=new libros;
        $libros->Categoria_id=$request->input('Categoria_id');
        $libros->Nombre=$request->input('Nombre');
        $libros->save();
        return redirect('libros')->with('mensaje','Libro agregada con éxito, que bien se siente Ken');
    }
}
