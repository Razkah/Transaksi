<?php

// Import class Faker
use Faker\Factory as Faker;

// Buat instance Faker
$faker = Faker::create();

// Menggunakan Faker untuk menghasilkan data palsu
echo $faker->name;
echo $faker->address;
echo $faker->text;
// dll.