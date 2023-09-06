<?php

namespace App\Models;

use App\Models\categorias;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    use HasFactory;

    protected $table='Libros';
    protected $primaryKey='id';
    protected $fillable=['Categoria_id', 'Nombre'];
    public $timestamps=false;

    public function categorias(){
        return $this->hasOne(Categorias::class,'id','Categoria_id');
    }
}
