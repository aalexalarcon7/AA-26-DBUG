<?php
require_once __DIR__ . '/../model/Task.php';
class TaskController {
  private $m;
  public function __construct(){ $this->m = new Task(); }
  public function index(){
    $tasks = $this->m->all();
    require __DIR__ . '/../view/index.php';
  }
  public function store(){
    $d = trim($_POST['descripcion'] ?? '');
    if ($d !== '') $this->m->create($d);
    header('Location: index.php'); exit;
  }
  public function toggle(){
    $id = (int)($_GET['id'] ?? 0);
    $done = (int)($_GET['done'] ?? 0);
    $this->m->toggle($id, $done);
    header('Location: index.php'); exit;
  }
  public function destroy(){
    $id = (int)($_GET['id'] ?? 0);
    $this->m->delete($id);
    header('Location: index.php'); exit;
  }
}