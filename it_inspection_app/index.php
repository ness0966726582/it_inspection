<?php
require_once 'config.php'; // 包含資料庫連線

try {
    // 查詢所有機房名稱
    $stmtRooms = $pdo->query("SELECT name FROM it_rooms");
    $rooms = $stmtRooms->fetchAll(PDO::FETCH_ASSOC);

    // 查詢所有員工名稱
    $stmtStaffs = $pdo->query("SELECT name FROM it_staff");
    $staffs = $stmtStaffs->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("資料庫查詢失敗：" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>動態下拉選單</title>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>機房巡檢紀錄</h1>
    <label for="name">機房名稱：</label>
    <select id="room_name">
        <option value="">請選擇</option>
        <?php foreach ($rooms as $room): ?>
            <option value="<?= htmlspecialchars($room['name']) ?>"><?= htmlspecialchars($room['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <h2>機房輸出結果</h2>
    <p>ID：<span id="room_id">-</span></p>
    <p>座標：<input type="text" id="room_coordinate" readonly></p>

    <h1>IT 員工資料</h1>
    <label for="staff_name">員工名稱：</label>
    <select id="staff_name">
        <option value="">請選擇</option>
        <?php foreach ($staffs as $staff): ?>
            <option value="<?= htmlspecialchars($staff['name']) ?>"><?= htmlspecialchars($staff['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <h2>員工輸出結果</h2>
    <p>工號：<span id="work_id">-</span></p>

    <script src="assets/script.js"></script>
</body>
</html>
