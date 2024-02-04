https://drive.google.com/file/d/1olXbSWB_d-HK1BIC8r3b8EyrfPgKXD8o/view?usp=sharing

Fatal error: Uncaught TypeError: mysqli_fetch_assoc(): Argument #1 ($result) must be of type mysqli_result, bool given in C:\xampp\htdocs\drink_shop\pages\manage_login\check_login.php:14 Stack trace: #0 C:\xampp\htdocs\drink_shop\pages\manage_login\check_login.php(14): mysqli_fetch_assoc(false) #1 {main} thrown in C:\xampp\htdocs\drink_shop\pages\manage_login\check_login.php on line 14

https://github.com/ly4k/SpoolFool

https://www.free-css.com/free-css-templates/page291/drool


https://askubuntu.com/questions/1390691/how-can-i-use-a-old-version-of-php
https://www.php.net/releases/index.php

<?php
// กำหนดข้อมูลการเชื่อมต่อ MySQL
$servername = "ชื่อเซิร์ฟเวอร์";
$username = "ชื่อผู้ใช้";
$password = "รหัสผ่าน";
$dbname = "ชื่อฐานข้อมูล";

// สร้างการเชื่อมต่อ MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("เชื่อมต่อกับ MySQL ล้มเหลว: " . $conn->connect_error);
}

$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

// สร้างคำสั่ง SQL และประมวลผล
$sql = "SELECT * FROM stats WHERE ip = '$ip'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['ip']) {
        $sql = "UPDATE stats SET count = count + 1 WHERE ip = '$ip'";
        $conn->query($sql);
    } else {
        $sql = "INSERT INTO stats (ip, count) VALUES ('$ip', 1)";
        $conn->query($sql);
    }
}

// ปิดการเชื่อมต่อ MySQLi
$conn->close();
?>

