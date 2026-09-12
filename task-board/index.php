<?php
$tasks = [
    ['title' => 'Design homepage', 'status' => 'done'],
    ['title' => 'Build API route', 'status' => 'progress'],
    ['title' => 'Write README', 'status' => 'todo'],
];
function e(string $v): string { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Board</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <h1>Fullstack Task Board</h1>
    <section class="board">
        <?php foreach ($tasks as $task): ?>
            <article class="card">
                <strong><?= e($task['title']) ?></strong>
                <span><?= e($task['status']) ?></span>
            </article>
        <?php endforeach; ?>
    </section>
</main>
<script src="app.js"></script>
</body>
</html>
