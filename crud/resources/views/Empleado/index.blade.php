@extends('layouts.app')

@section('content')
<div class="container">


    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('mensaje')}}
    </div>
    @endif

<a href="{{ url('Empleado/create')}}" class="btn btn-success"> Registrar nuevo Ken </a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $Empleado)
              
        <tr>
            <td>{{ $Empleado->id}}</td>
            <td>{{ $Empleado->Nombre}}</td>
            <td>{{ $Empleado->ApellidoPaterno}}</td>
            <td>{{ $Empleado->ApellidoMaterno}}</td>
            <td>{{ $Empleado->Email}}</td>
            
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$Empleado->Imagen}}" width="100" alt="">
                
            </td>
            
            <td>

                <a href="{{ url('/Empleado/'.$Empleado->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                
                 
                
                <form action="{{ url('/Empleado/'.$Empleado->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar el registro?')" value="Borrar">
                </form>

            </td>
        </tr>

        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection