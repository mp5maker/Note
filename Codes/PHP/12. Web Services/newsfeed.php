<?php header("Content-Type: text/xml"); ?>
<?php echo '<?xml version = "1.0" encoding = "UTF-8"?>'; ?>
<?php echo '<rss version = "2.0">'; ?>
<?php echo '   <channel>'; ?>
<?php echo '		<title>Job Search</title>'; ?>
<?php echo '		<link>http://sphotonkhan.com</link>'; ?>
<?php echo '		<description>Get to know about the hot jobs</description>'; ?>
<?php echo '		<language>en-us</language>'; ?>

<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "riskyjobs";

$connection = mysqli_connect($server_name, $user_name, $password, $db_name)
              or die ("Server Connection Denied");
$query =  "SELECT * FROM riskyjobs ORDER BY date_posted DESC";
$result = mysqli_query($connection, $query)
          or die("Query Denied");
while($row = mysqli_fetch_array($result)){
echo '		<item>';
echo '			<title>'.$row['title'].'</title>';
echo '			<link>'.$row['company'].'</link>';
echo '			<pubDate>'.$row['date_posted'].'</pubDate>';
echo '			<description>'.substr($row['description'], 0, 50).'</description>';
echo '		</item>';
}
echo '	</channel>';
echo ' </rss>';
?>

