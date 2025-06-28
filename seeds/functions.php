<?php
function fetchIds($mysqli, $tableName)
{
    $result = $mysqli->query("SELECT id FROM $tableName");

    if (!$result) {
        die("Query failed: " . $mysqli->error);
    }

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return array_column($rows, 'id');
}
