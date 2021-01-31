<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Nave;
use App\Models\Vehiculo;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    /** @test */
    public function validate_data_import(){
        $this->withoutExceptionHandling();
        $response = $this->get('/importar');
         $this->assertCount(36,Nave::all());
         $this->assertCount(39,Vehiculo::all());

    }
    
    /** @test */
    public function buscar_nave(){
        $this->withoutExceptionHandling();
        $response = $this->post('ajax/buscar',['name'=>'Death Star','tipo'=>'nave']);
         $response->assertStatus(200);
         $result=Nave::where('name','=','Death Star')->get();
         $this->assertJson($result,$response->getContent());
       

    }

    /** @test */
    public function buscar_vehiculo(){
        $this->withoutExceptionHandling();
        $response = $this->post('ajax/buscar',['name'=>'TIE bomber','tipo'=>'vehiculo']);
         $response->assertStatus(200);
         $result=Vehiculo::where('name','=','TIE bomber')->get();
         $this->assertJson($result,$response->getContent());
       

    }

     

      /** @test */
    public function agregar_transporte(){
        $this->withoutExceptionHandling();

        $response = $this->post('ajax/agregar-transporte',['name'=>'Death Star','tipo'=>'nave','cantidad'=>1]);
         $response->assertStatus(200);
          $cantidadNave=Nave::where('name','=','Death Star')->get();
         $cantidadNave=$cantidadNave->count();
         $cantidadNave+=1;
         $this->assertEquals(2,$cantidadNave);
       

    }






}
