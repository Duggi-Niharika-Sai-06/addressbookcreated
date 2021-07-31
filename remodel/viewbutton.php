<?php
include 'dbconnect.php';

if(isset($_POST['submit'])){
  $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
  $number = mysqli_real_escape_string($conn,$_POST['contact']);

$query = "INSERT INTO addressbook(firstname,lastname,contact) VALUES('$firstname','$lastname','$number')";

if(mysqli_query($conn,$query)){
  header('Location:address.php');

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

 ?>
<html>
  <head>
    
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
   
    
  </head>
  <body>
    

          <div class="container col-lg-5 text-center" id="data-col">
          <h2>My Contacts:</h2>
          <ul class="list-group">
          </ul>
                <table class="table table-hovered">
                  <tr>
                    <th>Firstname</th>
					<th>Lastname</th>
                    <th>Phone number</th>
					<th>Address Line 1</th>
					<th>Address Line 2</th>
					<th>Address Line 3</th>
					<th>Stage Code</th>
					<th>email id</th>
					<th>Alternate Phone Number</th>
                   
                  </tr>
              <?php
                foreach ($contacts as $contact) {
                  ?>
                    <tr>
	            				
   
                     
					
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
                      
                    </tr>					  



       
                  <?php
                }

               ?>
             </table>
        </div>
      
  </body>
</html>
