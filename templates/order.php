<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food</title>
    <link rel="stylesheet" type="text/css" href="../static/css/style.css">
    <link rel="stylesheet" type="text/css" href="../static/css/order.css">

  </head>
<body>
    <header>
        <div class="container nav1">
          <div class="logo">
            <img src="../static/images/logo2.png">
            </div>
          <ul>
          <li><a href="index.html">HOME</a></li>
          <li><a href="order.php" class="current">ORDER</a></li>
          <li><a href="about.html">ABOUT US</a></li>
         </ul>
         </div>
         </header>

<div>
  <h3> Order your food now,we will deliver it to your doorstep!</h3>
<form action="../src/confirm.php" method="post">
<?php
$mysqli = new mysqli("localhost","root","","restaurant");
$result = $mysqli -> query("SELECT * FROM food");
echo "<table>";
echo "<tr>";
echo "<td class='clr'>Select Food 1:</td>";
echo "<td>";
echo "<select name='food1' class='food'>";
echo "<option value='none'>Not Selected</option>";
if ($result) {
  while($row = $result->fetch_assoc()) {
    echo "<option value=".$row['food_id']."  >".$row['name']." ,Price:".$row['price']."</option>";
  }

}
else {
  echo mysql_error();
}
echo "</select>";
echo "</td>";
echo "</tr>";

$result1 = $mysqli -> query("SELECT * FROM food");
echo "<tr>";
echo "<td class='clr'>Select Food 2:</td>";
echo "<td>";
echo "<select name='food2' class='food'>";
echo "<option value='none'>Not Selected</option>";
if ($result1) {
  while($row1 = $result1->fetch_assoc()) {
    echo "<option value=".$row1['food_id']."  >".$row1['name']." ,Price:".$row1['price']."</option>";
  }

}
else {
  echo mysql_error();
}
echo "</select>";
echo "</td>";
echo "</tr>";

$result2 = $mysqli -> query("SELECT * FROM food");
echo "<tr>";
echo "<td class='clr'>Select Food 3:</td>";
echo "<td>";
echo "<select name='food3' class='food'>";
echo "<option value='none'>Not Selected</option>";
if ($result2) {
  while($row2 = $result2->fetch_assoc()) {
    echo "<option value=".$row2['food_id']."  >".$row2['name']." ,Price:".$row2['price']."</option>";
  }

}
else {
  echo mysql_error();
}
echo "</select>";
echo "</td>";
echo "</tr>";

$result3 = $mysqli -> query("SELECT * FROM food");
echo "<tr>";
echo "<td class='clr'>Select Food 4:</td>";
echo "<td>";
echo "<select name='food4' class='food'>";
echo "<option value='none'>Not Selected</option>";
if ($result3) {
  while($row3 = $result3->fetch_assoc()) {
    echo "<option value=".$row3['food_id']."  >".$row3['name']." ,Price:".$row3['price']."</option>";
  }

}
else {
  echo mysql_error();
}
echo "</select>";
echo "</td>";
echo "</tr>";

echo"</table>";
$mysqli -> close();
?>
<button type="submit">Submit</button>
</form>
</div>

         <footer class="main-footer">
            <section>
              <div class="section">
                <h2>Contact Us</h2>
                <div class="footer-headline">Tell us a little about yourself, and we'll be in touch right away  </div>
      
            <div class="footer-form">
             <form action="/action_page.php">
              <table>
                <tr>
             <td><label for="Name">Name:</label></td>
               <td><input type="text" placeholder="Your Name..." required /></td>
               </tr>
               <tr>
                 <td><label for="Email">Email:</label></td>
               <td><input type="email" placeholder="Your Email..." required /></td>
               </tr>
               <tr>
               <td><label for="Contact">Contact No:</label></td>
               <td><input type="number" placeholder="Your Contact No..." required/></td>
               </tr>
               <tr>
               <td><label for="Comment">Comments: </label></td>
               <td><textarea name="message" placeholder="Your Comments " rows="2" required></textarea></td>
                </tr>
              </table>
              </form>
               </div>
            </div>
            </section>
            </div>
          </footer>
          <div class="sub-footer">
            <a href="#"><img src="../static/images/insta.jpg" /></a>
            <a href="#"><img src="../static/images/facebook.png" /></a>
          </div>
</body>
</html>