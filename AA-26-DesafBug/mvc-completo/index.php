<?php
require_once __DIR__ . '/controller/TaskController.php';
$ctrl = new TaskController();
$action = $_GET['action'] ?? 'index';
if (!method_exists($ctrl, $action)) { http_response_code(404); exit('Not found'); }
$ctrl->$action();
