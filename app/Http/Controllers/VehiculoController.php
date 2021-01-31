<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function store($vehiculos){
     $flag=0;
     if($vehiculos!=null){ 
               for($i=0;$i<count($vehiculos);$i++) {
                 foreach ($vehiculos[$i] as $vehiculo) {
                          $vehiculoModel = new Vehiculo();
                          $vehiculoModel->name = $vehiculo["name"];
                          $vehiculoModel->model=$vehiculo["model"]; 
                          $vehiculoModel->manufacturer=$vehiculo["manufacturer"];
                          $vehiculoModel->cost_in_credits=$vehiculo["cost_in_credits"]; 
                          $vehiculoModel->length=$vehiculo["length"]; 
                          $vehiculoModel->max_atmosphering_speed=$vehiculo["max_atmosphering_speed"]; 
                          $vehiculoModel->crew=$vehiculo["crew"]; 
                          $vehiculoModel->passengers=$vehiculo["passengers"]; 
                          $vehiculoModel->cargo_capacity=$vehiculo["cargo_capacity"];
                          $vehiculoModel->consumables=$vehiculo["consumables"]; 
                          $vehiculoModel->vehicle_class=$vehiculo["vehicle_class"]; 
                          $vehiculoModel->pilots="pilots"; 
                          $vehiculoModel->films="films";
                          $vehiculoModel->created=$vehiculo["created"]; 
                          $vehiculoModel->edited=$vehiculo["edited"]; 
                          $vehiculoModel->url=$vehiculo["url"];
                          if(!$vehiculoModel->save()){$flag=1;}
                }
              }
             }

       return $flag;
    }
}
