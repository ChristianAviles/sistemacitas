<?php

namespace sistemacitas;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $table='citas';

    protected $primaryKey="idcitas";

    public $timestamps=false;

    protected $fillable =[
        'idclientes',
        'fecha',
        'descripcion',
        'estado'
    ];


    protected $guarded= [

    ];
}
