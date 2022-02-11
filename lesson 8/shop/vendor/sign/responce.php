<?php

function responce($status, $data='') {
    $res = [
        "status" => $status,
        "data" => $data
    ];
    echo json_encode($res);
}
