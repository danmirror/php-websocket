<?php
$socket = stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);
if (!$socket) {
  echo "$errstr ($errno)\n";
  die('Could not create socket');
}

while (true) {
  while ($conn = stream_socket_accept($socket, -1, $peername)) {
    fwrite($conn, 'The local time is ' . date('n/j/Y g:i a') . "\n");
    echo "Connection received from: $peername\n";
    fclose($conn);
  }
}

fclose($socket);