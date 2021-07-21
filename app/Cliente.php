<?php

namespace sistemacitas;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    protected $primaryKey="idclientes";

    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'contacto',
        'celular',
        'telefono',
        'direccion',
        'email',
        'kilometraje',
        'estado'
    ];


    protected $guarded= [

    ];
}
