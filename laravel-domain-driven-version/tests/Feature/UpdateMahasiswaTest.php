<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class UpdateMahasiswaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_mahasiswa_update_data(): void
    {
        $faker = Faker::create();

        $headers = [
            'Authorization' => 'Bearer ' . $this->getAuthToken(),
            'Accept' => 'application/json',
        ];

        $response = $this->putJson('/api/mahasiswa', [
            // $response = $this->putJson('/api/mahasiswa/4', [
            'nim' => '12345678',
            'nama' => $faker->name(),
            'tanggal_lahir' => $faker->date(),
            'no_telepon' => '081373646',
            'foto_profile' => 'test.png',
            'list_kesukaan' => ["testdoang", "teslagi"],
            'alamat' => $faker->address(),
            'latitude' => '1234567890',
            'longitude' => '0987654321',
        ], $headers);

        dump($response->json());

        $response->assertStatus(200);
    }

    public function getAuthToken(): string
    {
        // $response = $this->postJson('/api/admin/login', [
        //     'email' => 'oskhar@gmail.com',
        //     'password' => '123456'
        // ]);

        $response = $this->postJson('/api/mahasiswa/login', [
            'nim' => '12345678',
            'password' => '12345678'
        ]);

        dump($response->json());

        $response->assertStatus(200);

        $data = $response->json();

        return $data['success']['token'];
    }
}
