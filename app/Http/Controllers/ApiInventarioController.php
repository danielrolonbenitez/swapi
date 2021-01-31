<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Nave;
use App\Models\Vehiculo;
use App\Http\Controllers\NaveController;
use App\Http\Controllers\VehiculoController;

class ApiInventarioController extends Controller
{
    protected $baseApiUrl;

  public function  __construct(){
    	$this->baseApiUrl='https://swapi.dev/api/';
  }


  public function index(){
       return view('layouts/layout');
  }


  public function baseApiUrl($resource,$page=null){
   	           
            if($page!=null){
                 $url=$this->baseApiUrl.$resource.'/?'.$page;
               }else{
                 $url=$this->baseApiUrl.$resource;
               } 
                
		   	   $dataApi=HTTP::get($url);
		   	   return $dataApi->json();

  }


  public function importarDatosApi(){
    Nave::truncate();
    Vehiculo::truncate();
  	$naves=$this->getResourceOfApi('starships');
    $vehiculos=$this->getResourceOfApi('vehicles');
    $navesController= new NaveController();
    $flag=$navesController->store($naves);
    $vehiculosController=new VehiculoController();
    $flag=$vehiculosController->store($vehiculos);

    
     if($flag==1){
                      return redirect()->route('home')->with('error',' error intente importar los datos nuevamente');
            }else{
                      return redirect()->route('home')->with('success','Los datos se importaron correctamente!');
                  }

  }


public function getResourceOfApi($tipo){
     
    $resource["next"]='';
    $resourceDatos=[];
    $i=0;
    while($i==0 || $resource["next"]!=null){
          $i++;
          $resource=$this->baseApiUrl($tipo,'page='.$i);
          $resourceDatos[]=$resource["results"];
    }
         return $resourceDatos;
}




public function verNaves(){
         $naves=Nave::all();
    	   return view('nave',compact('naves'));
}



public function buscarTransporte(Request $request){
        $tipo = $request->tipo;
        $nombre= $request->nombre;
        if($tipo=="nave"){
                          $result=Nave::where('name','=',$nombre)->get();
                         }

         if($tipo=="vehiculo"){
                          $result=Vehiculo::where('name','=',$nombre)->get();
                          
         }
   
    return response()->json($result);
}


public function agregarTransporte(Request $request){
       $tipo = $request->tipo;
       $nombre= $request->nombre;
       $cantidad=$request->cantidad;
        if($tipo=="nave"){
                          Nave::factory()->count($cantidad)->create(['name'=>$nombre]);
                          }

        if($tipo=="vehiculo"){
                             Vehiculo::factory()->count($cantidad)->create(['name'=>$nombre]);
                            }

        $result=array('cantidad' =>$cantidad,'nombre'=>$nombre);
        return response()->json($result);
}



public function eliminarTransporte(Request $request){
       $tipo = $request->tipo;
       $nombre= $request->nombre;
       $cantidad=$request->cantidad;
        if($tipo=="nave"){
                          $deleteNave = Nave::where('name','=',$nombre)->take($cantidad)->get();

                            foreach($deleteNave as $borrar){
                                        Nave::where('id',$borrar->id)->delete();
                                    }
                           
        }

        if($tipo=="vehiculo"){
                          $deleteUs = Vehiculo::where('name','=',$nombre)->take($cantidad)->get();

                            foreach($deleteUs as $deleteMe){
                                        Vehiculo::where('id',$deleteMe->id)->delete();
                                    }
                           
        }



     $result=array('cantidad' =>$cantidad,'nombre'=>$nombre);
     return response()->json($result);

}


 public function verVehiculos(){
         $vehiculos=Vehiculo::all();
         return view('vehiculo',compact('vehiculos'));
}






}
