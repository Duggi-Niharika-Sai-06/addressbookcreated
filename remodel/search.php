


<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"addressbook")or die(mysql_error());
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone_number = $_POST['phone_number'];
$sql="SELECT firstname,lastname,phone_number,Address_Line_1,Address_Line_2,Address_Line_3,stage_code,email_id,alt_phone_number FROM addressbook WHERE firstname like '{$firstname}' or lastname like '{$lastname}' 
or phone_number like '{$phone_number}' ";
$raw_results = mysqli_query($con,$sql);

if (mysqli_num_rows($raw_results) > 0) {
  while ($row = mysqli_fetch_array($raw_results)) {
    echo $row['firstname']."   ".$row['lastname']."  ".$row['phone_number']."  ".$row['Address_Line_1']."  ".$row['Address_Line_2']."  ".$row['Address_Line_3']."  ".$row['stage_code']."  ".$row['email_id']."  ".$row['alt_phone_number'];
  }
}
else
{
   echo "No contact found<br><br>";
 }


?>


</html>

