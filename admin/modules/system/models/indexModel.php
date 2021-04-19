<?php

function getInfoSystem() {
    $data = db_fetch_array("SELECT * FROM `tbl_system`");
    if(!empty($data)) return $data[0];
    return [];
}

function updateInfoSystem($dataInfoSystem, $idSystem) {
    return db_update("tbl_system", $dataInfoSystem, "`id_system` = '{$idSystem}'");
}