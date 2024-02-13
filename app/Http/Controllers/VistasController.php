<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Planta;
use Illuminate\Http\Request;

class VistasController extends Controller
{
    public function inicio(){
    $datos['pagina']='Plantas Medicinales';
    return view('inicio')->with($datos);
    }
    public function alta(){
    $datos['categorias']=Categoria::consulta();
    $datos['pagina']='Alta de Planta Medicinal';
    return view('planta-alta')->with($datos);
    }
    public function plantas(){
    $datos=request()->all();
    $datos['plantas']=Planta::consulta($datos['filtro'] ?? null, $datos['idcategoria'] ?? null);
    $datos['categorias']=Categoria::consulta();
    $datos['pagina']='Lista de Plantas Medicinales';
    return view('plantas')->with($datos);
    }
    public function planta($id){
    $datos['planta']=Planta::find($id);
       //dd(Categoria::find($datos['pelicula']->idcategoria)->nombre);
    $datos['categoria'] = Categoria::find($datos['planta']->idcategoria)->nombre;
    $datos['pagina']='Detalle de Planta Medicinal';
    $datos['planta']=Planta::find($id);
    //dd($datos);
    return view('planta')->with($datos);
    }
    public function mantenimiento(Planta $planta){
        $datos['categorias']=Categoria::consulta();
        $datos['pagina']='Modificación y baja de Planta Medicinal';
        $datos['planta']=$planta;
        return view('planta-mto')->with($datos);
    }

}
