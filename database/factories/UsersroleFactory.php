<?php

namespace Database\Factories;

use App\Models\Usersrole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsersroleFactory extends Factory
{
    protected $model = Usersrole::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'rol' => $this->faker->name,
        ];
    }
}
