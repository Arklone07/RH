@extends('layouts.app')

@section('content')
<div class="container">


    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('mensaje')}}
    </div>
    @endif
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $Libro)
                  
            <tr>
                <td>{{ $Libro->id}}</td>
                <td>{{ $Libro->Categoria_id}}</td>
                <td>{{ $Libro->Nombre}}</td>

            </tr>
            {{-- @include('categorias.index') --}}
            @endforeach 
        </tbody>
    </table>
    {!! $libros->links() !!}  
</div>
@endsection