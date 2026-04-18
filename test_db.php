<?php
$configs = [
    ['localhost', 'root', '', 'u826608559_venusp'],
    ['localhost', 'root', 'root', 'u826608559_venusp'],
    ['localhost', 'u826608559_uservenus', 'Venus@Vinayak@362001', 'u826608559_venusp']
];

foreach ($configs as $config) {
    echo "Testing: " . implode(', ', $config) . "... ";
    try {
        $mysqli = @new mysqli($config[0], $config[1], $config[2], $config[3]);
        if ($mysqli->connect_error) {
            echo "Error: " . $mysqli->connect_error . "\n";
        } else {
            echo "SUCCESS!\n";
            $mysqli->close();
        }
    } catch (Exception $e) {
        echo "Exception: " . $e->getMessage() . "\n";
    }
}
