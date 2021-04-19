<?php
function getPolicyItemById($id) {
    return db_fetch_row("SELECT `policy_id`,`policy_title`, `policy_content`, `policy_desc` FROM `tbl_policy` WHERE `status_current` = 'publish' AND `policy_id` = '{$id}'");
}
?>