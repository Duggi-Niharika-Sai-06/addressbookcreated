
<html>
  <head>
    <script src="js/jquery-1.11.2.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>My Address book</title>
  </head>
  <body>
  
<?php
include 'dbconnect.php';

if(isset($_POST['submit'])){
  $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
  $number = mysqli_real_escape_string($conn,$_POST['phone_number']);
  $Address_Line_1 = mysqli_real_escape_string($conn,$_POST['Address_Line_1']);
  $Address_Line_2 = mysqli_real_escape_string($conn,$_POST['Address_Line_2']);
  $Address_Line_3 = mysqli_real_escape_string($conn,$_POST['Address_Line_3']);
  $stage_code = mysqli_real_escape_string($conn,$_POST['stage_code']);
  $email_id = mysqli_real_escape_string($conn,$_POST['email_id']);
  $alt_phone_number = mysqli_real_escape_string($conn,$_POST['alt_phone_number']);

$query = "INSERT INTO addressbook(firstname,lastname,phone_number,Address_Line_1,Address_Line_2,Address_Line_3,stage_code,email_id,alt_phone_number) VALUES('$firstname','$lastname','$number','$Address_Line_1','$Address_Line_2','$Address_Line_3','$stage_code','$email_id','$alt_phone_number')";

if(mysqli_query($conn,$query)){
  header('Location:index1.php');

}
else {
  echo "Error".mysqli_error($conn);
}
}

//get all contact list
//query
$query = 'select * from addressbook';
//get result
$result = mysqli_query($conn,$query);
//get allpost in array
$contacts = mysqli_fetch_all($result,MYSQLI_ASSOC);



 ?>
    <div class="container text-center col-lg-12">
      <h2>My Address Book</h2>
        <div class="col-lg-12 text-center">
          <h3>Add a new Address List</h3>
          <form method="post">
            <div class="form-group">
              <label for="new-first-name">Enter First name</label>
              <input type="text" name="firstname" class="form-control" id="new-first-name"  required>
            </div>
            <div class="form-group">
              <label for="new-last-name">Enter Last name</label>
              <input type="text" name="lastname" class="form-control" id="new-last-name"  required>
            </div>
            <div class="form-group">
              <label for="new-address">Enter Phone number</label>
              <input type="text" name="phone_number" class="form-control" id="new-address"  required>
            </div>
			<div class="form-group">
              <label for="new-address">Address line 1</label>
              <input type="text" name="Address_Line_1" class="form-control" id="new-address"  required>
            </div>
			<div class="form-group">
              <label for="new-address">Address line 2</label>
              <input type="text" name="Address_Line_2" class="form-control" id="new-address">
            </div>
			<div class="form-group">
              <label for="new-address">Address line 3</label>
              <input type="text" name="Address_Line_3" class="form-control" id="new-address">
            </div>
			<div class="form-group">
              <label for="new-address">Enter Stage Code</label>
              <input type="text" name="stage_code" class="form-control" id="new-address"  required>
            </div>
			<div class="form-group">
              <label for="new-address">Enter email id</label>
              <input type="text" name="email_id" class="form-control" id="new-address"  required>
            </div>
<div class="form-group">
              <label for="new-address">Enter alternate phone number</label>
              <input type="text" name="alt_phone_number" class="form-control" id="new-address">
            </div>


            <input type="submit" name="submit" class="btn btn-primary">
			<input type="reset" value="Reset">
          </form>

          </div>
        </div>

          <div class="container col-lg-5 text-center" id="data-col">
          
             </table>
        </div>
      <footer class="text-center"><p>My Address Book made with Javascript</p></footer>
  </body>
</html>