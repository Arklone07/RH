@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/categorias/'.$categoria->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('categorias.form',['modo'=>'Actualizar categoria'])

</form>
</div>
@endsection