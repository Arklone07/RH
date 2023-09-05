
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
    <input type="text" class="form-control" name="Nombre" value="{{ isset($libros->Nombre)?$libros->Nombre:old('Nombre') }}" id="Nombre"> 

</div>

<label for="Categoria_id"> Categoria</label>
    <select name="Categoria_id" class="form-control" {{-- value="{{ isset($libros->Nombre)?$libros->Nombre:old('Nombre') }}" --}} id="Categoria_id"> 
        @foreach($Categorias as $Categoria)
            <option value="{{$Categoria->id}}"> {{$Categoria->Nombre}}</option>
        @endforeach
    </select>
</div>
<br>
<br>
    <input class="btn btn-success" type="submit" value="{{$modo}}"> 
    
    <a class="btn btn-primary" href="{{ url('libros/')}}"> Regresar </a>
    <br>