<?php
include 'config.php';

if ($conn) {
    echo "✅ Connected successfully";
} else {
    echo "❌ Connection failed";
}
?>