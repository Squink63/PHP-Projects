<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

$faker = Faker::create();

$table = new UsersTable(new MySQL);
for($i=0; $i < 20; $i++ ) {
    $name = $faker->name;

    $table->insert([
        "name" => $name,
        "email" => $faker->email,
        "phone" => $faker->phoneNumber,
        "address" => $faker->address,
        "password" => 'password',
    ]);

    echo "Added a new user: $name <br>";
}





