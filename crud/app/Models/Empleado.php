<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function libros(){
        return $this->hasMany('App\models\Libro', 'Empleado_id', 'id');
    }
}
