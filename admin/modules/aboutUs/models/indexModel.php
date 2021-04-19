<?php
    function addInfoAboutUs($dataInfoAboutUs) {
        db_insert("tbl_aboutus", $dataInfoAboutUs);
    }

    function addInfoShowroom($dataInfoShowRoom) {
        db_insert("tbl_showroom", $dataInfoShowRoom);
    }

    function getInfoIntroCompany() {
        return db_fetch_array("SELECT * FROM `tbl_aboutus`")[0];
    }

    function updateInfoAboutUs($dataInfoAboutUs, $inIntro) {
        return db_update("tbl_aboutus", $dataInfoAboutUs, "`id_about_us` = '{$inIntro}'");
    }

    function getListDataShowroom() {
        return db_fetch_array("SELECT * FROM `tbl_showroom`");
    }

    function getInfoShowroomItemById($idShowroom) {
        return db_fetch_row("SELECT * FROM `tbl_showroom` WHERE `showroom_id` = '{$idShowroom}'");
    }

    function updateInfoShowroom($dataInfoShowRoom, $idShowroom) {
        return db_update("tbl_showroom", $dataInfoShowRoom, "`showroom_id` = '{$idShowroom}'");
    }
?>