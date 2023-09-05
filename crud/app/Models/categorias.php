<?php

namespace App\Models;

use App\Models\libros;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    protected $table='categorias';
    protected $primaryKey='id';
    protected $fillable=['Nombre', 'Categoria_id'];
    public $timestamps=false;

    public function libros(){
        return $this->hasMany('App\models\Libro', 'Categoria_id', 'id');
    }
}
