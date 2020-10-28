<?php
$mysqli = new mysqli("localhost","root","","restaurant");
$first_name=$_POST["first-name"];
$last_name=$_POST["last-name"];
$phone=$_POST["phone"];
$pin=$_POST["pin"];
$food1=$_POST["food1"];
$food2=$_POST["food2"];
$food3=$_POST["food3"];
$food4=$_POST["food4"];
$cust_id = 0;

$result = $mysqli -> query("SELECT * FROM customer WHERE first_name=".$first_name."AND last_name=".$last_name);
if($result){ 
    while($row = $result -> fetch_assoc()){
        $cust_id = $row["cust_id"];
    }
}
else{
    $amount = 0;
    $cust_id = uniqid();
    if($food1 != 'none'){
        $result2 = $mysqli -> query("SELECT * FROM food WHERE food_id='$food1'");
        while($row2 = $result2 -> fetch_assoc()){
        $amount += $row2["price"];
    }
    }
    if($food2 != 'none'){
        $result3 = $mysqli -> query("SELECT * FROM food WHERE food_id='$food2'");
        while($row3 = $result3 -> fetch_assoc()){
        $amount += $row3["price"];
    }
    }
    if($food3 != 'none'){
        $result4 = $mysqli -> query("SELECT * FROM food WHERE food_id='$food3'");
        while($row4 = $result4 -> fetch_assoc()){
        $amount += $row4["price"];
    }
    }
    if($food4 != 'none'){
        $result5 = $mysqli -> query("SELECT * FROM food WHERE food_id='$food5'");
        while($row5 = $result5 -> fetch_assoc()){
        $amount += $row5["price"];
    }
    }
    $query1 = "INSERT INTO customer (cust_id,first_name,last_name,amount,phone_number) VALUES ('$cust_id','$first_name','$last_name','$amount','$phone')";

    $result7 = $mysqli->query($query1);
}
?>