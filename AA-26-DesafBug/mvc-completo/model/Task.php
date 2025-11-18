<?php
require_once __DIR__ . '/../config.php';
class Task {
  private $pdo;
  public function __construct(){ $this->pdo = db(); }
  public function all(){
    return $this->pdo->query("SELECT id, descripcion, completada, fecha_creacion FROM tareas ORDER BY id DESC")->fetchAll();
  }
  public function create($desc){
    $st = $this->pdo->prepare("INSERT INTO tareas (descripcion, completada, fecha_creacion) VALUES (?, 0, NOW())");
    $st->execute([$desc]);
  }
  public function toggle($id, $done){
    $st = $this->pdo->prepare("UPDATE tareas SET completada=? WHERE id=?");
    $st->execute([$done ? 1 : 0, (int)$id]);
  }
  public function delete($id){
    $st = $this->pdo->prepare("DELETE FROM tareas WHERE id=?");
    $st->execute([(int)$id]);
  }
}