<?php

function getNumMessSupportNew() {
    return db_num_rows("SELECT `support_id` FROM `tbl_support_custommer` WHERE `status` = 'news'");
}