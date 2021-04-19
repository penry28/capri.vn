<?php
function construct() {
    load_model('index');
}

function indexAction() {
    load('lib','validationForm');
    $infoIntroCompany = getInfoIntroCompany();
    if(isset($_POST['updateInfoAbout_btn'])) {
        $error = [];
        global $error;
        // check title video
        if(empty($_POST['title_video'])) {
            $error['title_video'] = "<span class='error'>(*) Vui lòng không bỏ trống title video</span>";
        } else {
            $titleVideo = $_POST['title_video'];
        }

        // check thumbnail
        if(empty($_POST['banner_img_thumbNail_url'])) {
            $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Bạn vui lòng chọn ảnh nền cho video</span>";
        } else  {
            $bannerImgThumbNailUrl = $_POST['banner_img_thumbNail_url'];
        }

        // check desc video
        if(empty($_POST['desc_video'])) {
            $error['desc_video'] = "<span class='error'>(*) Vui lòng không bỏ trống mô tả ngắn video</span>";
        } else {
            $descVideo = $_POST['desc_video'];
        }

        // check iframe_video
        if(empty($_POST['iframe_video'])) {
            $error['iframe_video'] = "<span class='error'>(*) Vui lòng không bỏ trống iframe video</span>";
        } else {
            $iframeVideo = $_POST['iframe_video'];
        }

        // check content video
        if(empty($_POST['content_video'])) {
            $contentVideo = null;
        } else {
            $contentVideo = $_POST['content_video'];
        }

        // check desc_company
        if(empty($_POST['desc_company'])) {
            $descCompany = null;
        } else {
            $descCompany = $_POST['desc_company'];
        }

        // check content_cooperation
        if(empty($_POST['content_cooperation'])) {
            $contentCooperation = null;
        } else {
            $contentCooperation = $_POST['content_cooperation'];
        }

        // check content_highlight_company
        if(empty($_POST["content_highlight_company"])) {
            $contentHighlightCompany = null;
        } else {
            $contentHighlightCompany = $_POST['content_highlight_company'];
        }

        // check content_system_showroom
        if(empty($_POST['content_system_showroom'])) {
            $contentSystemShowroom = null;
        } else {
            $contentSystemShowroom = $_POST['content_system_showroom'];
        }

        if(empty($error)) {
            $dataInfoAboutUs = [
                "title_video"               => $titleVideo,
                "desc_video"                => $descVideo,
                "iframe_video"              => $iframeVideo,
                "thumbnail"                 => $bannerImgThumbNailUrl,
                "content_video"             => $contentVideo,
                "desc_company"              => $descCompany,
                "content_cooperation"       => $contentCooperation,
                "content_highlight_company" => $contentHighlightCompany,
                "content_system_showroom"   => $contentSystemShowroom,
            ];
            updateInfoAboutUs($dataInfoAboutUs, $infoIntroCompany['id_about_us']);
        }
    }
    $dataSendView = [
        "infoIntroCompany" => $infoIntroCompany
    ];
    load_view('index', $dataSendView);
}


function uploadThumbNailVideoAction() {
    if($_SERVER['REQUEST_METHOD']) {
        $targetDir = "public/uploads/aboutus/";
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

function indexShowroomAction() {
    $listDataShowroom = getListDataShowroom();
    $dataSendView = [
        "listDataShowroom" => $listDataShowroom
    ];
    load_view('indexShowroom', $dataSendView);
}

function addShowroomAction() {
    load('lib','validationForm');
    if(isset($_POST['addShowroom_btn'])) {
        $error = [];
        global $error;

        // check showroomName
        if(empty($_POST['showroomName'])) {
            $error['showroomName'] = "<span class='error'>(*) Vui lòng nhập tên showroom</span>";
        } else {
            $showroomName = $_POST['showroomName'];
        }
        
        // check showroomAddress
        if(empty($_POST['showroomAddress'])) {
            $error['showroomAddress'] = "<span class='error'>(*) Vui lòng nhập địa chỉ</span>";
        } else {
            $showroomAddress = $_POST['showroomAddress'];
        }

        // check phone 1
        if(empty($_POST['showroomPhone_1'])) {
            $error['showroomPhone_1'] = "<span class='error'>(*) Vui lòng nhập số điện thoại</span>";
        } else {
            $showroomPhone_1 = $_POST['showroomPhone_1'];
        }

        // check phone 2
        if(empty($_POST['showroomPhone_2'])) {
            $showroomPhone_2 = null;
        } else {
            $showroomPhone_2 = $_POST['showroomPhone_2'];
        }

        // check email 
        if(empty($_POST['showroomEmail'])) {
            $showroomEmail = null;
        } else {
            if(!is_email($_POST['showroomEmail'])) {
                $error['showroomEmail'] = "<span class='error'>(*) Địa chỉ email không hợp lệ</span>";
            } else {
                $showroomEmail = $_POST['showroomEmail'];
            }
        }

        // check status
        if(empty($_POST['status_current'])) {
            $status_current = "pending";
        } else {
            $status_current = $_POST['status_current'];
        }

        // check error
        if(empty($error)) {
            $createDate = time();
            $creatorId = getInfoUser("user_id");
            $dataInfoShowRoom = [
                "showroom_name"    => $showroomName,
                "showroom_address" => $showroomAddress,
                "showroom_phone_1" => $showroomPhone_1,
                "showroom_phone_2" => $showroomPhone_2,
                "showroom_email"   => $showroomEmail,
                "status_current"   => $status_current,
                "created_date"     => $createDate,
                "creator_id"       => $creatorId
            ];
            addInfoShowroom($dataInfoShowRoom);
        }
    }
    load_view('addShowroom');
}


function updateShowroomAction() {
    load('lib','validationForm');
    $idShowroom = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $infoShowroomItem = getInfoShowroomItemById($idShowroom);
    $dataSendView = [
        "infoShowroomItem" => $infoShowroomItem
    ];
    if(isset($_POST['updateShowroom_btn'])) {
        $error = [];
        global $error;

        // check showroomName
        if(empty($_POST['showroomName'])) {
            $error['showroomName'] = "<span class='error'>(*) Vui lòng nhập tên showroom</span>";
        } else {
            $showroomName = $_POST['showroomName'];
        }
        
        // check showroomAddress
        if(empty($_POST['showroomAddress'])) {
            $error['showroomAddress'] = "<span class='error'>(*) Vui lòng nhập địa chỉ</span>";
        } else {
            $showroomAddress = $_POST['showroomAddress'];
        }

        // check phone 1
        if(empty($_POST['showroomPhone_1'])) {
            $error['showroomPhone_1'] = "<span class='error'>(*) Vui lòng nhập số điện thoại</span>";
        } else {
            $showroomPhone_1 = $_POST['showroomPhone_1'];
        }

        // check phone 2
        if(empty($_POST['showroomPhone_2'])) {
            $showroomPhone_2 = null;
        } else {
            $showroomPhone_2 = $_POST['showroomPhone_2'];
        }

        // check email 
        if(empty($_POST['showroomEmail'])) {
            $showroomEmail = null;
        } else {
            if(!is_email($_POST['showroomEmail'])) {
                $error['showroomEmail'] = "<span class='error'>(*) Địa chỉ email không hợp lệ</span>";
            } else {
                $showroomEmail = $_POST['showroomEmail'];
            }
        }

        // check status
        if(empty($_POST['status_current'])) {
            $status_current = "pending";
        } else {
            $status_current = $_POST['status_current'];
        }

        // check error
        if(empty($error)) {
            $updateDate = time();
            $dataInfoShowRoom = [
                "showroom_name"    => $showroomName,
                "showroom_address" => $showroomAddress,
                "showroom_phone_1" => $showroomPhone_1,
                "showroom_phone_2" => $showroomPhone_2,
                "showroom_email"   => $showroomEmail,
                "status_current"   => $status_current,
                "update_date"      => $updateDate,
            ];
            updateInfoShowroom($dataInfoShowRoom, $idShowroom);
        }
    }
    load_view('updateShowroom', $dataSendView);
}