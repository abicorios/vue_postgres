<?php
$connect = new PDO('pgsql:host=localhost;port=5432;dbname=test;user=test;password=test');
function check_input($value){
    global $connect;
    if(preg_match('!\W|^$!',$value)){
        //Если в качестве id ввести # то на бэкенд приходит пустая строка
        //Полностью пустые строки фильтруются на фронте, чтобы не мешать редактировать id (очистка строки для редактирования это не ошибка)
        return 'sql injection';
    }
    if(preg_match('![a-zA-Z]!',$value)){
        return 'must be a number';
    }
    $tmp=$connect->query("select id from messages where id = $value limit 1")->fetch(PDO::FETCH_ASSOC);
    if(!$tmp){
        return 'invalid id';
    }
    if(preg_match('!^\d+$!',$value)){
        return 'ok';
    }
}
$id=$_GET['id'];
$check=check_input($id);
if($check!=='ok'){
    die(json_encode(['error'=>$check]));
}
$result = $connect->query("select message from messages where id = $id")->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);