<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cadastro>
 */
class CadastroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'codigo' => $this->faker->unique()->postcode(),
            'descricao' => $this->faker->unique()->address(),
            'valor' => $this->faker->unique()->latitude(),
            'url_imagem' => $this->faker->imageUrl,
            //  'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
