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
  header('Location:deletebutton.php');

}
else {
  echo "Error".mysqli_error($conn);
}
}

//get all contact list
//query
$query = 'select *from addressbook';
//get result
$result = mysqli_query($conn,$query);
//get allpost in array
$contacts = mysqli_fetch_all($result,MYSQLI_ASSOC);

//delete the contact details here
if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $query = "delete from addressbook where id=$id";

  if(mysqli_query($conn,$query)){
    
	echo "<script>window.alert('Deleted!');</script>";
	 header('Location:deletebutton.php');

  }
  else {
    echo "<script>window.alert('Failed To Delete!');</script>";
  }
}


 ?>
 
 <html>
  <head>

  
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
   
    
    <title>My Address book</title>
  </head>
  <body>
    <div class="container text-center col-lg-12">
      <h2>My Address Book</h2>
        <div class="col-lg-12 text-center">
         
          

          <div class="container col-lg-5 text-center" id="data-col">
          <h2>My Contacts:</h2>
          <ul class="list-group">
          </ul>
                <table class="table table-hovered">
                  <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
					<th>Phone Number</th>
                    <th>Address Line 1</th>
					<th>Address Line 2</th>
					<th>Address Line 3</th>
					<th>Stage Code</th>
					<th>email id</th>
					<th>Alternate Phone Number</th>
                    <th>Action</th>
                  </tr>
              <?php
                foreach ($contacts as $contact) {
                  ?>
                    <tr>
                      <td><?php echo $contact['firstname']; ?></td>
                      <td><?php echo $contact['lastname']; ?></td>
                      <td><?php echo $contact['phone_number']; ?></td>
					  <td><?php echo $contact['Address_Line_1']; ?></td>
					  <td><?php echo $contact['Address_Line_2']; ?></td>
					  <td><?php echo $contact['Address_Line_3']; ?></td>
					  <td><?php echo $contact['stage_code']; ?></td>
					  <td><?php echo $contact['email_id']; ?></td>
					  <td><?php echo $contact['alt_phone_number']; ?></td>
                      <td><form method="post"><input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
                      <input type="submit" name="delete" value="Delete" class="btn btn-danger"></form></td>
                    </tr>
                  <?php
                }
               ?>
             </table>
        </div>
   
  </body>
</html>