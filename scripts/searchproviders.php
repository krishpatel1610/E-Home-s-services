<?php

require_once 'helpers.php';
require_once 'DB.php';

if (isset($_POST['city']) && isset($_POST['profession'])) {
    $input = clean($_POST);
    
    $city = $input['city'];
    $profession = $input['profession'];

    $sql = "SELECT * FROM `worker` WHERE city=? AND profession=?";
    $stmt = DB::query($sql, [
        $city, $profession
    ]);

    $worker = $stmt->fetchAll(PDO::FETCH_OBJ);

    if (count($worker) > 0) {
        echo json_encode($worker);
    } else {
        echo '{"failed": true }';
    }
}
