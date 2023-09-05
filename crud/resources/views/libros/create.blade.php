@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/libros/') }}" method="post" enctype="multipart/form-data">
@csrf
@include('libros.form',['modo'=>'Crear libro'])
    
</form>
</div>
@endsection