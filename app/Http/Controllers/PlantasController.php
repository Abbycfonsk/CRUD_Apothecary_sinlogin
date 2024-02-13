<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Planta;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PlantasController extends Controller
{
    public function alta (Request $request){
        $datos=request()->all();
        $imagen=$request->file('portada');

        $rules=array(
            'nombre'=>'required|unique:peliculas,titulo',
            'propiedades'=>'required',
            'indicaciones'=>'required',
            'comousar'=>'required',
            'portada'=>'image|mimes:jpg,jpeg,png|max:300',
            'idcategoria'=>'required'
        );

        $validator=Validator::make($datos,$rules,[
            'indicaciones.required'=>'Indicaciones es obligatorio',
            'idcategoria.required'=>'Es obligatorio seleccionar una parte de la Planta',
            'comousar.required'=>'Como se usa es obligatorio',

        ]);
        if ($validator->fails()){
            return redirect()->route('vista.alta')->withErrors($validator)->withInput();

        }
        if($imagen){
          $nombreArchivo=$imagen->getClientOriginalName();
          Storage::putFileAs("",$imagen,$nombreArchivo);
          $datos['portada']=$nombreArchivo;
        }else{
            $datos['portada']='sinportada.jpg';
        }

        $datos['planta']=Planta::alta($datos);
        $datos['categorias']=Categoria::consulta();
        $datos['mensaje']='Alta de planta efectuada';
        return view('planta-alta')->with($datos);
    }
    public function consultaPlantas(){
        $datos['plantas']=Planta::consulta();
        $datos['pagina']='Lista de plantas';
        return view('plantas')->with($datos);
    }

    public function modificacion(Request $request, Planta $planta){
        $datos=request()->all();
        $archivo=$request->file('portada');

            $request->validate([
                'nombre'=>['required', Rule::unique('plantas')->ignore($planta->id,'id')],
                'propiedades'=>['required'],
                'indicaciones'=>['required'],
                'comousar'=>['required'],
                'portada'=>['image', 'mimes:jpg,jpeg,png', 'max:300'],
                'idcategoria'=>['required']
            ]);
            if($archivo){
                $nombreArchivo=$archivo->getClientOriginalName();
                Storage::putFileAs("",$archivo,$nombreArchivo);
                $datos['portada']=$nombreArchivo;
                $pelicula['img']=$datos['portada'];

            }else{
                  $datos['portada']='sinportada.jpg';
            }
            $planta['idcategoria']=$datos['idcategoria'];
           //dd($pelicula['idcategoria']);
            $planta->update($datos);
            //dd($pelicula);
        try{
            if (!$planta->getChanges()){
                throw new Exception('No se han modificado datos de la planta');
            }
            if ($planta->getChanges()|| $planta['img']=$nombreArchivo){
                throw new Exception('Modificación efectuada');
            }

        }catch (Exception $e){
            $datos['mensajes']=$e->getMessage();
        }
            $datos['categorias']=Categoria::consulta();
            $datos['planta']=$planta;
            $datos['pagina']='Modificación y baja de planta';
            return view('planta-mto')->with ($datos);

    }
    public function baja(Planta $planta){

        $deleted=$planta->delete();
        if($deleted && $planta->img != 'sinportada.jpg'){
            unlink(public_path("img/$planta->img"));
        }
        return redirect()->route("vista.plantas");
    }
}
