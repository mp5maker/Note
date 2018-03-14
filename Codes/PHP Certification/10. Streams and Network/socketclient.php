<?php 
$socket = stream_socket_client("tcp://0.0.0.0:1");
while(!feof($socket)):
	echo fread($socket, 100);
endwhile;
fclose($socket);
?>