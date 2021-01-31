<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model' => $this->faker->name,
            'manufacturer'=>$this->faker->name,
            'cost_in_credits'=>$this->faker->randomDigit, 
            'length'=>$this->faker->randomDigit, 
            'max_atmosphering_speed'=>$this->faker->randomDigit, 
            'crew'=>$this->faker->randomDigit, 
            'passengers'=>$this->faker->randomDigit, 
            'cargo_capacity'=>$this->faker->randomDigit,
            'consumables'=>$this->faker->randomDigit, 
            'vehicle_class'=>$this->faker->name, 
            'pilots'=>$this->faker->name, 
            'films'=>$this->faker->name,
            'created'=>now(), 
            'edited'=>now(), 
            'url'=>$this->faker->name, 
            
        ];
    }




}
