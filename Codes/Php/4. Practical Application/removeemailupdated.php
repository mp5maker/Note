<!doctype html>
 <html>
   <head>
     <title> Remove Email </title>
     <meta charset = "UTF-8"/>
   </head>
   <body>
     <p> Delete Email Addresses </p>

<?php 
$showform = TRUE;
$server_name = "localhost";
$user_name   = "root";
$password    = "";
$db_name     = "store";
$connection = mysqli_connect($server_name,
                           $user_name,
                           $password,
                           $db_name)
or die("Could not connect to the server");



if(isset($_POST['submit'])):
    $email =  $_POST['email'];
    $showform = FALSE;
    $query = "SELECT * FROM email_list WHERE email = '$email'";
    $result = mysqli_query($connection, $query) or
    die("Select Query Denied");
    echo "<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
    while($row = mysqli_fetch_array($result)){
      $id = $row['id'];
      $name = $row['first_name']." ".$row['last_name'];
      $email = $row['email']; 
      echo "<input type = 'checkbox' value = \"$id\" name = \"todelete[] \"/>";
      echo "$name $email<br/>";
    }
    echo "<br/><input type  =  'submit' value = 'Remove' name = 'remove'/>";
    echo "</form>";
endif;

if(isset($_POST['remove'])):
     $showform = FALSE;
     foreach($_POST['todelete'] as $delete_id){
         $query = "DELETE FROM email_list where id = '$delete_id'";
         mysqli_query($connection, $query) or die ("Remove Query Denied");
        }
     echo "Customers Removed Successfully";
endif;
?>

<?php
if($showform):
?>
     <form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
       <label for = "email">Email</label><br/>
       <input type = "email" name = "email" id = "email"/><br/>
       <input type = "submit" value = "Submit" name = "submit"/>
     </form>
   </body>
 <html>
<?php 
endif;
?>