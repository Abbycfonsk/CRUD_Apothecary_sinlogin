<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>fake()->sentence(),
            'direccion'=>fake()->name(),
            'anio'=>fake()->year(),
            'sinopsis'=>fake()->text(),
            'img'=>'sinportada.jpg',
            'original'=>'N'
        ];
    }
}