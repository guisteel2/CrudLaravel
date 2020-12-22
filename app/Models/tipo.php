<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id','descricao',];

    public function getcategorias(){
        return $this->hasMany(categoria::class, 'id','categoria_id');
    }
    
}
