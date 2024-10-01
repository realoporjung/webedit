<?php
// การเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = ""; // ใส่รหัสผ่าน MySQL
$dbname = "FoodOrders";

// รับค่าจากการร้องขอ
$item = $_GET['item'];
$quantity = $_GET['quantity'];

// ตรวจสอบการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// เตรียม SQL statement
$sql = "INSERT INTO Orders (item, quantity) VALUES ('$item', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo "บันทึกออเดอร์สำเร็จ!";
} else {
    echo "เกิดข้อผิดพลาด: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
