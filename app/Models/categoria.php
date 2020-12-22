<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $fillable = ['descricao',];

    public function gettipos(){
        return $this->hasOne(tipo::class, 'categoria_id','id');
    }
}
