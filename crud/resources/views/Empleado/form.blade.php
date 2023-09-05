
<h1> {{$modo}}</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
    </div>

    
    
@endif

<div class="form-group">
<label for="Nombre"> Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="Nombre"> 

</div>

<div class="form-group">

    <label for="ApellidoPaterno"> Apellido paterno</label>
    <input type="text" class="form-control" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno')}}" id="ApellidoPaterno"> 

</div>

<div class="form-group">

    <label for="ApellidoMaterno"> Apellido materno</label>
    <input type="text" class="form-control" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno')}}" id="ApellidoMaterno"> 

</div>

<div class="form-group">

    <label for="Email"> Correo</label>
    <input type="text" class="form-control" name="Email" value="{{ isset($empleado->Email)?$empleado->Email:old('Email')}}" id="Email"> 
    
</div>

<div class="form-group">

    <label for="Imagen"> Foto</label>
    <br>

    @if(isset($empleado->Imagen))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Imagen}}" width="150" alt="">
    @endif

    <input type="file" class="form-control" name="Imagen" value="" id="Imagen"> 

</div>    
<br>
    <input class="btn btn-success" type="submit" value="{{$modo}}"> 
    
    <a class="btn btn-primary" href="{{ url('Empleado/')}}"> Regresar </a>
    <br>