<?php

namespace Database\Seeders;

use App\Models\ProfileClinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileClinic::factory()->create([
            'name' => 'Rizqi Clinic',
            'address' => 'Palembang - South Sumatera',
            'phone' => '082176382416',
            'email' => 'tewollart@klinik.com',
            'doctor_name' => 'Dr. Tewoll',
            'unique_code' => uniqid(),
        ]);
    }
}
