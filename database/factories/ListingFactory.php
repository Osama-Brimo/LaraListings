<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $companyLogos = [
            'logos\1nqQJk8TRnoJJmcpD4V89iMUBU5e16K8aaJlVBWW.png',
            'logos\98HThzuT1x64gN6rrcBVOi7jI3DA0VozUzL8ENMn.png',
            'logos\RHrlCdgDvqpdYyTDWmNxY6TZKNQM7zCuxEsOLPdy.png',
            'logos\sIkgeX5zFOYV1J0l1QWZMEaTmTXCkrWRYywdyRoe.png',
            'logos\vSqvuqWp65LKZ652laObCbVLrM6Ln3FOBZv6bMaS.png',
            null
        ];
        return [
            'title' => fake()->jobTitle(),
            'tags' => implode(',', fake()->words(random_int(1, 5))),
            'company' => fake()->company(),
            'location' => fake()->country(),
            'email' => fake()->companyEmail(),
            'website' => fake()->domainName(),
            'desc' => fake()->paragraphs(5, true),
            'logo' => $companyLogos[array_rand($companyLogos)]
        ];
    }
}
