<?php
$hosts = ['localhost', '127.0.0.1'];
$users = ['root', 'heman-bairwa'];
$passwords = ['', 'root', 'password'];

foreach ($hosts as $host) {
    foreach ($users as $user) {
        foreach ($passwords as $password) {
            try {
                $mysqli = @new mysqli($host, $user, $password);
                if (!$mysqli->connect_error) {
                    echo "Success: host=$host, user=$user, password=$password\n";
                    $mysqli->close();
                    exit(0);
                }
            } catch (Exception $e) {
                // Ignore
            }
        }
    }
}
echo "Failed to connect to MySQL with common credentials.\n";
exit(1);
