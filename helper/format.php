<?php
function currency_format($number, $suffix = 'đ'){
    return !empty($number) ? number_format($number,0,'','.').$suffix : "";
}

function percent_format($current_price, $old_price) {
    return "-". floor((1-($current_price/$old_price)) * 100) . "%";
}

function formatTime($timezone) {
    $date = getdate($timezone);
    return "{$date['mday']}/{$date['mon']}/{$date['year']}";
}

function formatFullTime($timezone) {
    $date = getdate($timezone);
    return "{$date['hours']}h:{$date['minutes']}p - {$date['mday']}/{$date['mon']}/{$date['year']}";
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