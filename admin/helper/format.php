<?php
function currency_format($number, $suffix = 'đ'){
    return !empty($number) ? number_format($number).$suffix : '';
}

function formatStatus($status) {
    $vnmStatus = [
        "publish" => "Hoạt động",
        "pending" => "Chờ duyệt",
        "trash"   => "Thùng rác"
    ];
    return $vnmStatus[$status];
}

function formatTime($timezone) {
    if(!empty($timezone)) {
        $date = getdate($timezone);
        return "{$date['mday']}/{$date['mon']}/{$date['year']}";
    } return null;
}

function formatFullTime($timezone) {
    if(!empty($timezone)) {
        $date = getdate($timezone);
        return "{$date['hours']}h:{$date['minutes']}p - {$date['mday']}/{$date['mon']}/{$date['year']}";
    } return null;
}

function formatPhone($phone) {
    if(strlen($phone) == 11) {
        if(  preg_match( '/^\d(\d{2})(\d{4})(\d{4})$/', $phone,  $matches ) ) {
            $result = '(0' . $matches[1] . ') ' .$matches[2] . ' ' . $matches[3];
            return $result;
        }
    } else {
        if(  preg_match( '/^\d(\d{3})(\d{3})(\d{3})$/', $phone,  $matches ) ) {
            $result = '(0' . $matches[1] . ') ' .$matches[2] . ' ' . $matches[3];
            return $result;
        }
    }
}


function formatTypeSupport($type) {
    $nameEN = [
        "product"  => "Sản phẩm",
        "service"  => "Dịch vụ",
        "feedback" => "Góp ý",
        "other"    => "Khác"
    ];
    return $nameEN[$type];
}
function formatStatusSupport($status) {
    $statusEn = [
        "news"  => "Chưa xem",
        "seen"  => "Đã xem",
        "trash" => "Thùng rác"
    ];
    return $statusEn[$status];
}
