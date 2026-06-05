<?php
namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    protected $model = Dosen::class;

    public function definition(): array
    {
        return [
            'nidn' => $this->faker->unique()->numerify('##########'),
            'nama_dosen' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
