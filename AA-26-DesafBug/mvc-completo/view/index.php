<!doctype html><html lang="es"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>ToDoList MVC (mini)</title>
<link rel="stylesheet" href="view/style.css">
</head><body>
<h1>ToDoList</h1>
<form class="add-form" action="index.php?action=store" method="post">
  <input name="descripcion" placeholder="Nueva tarea" required>
  <button>Agregar</button>
</form>
<ul class="todo">
<?php foreach($tasks as $t): ?>
  <li class="<?= $t['completada'] ? 'done' : '' ?>">
    <span><?= htmlspecialchars($t['descripcion'], ENT_QUOTES, 'UTF-8') ?></span>
    <div class="actions">
      <a href="index.php?action=toggle&id=<?= (int)$t['id'] ?>&done=<?= $t['completada']?0:1 ?>">
        <?= $t['completada']?'Desmarcar':'Completar' ?>
      </a>
      <a class="danger" href="index.php?action=destroy&id=<?= (int)$t['id'] ?>" onclick="return confirm('¿Eliminar?')">
        Eliminar
      </a>
    </div>
  </li>
<?php endforeach; ?>
</ul>
<script src="view/script.js"></script>
</body></html>
