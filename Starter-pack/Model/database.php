<?php
function database() {
    $dsn = 'mysql:dbname=mvc;host=db';
    $user = 'root';
    $password = 'KWmuLNjpzseXcTUNcnpz';
    $pdo = new PDO($dsn, $user, $password);

    return $pdo;
}