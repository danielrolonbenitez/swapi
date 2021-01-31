<?php

namespace App\Http\Controllers;
use App\Models\Nave;
use Illuminate\Http\Request;

class NaveController extends Controller
{
    public function store($naves){
     $flag=0;
      if($naves!=null){ 
               for($i=0;$i<count($naves);$i++) {
                 foreach ($naves[$i] as $nave) {
                          //dd($nave);
                          $naveModel = new Nave();
                          $naveModel->name = $nave["name"];
                          $naveModel->model=$nave["model"]; 
                          $naveModel->manufacturer=$nave["manufacturer"];
                          $naveModel->cost_in_credits=$nave["cost_in_credits"]; 
                          $naveModel->length=$nave["length"]; 
                          $naveModel->max_atmosphering_speed=$nave["max_atmosphering_speed"]; 
                          $naveModel->crew=$nave["crew"]; 
                          $naveModel->passengers=$nave["passengers"]; 
                          $naveModel->cargo_capacity=$nave["cargo_capacity"];
                          $naveModel->consumables=$nave["consumables"]; 
                          $naveModel->hyperdrive_rating=$nave["hyperdrive_rating"];
                          $naveModel->MGLT=$nave["MGLT"]; 
                          $naveModel->starship_class=$nave["starship_class"]; 
                          $naveModel->pilots="pilots"; 
                          $naveModel->films="films";
                          $naveModel->created=$nave["created"]; 
                          $naveModel->edited=$nave["edited"]; 
                          $naveModel->url=$nave["url"];
                          if(!$naveModel->save()){ $flag=1;}
                          
                }
              }
             }
             
     return $flag;
    }



}
