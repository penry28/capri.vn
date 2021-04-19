<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('lib','validationForm');
    $infoSystem = getInfoSystem();
    $dataSendView = [
        "infoSystem" => $infoSystem
    ];
    if(isset($_POST['update_new_cate_blog'])) {
        $error = [];
        global $error;

        // favicon image
        if(empty($_POST['favicon_inner_url'])) {
            $error['favicon_inner_url'] = "<span class='error'>(*) Vui lòng nhập icon thương hiệu website</span>";
        } else {
            $faviconInnerUrl = $_POST['favicon_inner_url'];
        }

        // banner desc
        if(empty($_POST['banner_desc_inner_url'])) {
            $error['banner_desc_inner_url'] = "<span class='error'>(*) Vui lòng nhập ảnh mô tả website</span>";
        } else {
            $bannerDescInnerUrl = $_POST['banner_desc_inner_url'];
        }

        // check company_name
        if(empty($_POST['company_name'])) {
            $error['company_name'] = "<span class='error'>(*) Vui lòng nhập tên công ty</span>";
        } else {
            $companyName = $_POST['company_name'];
        }

        // check slogan
        if(empty($_POST['company_slogan'])) {
            $error['company_slogan'] = "<span class='error'>(*) Vui lòng nhận slogan của công ty</span>";
        } else {
            $companySlogan = $_POST['company_slogan'];
        }

        // check company_title
        if(empty($_POST['company_title'])) {
            $error['company_title'] = "<span class='error'>(*) Vui lòng nhập tiêu đề công ty</span>";
        } else {
            $companyTitle = $_POST['company_title'];
        }

        // check company_desc
        if(empty($_POST['company_desc'])) {
            $error['company_desc'] = "<span class='error'>(*) Vui lòng nhập mô tả về website</span>";
        } else {
            $companyDesc = $_POST['company_desc'];
        }

        // check seo_tap_search
        if(empty($_POST['seo_tap_search'])) {
            $error['seo_tap_search'] = "<span class='error'>(*) Vui lòng nhập danh sách từ khóa danh mục sản phẩm</span>";
        } else {
            $seoTapSearch = $_POST['seo_tap_search'];
        }

        if(empty($error)) {
            $dataInfoSystem = [
                "favicon_img"    => $faviconInnerUrl,
                "banner_desc"    => $bannerDescInnerUrl,
                "company_name"   => $companyName,
                "company_title"  => $companyTitle,
                "company_desc"   => $companyDesc,
                "seo_tap_search" => $seoTapSearch,
                "company_slogan" => $companySlogan
            ];
            updateInfoSystem($dataInfoSystem, $infoSystem['id_system']);
        }
    }
    load_view('index', $dataSendView);
}


function uploadImageAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir = "public/uploads/system/";
        $justNameFile  = create_slug(pathinfo($_FILES['file']['name'], PATHINFO_FILENAME));
        $justExtenFile = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $targetFile    = $targetDir . $justNameFile . '.' .$justExtenFile;
        if(file_exists($targetFile)) {
            $getName = $justNameFile;
            $nameFileNew = $getName." - copy.";
            $pathFileNew = $targetDir . $nameFileNew . $justExtenFile;
            $countFile = 1;
            while(file_exists($pathFileNew)) {
                $getName = $justNameFile;
                $nameFileNew = $getName." - copy({$countFile}).";
                $pathFileNew = $targetDir . $nameFileNew . $justExtenFile;
                $countFile ++;
            }
            $targetFile = $pathFileNew;
        }
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            $dataSendAjax = [
                "status" => "success",
                "pathFile" => $targetFile
            ];
        } else {
            $dataSendAjax = [
                "status" => "error",
            ];
        }
        echo json_encode($dataSendAjax);
    }
}

function socailAction() {
    load('lib','validationForm');
    $infoSystem = getInfoSystem();
    $dataSendView = [
        "infoSystem" => $infoSystem
    ];
    if(isset($_POST['update_new_info_socail_system'])) {
        $error = [];
        global $error;

        // check fanpage_facebook
        if(empty($_POST['fanpage_facebook'])) {
            $error['fanpage_facebook'] = "<span class='error'>(*) Vui lòng nhập đường link fanpage facebook của bạn</span>";
        } else {
            $fanpageFacebook = $_POST['fanpage_facebook'];
        }

        // youtobe_change
        if(empty($_POST['youtobe_change'])) {
            $error['youtobe_change'] = "<span class='error'>(*) Vui lòng nhập đường link kênh youtube của bạn</span>";
        } else {
            $youtobeChange = $_POST['youtobe_change'];
        }

        // zalo_app
        if(empty($_POST['zalo_app'])) {
            $error['zalo_app'] = "<span class='error'>(*) Vui lòng nhập số điện thoại zalo</span>"; 
        } else {
            $zaloApp = $_POST['zalo_app'];
        }

        // check error
        if(empty($error)) {
            $dataInfoSystem = [
                "fanpage_facebook" => $fanpageFacebook,
                "youtube_change"   => $youtobeChange,
                "zalo"             => $zaloApp
            ];
            updateInfoSystem($dataInfoSystem, $infoSystem['id_system']);
        }
    }
    load_view('socail', $dataSendView);
}

function mailConfigAction() {
    load('lib','validationForm');
    $infoSystem = getInfoSystem();
    $dataSendView = [
        "infoSystem" => $infoSystem
    ];
    if(isset($_POST['update_new_info_email_system'])) {
        $error = [];
        global $error;
        // check fullname email send
        if(empty($_POST['fullname_email_send'])) {
            $error['fullname_email_send'] = "<span class='error'>(*) Vui lòng nhập tên người gửi</span>";
        } else {
            $fullnameEmailSend = $_POST['fullname_email_send'];
        }
        // check user_email_send
        if(empty($_POST['user_email_send'])) {
            $error['user_email_send'] = "<span class='error'>(*) Vui lòng nhập tài khoảng email gửi</span>";
        } else {
            if(!is_email($_POST['user_email_send'])) {
                $error['user_email_send'] = "<span class='error'>(*) Email không hợp lệ</span>";
            } else {
                $userEmailSend = $_POST['user_email_send'];
            }
        }
        // check pass_email_send
        if(empty($_POST['pass_email_send'])) {
            $error['pass_email_send'] = "<span class='error'>(*) Vui lòng nhập passowrd email gửi</span>";
        } else {
            $passEmailSend = $_POST['pass_email_send'];
        }
        // check fullname email reply
        if(empty($_POST['fullname_email_reply'])) {
            $error['fullname_email_reply'] = "<span class='error'>(*) Vui lòng nhập tên người nhận thông tin phản hồi</span>";
        } else {
            $fullnameEmailReply = $_POST['fullname_email_reply'];
        }
        // check user_email_reply
        if(empty($_POST['user_email_reply'])) {
            $error['user_email_reply'] = "<span class='error'>(*) Vui lòng nhập tài khoảng email nhận</span>";
        } else {
            if(!is_email($_POST['user_email_reply'])) {
                $error['user_email_reply'] = "<span class='error'>(*) Email không hợp lệ</span>";
            } else {
                $userEmailReply = $_POST['user_email_reply'];
            }
        }
        if(empty($error)) {
            $dataInfoSystem = [
                "fullname_email_send"  => $fullnameEmailSend,
                "user_email_send"      => $userEmailSend,
                "pass_email_send"      => $passEmailSend,
                "user_email_reply"     => $userEmailReply,
                "fullname_email_reply" => $fullnameEmailReply
            ];
            updateInfoSystem($dataInfoSystem, $infoSystem['id_system']);
        }
    }
    load_view('mailConfig', $dataSendView);
}