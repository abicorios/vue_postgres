<?php
$connect = new PDO('pgsql:host=localhost;port=5432;dbname=test;user=test;password=test');
$result = $connect->query('select message from messages where id = 1;')->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);
