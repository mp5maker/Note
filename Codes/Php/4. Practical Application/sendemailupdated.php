<?php
$error = [];
$error['sub'] = "";
$error['body'] = "";

if(empty($_POST['subject']) && !empty($_POST['body_of_email'])):
   $error['sub'] = "Your subject is empty!";
endif;

if(empty($_POST['body_of_email']) && !empty($_POST['subject'])):
   $error['body'] = "Your body of email is empty!";
endif;

if(empty($_POST['subject']) && empty($_POST['body_of_email'])):
   $error['sub'] = "Your subject is empty!";
   $error['body'] = "Your body of email is empty!";
endif;

if(!empty($_POST['submit']) && !empty($_POST['subject']) && !empty($_POST['body_of_email'])):
    $from = "khan.photon@gmail.com";
    $subject = $_POST['subject'];
    $body_of_email = $_POST['body_of_email'];

    $server_name = "localhost";
    $user_name   = "root";
    $password    = "";
    $db_name     = "store";

    $connection = mysqli_connect($server_name,
                                 $user_name,
                                 $password,
                                 $db_name)
    or die("Could connect to the server");

    $query = "SELECT * FROM email_list";
    $result = mysqli_query($connection, $query)
            or die("Query Denied");
    while($row = mysqli_fetch_array($result)){
          $to = $row['email'];
          mail($to, $subject, $body_of_email, "From: $from");
    echo "Your email has been successfully sent";
    }
    mysqli_close($connection);
endif;

?>
  <!doctype html>
    <htmL>
      <head>
        <title> Send Email </title>
        <meta charset = "UTF-8"/>
      </head>
      <body>
        <form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
          <label for = "subject">Subject</label><br/>
          <input type = "text" name = "subject" id = "subject" 
                 value = "<?php if(!empty($_POST['subject'])) echo $_POST['subject']; ?>"/>
          <?php if($error['sub'] && !empty($_POST['submit'])) echo $error['sub'];?><br/>
          
          <label for = "body_of_email"> Body of Email </label><br/>
          <textarea name = "body_of_email" id = "body_of_email" 
                    rows = "8" cols = "60"><?php if(!empty($_POST['body_of_email'])) echo $_POST['body_of_email'];?></textarea>
          <?php if($error['body'] && !empty($_POST['submit'])) echo $error['body'];?><br/>
          <input type = "submit" id = "submit" name = "submit"
                 value =  "Submit"/>          
      </body>
    </htmL>
