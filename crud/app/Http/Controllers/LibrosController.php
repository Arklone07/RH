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

/*     public function pdf()
    {
        
    } */

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
    public function show()
    {
        //
        $libros=new libros;
        $Libros=libros::all();
        $Categorias=categorias::all();
        $Datos['libros']=libros::paginate(5);
        return view('libros.pdf', $Datos, compact('Categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $libros=libros::find($id)->get();
        $libros=libros::findOrFail($id);
        $Categorias=categorias::all();
        
        return view('libros.edit', compact('Categorias'))->with('libros', $libros);
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

        $datosLibros = request()->except(['_token','_method']);

        
        $libros=libros::findOrFail($id);

        /* $libros->Categoria_id=$request->input('Categoria_id');
        $libros->Nombre=$request->input('Nombre'); */
        libros::where('id','=',$id)->update($datosLibros);

        $libros=libros::findOrFail($id);

        return redirect('libros')->with('mensaje','Libro modificado Ken');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $libros=libros::findOrFail($id);
        libros::destroy($id);
        return redirect('libros')->with('mensaje','Libro borrado, no era lo suficientemente bueno Ken');
    }
}
