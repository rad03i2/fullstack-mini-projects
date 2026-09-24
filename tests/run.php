<?php
declare(strict_types=1);
$tmp=tempnam(sys_get_temp_dir(),'tb-'); define('APP_NAME','TaskBoard Mini'); define('DB_PATH',$tmp); require __DIR__.'/../task-board/bootstrap.php';
function ok(bool $condition,string $message): void { if(!$condition){fwrite(STDERR,"FAIL: $message\n"); exit(1);} echo "PASS: $message\n"; }
$db=db(); ok($db instanceof PDO,'database opens');
$db->prepare('INSERT INTO tasks(title,description,status,priority) VALUES(?,?,?,?)')->execute(['Arabic العربية','details','todo','high']);
$row=$db->query('SELECT * FROM tasks')->fetch(); ok($row['title']==='Arabic العربية','Unicode task persists'); ok($row['status']==='todo','status persists');
$failed=false; try{$db->exec("INSERT INTO tasks(title,status,priority) VALUES('x','invalid','low')");}catch(PDOException){$failed=true;} ok($failed,'invalid status rejected');
ok(e('<script>')==='&lt;script&gt;','HTML escaping works'); @unlink($tmp); echo "All tests passed.\n";
