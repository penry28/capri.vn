<?php

function addCatalogueNew($dataCatalogue) {
    db_insert("tbl_catalogue", $dataCatalogue);
}

function getListCataloguePagination($numPerPage) {
    return db_fetch_array("SELECT * FROM `tbl_catalogue` LIMIT 0, $numPerPage");
}

function getCatalogueItemById($idCatalogue) {
    return db_fetch_row("SELECT * FROM `tbl_catalogue` WHERE `catalogue_id` = '{$idCatalogue}'");
}

function updateCatalogueNew($dataCatalogue, $idCatalogue) {
    return db_update("tbl_catalogue", $dataCatalogue, "`catalogue_id` = '{$idCatalogue}'");
}

function resetDataPublishStatus() {
    $listCatalog = db_fetch_array("SELECT `catalogue_id` FROM `tbl_catalogue`");
    foreach($listCatalog as $catalogueItem) {
        $dataCatalogue = [
            "publish_status" => "0"
        ];
        updateCatalogueNew($dataCatalogue, $catalogueItem['catalogue_id']);
    }
}