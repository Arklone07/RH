@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/Empleado') }}" method="post" enctype="multipart/form-data">
@csrf
@include('Empleado.form',['modo'=>'Crear Ken'])
    
</form>
</div>
@endsection