<?php

//session_start();

require 'generalFunctions.php';
conMaker();
if(isset($_POST['save'])){
    $SKU = $_POST['SKU'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type_switcher_ID = $_POST['typeSwitcher'];
    $Size = $_POST['Size'];
    $Weight = $_POST['Weight'];
    $Height = $_POST['Height'];
    $Width = $_POST['Width'];
    $Length = $_POST['Length'];
    
    $mysqli->query("INSERT INTO Products (SKU, Name, Price, type_switcher_ID, Size, Weight, Height, Width, Length) "
            . "VALUES('$SKU', '$name', '$price', '$type_switcher_ID', '$Size', '$Weight', '$Height', '$Width', '$Length')") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM Products WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: index.php");
}

if(isset($_POST['deleteall'])){
    
    $cnt=array();
    $cnt=count($_POST['checkbox']);
    for($i=0;$i<$cnt;$i++)
    {
        $del_id=$_POST['checkbox'][$i];
        $query="DELETE FROM Products WHERE id=$del_id";
        $mysqli->query($query);
    }
    
    header("location: index.php");
}


?>