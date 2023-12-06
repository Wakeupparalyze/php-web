<?php
namespace App;
use Opis\Database\Database;
use Opis\Database\Connection;

$connection = new Connection(
    'mysql:host=192.168.200.79;dbname=blog',
    'student',
    'student'
);

class OpisDatabase
{

}