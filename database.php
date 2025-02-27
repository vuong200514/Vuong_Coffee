<?php

$url = "mysql://avnadmin:AVNS_MS1m_omgxqXR1gmlU7a@laravel-vuong200514-1594.c.aivencloud.com:26931/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($url);

$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
  $db = new PDO($conn, $fields["user"], $fields["pass"]);

  $stmt = $db->query("SELECT VERSION()");
  print($stmt->fetch()[0]);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
