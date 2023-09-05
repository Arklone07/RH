
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
    <input type="text" class="form-control" name="Nombre" value="{{ isset($categorias->Nombre)?$categorias->Nombre:old('Nombre') }}" id="Nombre"> 

</div>

<br>
    <input class="btn btn-success" type="submit" value="{{$modo}}"> 
    
    <a class="btn btn-primary" href="{{ url('categorias/')}}"> Regresar </a>
    <br>