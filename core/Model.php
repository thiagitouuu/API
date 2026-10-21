<?php

require_once __DIR__ . "/../config/Bd.php";

class Model {

    protected $pdo;

    public function __construct() {

        $this->pdo = Bd::conectar();
    }
}