<?php 
$socket = stream_socket_server("tcp://0.0.0.0:1");
while($conn = stream_socket_accept($socket)):
	fwrite($conn, "Boom Boom Shakalaka");
	fclose($conn);
endwhile;
fclose($socket);
?>