<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;
    protected $table='plantas';
    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'propiedades',
        'indicaciones',
        'comousar',
        'img',
        'original',
        'idcategoria',

    ];
    public static function consulta($filtro=null,$idcategoria=null){
        if ($idcategoria){
            return Planta::where('nombre','like',"%$filtro%")->where('idcategoria',$idcategoria)->orderBy('nombre')->get();
        }else{
            return Planta::where('nombre','like',"%$filtro%")->orderBy('nombre')->get();
        }
    }
    public static function alta($datos){

        $planta=Planta::create([
            'nombre'=>$datos['nombre'],
            'propiedades'=>$datos['propiedades'],
            'indicaciones'=>$datos['indicaciones'],
            'comousar'=>$datos['comousar'],
            'img'=>$datos['portada'],
            'original'=>'N',
            'idcategoria'=>$datos['idcategoria'],

        ]);
        return $planta;
    }

}

