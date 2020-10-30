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

$names = array(array("Raj",25,"1995-09-09"),array("Sumit",22,"1998-09-09"),array("Malik",23,"1997-09-09"));

$result = $mysqli -> query("SELECT * FROM customer WHERE first_name=".$first_name." AND last_name=".$last_name);
if($result){ 
    while($row = $result -> fetch_assoc()){
        $cust_id = $row["cust_id"];
    }
}
else{
    $amount = 0;
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
        $result5 = $mysqli -> query("SELECT * FROM food WHERE food_id='$food4'");
        while($row5 = $result5 -> fetch_assoc()){
        $amount += $row5["price"];
    }
    }
    $query1 = "INSERT INTO customer (first_name,last_name,amount,phone_number) VALUES ('$first_name','$last_name','$amount','$phone')";
    $result7 = $mysqli->query($query1);
    $cust_id = $mysqli->insert_id;
}


$val = rand(0,2);
$age = $names[$val][1];
$nameDel = $names[$val][0];
$DOB = $names[$val][2];
$query2 = "INSERT INTO delivery_boy(age,DOB,name,pin_code) VALUES ('$age','$DOB','$nameDel','$pin')";
$result8 = $mysqli->query($query2);
$del_id = $mysqli->insert_id;

$date1 = date("Y-m-d");
$receipt = rand(1,1000000);
if ($food4 == ''){
    $query3 = "INSERT INTO `order_name`(`date`,`amount`,`receipt_no`,`food_id1`,`food_id2`,`food_id3`,`food_id4`,`customer_id`) VALUES ('$date1','$amount','$receipt','$food1','$food2','$food3',NULL,'$cust_id')";
}else{
    $query3 = "INSERT INTO `order_name`(`date`,`amount`,`receipt_no`,`food_id1`,`food_id2`,`food_id3`,`food_id4`,`customer_id`) VALUES ('$date1','$amount','$receipt','$food1','$food2','$food3','$food4','$cust_id')";
}
$result9 = $mysqli->query($query3);
$order_id = $mysqli->insert_id;

$query4 = "INSERT INTO online(order_id,del_id) VALUES ('$order_id','$del_id')";
$result10 = $mysqli->query($query4);
?>