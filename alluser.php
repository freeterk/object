<?php
    error_reporting(E_ALL^E_NOTICE);
    include 'Ajax_Page.class.php';
    $pdo=new PDO("mysql:host=localhost;dbname=member","root","");
    $total=$pdo->query("select * from demo")->rowCount();
    $page=new Ajax_Page($total);
    $pdo->query("set names utf8");
    $sql="select * from demo".$page->limit;
    $result=$pdo->query($sql);
    $data=$result->fetchAll(PDO::FETCH_OBJ);
//    var_dump($data);
//    echo json_encode($data);
//    echo $page->display(array(0,1,2,3,4));
    $temp=[];
    $temp[0]=$data;
    $temp[1]=$page->display(array(0,1,2,3,4));
    echo json_encode($temp);
?>