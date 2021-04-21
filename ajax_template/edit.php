<?php 

$connection = new mysqli('localhost', 'root', '', 'ajax');


$name =$_POST['name'];
$email =$_POST['email'];
$cell =$_POST['cell'];
$username =$_POST['username'];

$id = $_POST['update_id'];

$connection->query("UPDATE students SET name='$name', email='$email', cell='$cell', username='$username' WHERE id='$id' ");



?>