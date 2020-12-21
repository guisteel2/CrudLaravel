<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class produto extends Model
{
    use HasFactory;
    protected $fillable = ['descricao','valor','categoria_id','foto_id','tipo_id','user_id',];


    public function foto(){  
        return $this->hasOne(foto::class, 'id','foto_id');
    }

    public function tipo(){
        return $this->hasOne(tipo::class, 'id','tipo_id');
    }

    public function categoria(){
        return $this->hasMany(categoria::class, 'id','categoria_id');
    }

}
