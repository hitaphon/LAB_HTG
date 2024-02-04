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
