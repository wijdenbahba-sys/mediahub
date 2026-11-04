<?php
echo "PHP INI: " . (php_ini_loaded_file() ?: "NONE") . "<br>";
echo "Extension dir: " . ini_get("extension_dir") . "<br>";
echo "mysqli loaded: " . (extension_loaded("mysqli") ? "YES" : "NO") . "<br>";
echo "PDO drivers: " . implode(", ", PDO::getAvailableDrivers());