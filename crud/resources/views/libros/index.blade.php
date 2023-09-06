@extends('layouts.app')

@section('content')
<div class="container">


    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('mensaje')}}
    </div>
    @endif

<a href="{{ url('libros/create')}}" class="btn btn-success"> Registrar nueva libro </a>
<a href="{{ url('libros/pdf')}}" class="btn btn-success"> Crear pdf </a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $Libro)
              
        <tr>
            <td>{{ $Libro->id}}</td>
            <td>{{ $Libro->Categoria_id}}</td>
            <td>{{ $Libro->Nombre}}</td>
            
            <td>

                <a href="{{ url('/libros/'.$Libro->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                
                 
                
                <form action="{{ url('/libros/'.$Libro->id)}}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar el registro?')" value="Borrar">
                </form>

            </td>
        </tr>
        {{-- @include('categorias.index') --}}
        @endforeach 
    </tbody>
</table>
{!! $libros->links() !!}  
</div>
@endsection