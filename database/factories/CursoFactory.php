<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CursoFactory extends Factory
{
    protected $model = Curso::class;

    public function definition()
    {
        return [
			'imagen' => $this->faker->name,
			'titulo' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'profesor' => $this->faker->name,
        ];
    }
}
