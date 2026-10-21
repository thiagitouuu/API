<?php
// models/Producto.php

require_once __DIR__ . "/../core/Model.php";

class Producto extends Model {

    public function getAll() {
        $sql = "SELECT * FROM productos";
        $resultado = $this->pdo->query($sql);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nombre, $descripcion, $precio, $imagen) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) 
                VALUES (:nombre, :descripcion, :precio, :imagen)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "imagen" => $imagen
        ]);
    }

    public function update($id, $datos) {
        $sql = "UPDATE productos 
                SET nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            "nombre" => $datos["nombre"],
            "descripcion" => $datos["descripcion"],
            "precio" => $datos["precio"],
            "imagen" => $datos["imagen"],
            "id" => $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(["id" => $id]);
    }
}