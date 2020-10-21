<?php 

require 'db_connection.php';

$sql = 'select word from words where user_id = :user_id and category_id = :cid';
// $stmt = $db->query($sql);
$stmt = $db->prepare($sql);
$stmt->bindValue('user_id',1,PDO::PARAM_INT);
$stmt->bindValue('cid',1,PDO::PARAM_INT);
$stmt->execute();

$result = $stmt->fetchall();

echo '<pre>';
var_dump($result);
echo '</pre>';