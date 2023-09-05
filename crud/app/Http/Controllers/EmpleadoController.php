<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Datos['empleados']=Empleado::paginate(5);
        return view('Empleado.index',$Datos); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Empleado.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Email'=>'required|email',
            'Imagen'=>'required|max:10000|mimes:jpeg,png,jpg,webp',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token');

        if($request->hasFile('Imagen')){
            $datosEmpleado['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

        Empleado::insert($datosEmpleado);

        return redirect('Empleado')->with('mensaje','Empleado agregado con éxito, otro ken a la lista');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('Empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Email'=>'required|email',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('Imagen')){
            $campos=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg,webp'];
            $mensaje=['Imagen.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);

        //
        $datosEmpleado = request()->except(['_token','_method']);

        if($request->hasFile('Imagen')){

            $empleado=Empleado::findOrFail($id);

            Storage::delete('public/'.$empleado->Imagen);

            $datosEmpleado['Imagen']=$request->file('Imagen')->store('uploads','public');
        }

        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);
        //return view('Empleado.edit', compact('empleado'));

        return redirect('Empleado')->with('mensaje','Ken modificado, que bien');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);

        if(storage::delete('public/'.$empleado->Imagen)){
            Empleado::destroy($id);
        }

        
        return redirect('Empleado')->with('mensaje','Empleado borrado, un ken menos...');
    }
}
