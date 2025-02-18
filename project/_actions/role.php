<?php

include("../vendor/autoload.php");
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$id = $_GET['id'];
$role_id = $_GET['role'];

$table = new UsersTable(new MySQL);
$table->changeRole($id, $role_id);

HTTP::redirect("/admin.php");