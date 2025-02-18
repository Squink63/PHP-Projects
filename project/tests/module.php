<?php

include ("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

$faker = Faker::create();
echo $faker -> name;
echo "<br>";

Auth::check();
HTTP::redirect();

$mysql = new MySQL;
$mysql -> connect();

$table = new UsersTable;
$table -> insert();