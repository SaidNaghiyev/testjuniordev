<?php

function conMaker(){
    global $mysqli;
    $mysqli = new mysqli("fdb29.awardspace.net", "3753007_test1", "S@id2002", "3753007_test1") or die(mysqli_error($mysqli));
}

function getProductList(){
    global $mysqli;

    static $arr = array();
    if(count($arr) > 0) return $arr;
    $result = $mysqli->query("SELECT * FROM Products") or die($mysqli->error);
    
    while($row = $result->fetch_assoc()){
        $arr[] = array(
            "ID" => $row['ID'],
            "SKU" => $row['SKU'],
            "Name" => $row['Name'],
            "Price" =>  $row['Price'],
            "type_switcher_ID" => $row['type_switcher_ID'],
            "Weight" => $row['Weight'],
            "Size" => $row['Size'],
            "Length" => $row['Length'],
            "Height" => $row['Height'],
            "Width" => $row['Width']
        );
    }
    return $arr;
}

function getTypes(){
    global $mysqli;

    static $arr = array();
    if(count($arr) > 0) return $arr;
    $result = $mysqli->query("SELECT ID, Name FROM type_switchers") or die($mysqli->error);
    
    while($row = $result->fetch_assoc()){
        $arr[] = array(
            "ID" => $row['ID'],
            "Name" => $row['Name']
        );
    }
    return $arr;
}

function getTypeDetails(){
    global $mysqli;

    static $arr = array();
    if(count($arr) > 0) return $arr;
    $result = $mysqli->query("SELECT ID, type_switchers_id, Name, detail_key, Description FROM type_details") or die($mysqli->error);
    
    while($row = $result->fetch_assoc()){
        $arr[] = array(
            "ID" => $row['ID'],
            "type_switchers_id" => $row['type_switchers_id'],
            "detail_key" => $row['detail_key'],
            "Name" => $row['Name'],
            "Description" => $row['Description']
        );
    }
    return $arr;
}



?>