<?php
declare(strict_types=1);
if(!defined('APP_NAME')) define('APP_NAME','TaskBoard Mini');
if(!defined('DB_PATH')) define('DB_PATH',__DIR__.'/../data/tasks.sqlite');
function db(): PDO { static $db; if ($db) return $db; $dir=dirname(DB_PATH); if(!is_dir($dir)) mkdir($dir,0775,true); $db=new PDO('sqlite:'.DB_PATH,null,null,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); $db->exec('CREATE TABLE IF NOT EXISTS tasks (id INTEGER PRIMARY KEY AUTOINCREMENT,title TEXT NOT NULL CHECK(length(title) BETWEEN 1 AND 120),description TEXT NOT NULL DEFAULT "",status TEXT NOT NULL DEFAULT "todo" CHECK(status IN ("todo","progress","done")),priority TEXT NOT NULL DEFAULT "medium" CHECK(priority IN ("low","medium","high")),created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP)'); return $db; }
function e(string $v): string { return htmlspecialchars($v,ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8'); }
function csrf(): string { if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function verify_csrf(): void { if(!hash_equals($_SESSION['csrf']??'',(string)($_POST['csrf']??''))) { http_response_code(403); exit('Invalid CSRF token'); } }
function redirect_home(): never { header('Location: index.php'); exit; }
function input(string $key,int $max=120): string { $v=trim((string)($_POST[$key]??'')); return mb_substr($v,0,$max); }
