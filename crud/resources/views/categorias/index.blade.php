@extends('layouts.app')

@section('content')
<div class="container">


    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('mensaje')}}
    </div>
    @endif

<a href="{{ url('categorias/create')}}" class="btn btn-success"> Registrar nueva categoria </a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $Categoria)
              
        <tr>
            <td>{{ $Categoria->id}}</td>
            <td>{{ $Categoria->Nombre}}</td>
            
            <td>

                <a href="{{ url('/categorias/'.$Categoria->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                
                 
                
                <form action="{{ url('/categorias/'.$Categoria->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar el registro?')" value="Borrar">
                </form>

            </td>
        </tr>

        @endforeach 
    </tbody>
</table>
{!! $categorias->links() !!}  
</div>
@endsection