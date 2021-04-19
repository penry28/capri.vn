<?php
    function construct() {
        load_model('index');
    }

    function indexAction() {
        $numPerPage = 100;
        $listSlider = getListSliderPagination($numPerPage);
        $dataSendView = [
            "listSlider" => $listSlider
        ];
        load_view('index', $dataSendView);
    }

    function addAction() {
        load('lib','validationForm');
        if(isset($_POST['add_new_slide_btn'])) {
            $error = [];
            global $error;
            // check banner slide
            if(empty($_POST['banner_img_thumbNail_url'])) {
                $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng chọn ảnh cho slide</span>";
            } else {
                $slideImg = $_POST['banner_img_thumbNail_url'];
            }
            // check slide_number
            if(empty($_POST['slide_number'])) {
                $error['slide_number'] = "<span class='error'>(*) Vui lòng chọn vị trí hiển thị cho slide</span>";
            } else {
                if(checkExistsSlideNum($_POST['slide_number'])) {
                    $error['slide_number'] = "<span class='error'>(*) Số thứ tự này đã tồn tại</span>";
                } else {
                    $slideNumber = $_POST['slide_number'];
                }
            }
            // check status current
            if(empty($_POST['status_slide'])) {
                $statusSlide = 'pending';
            } else {
                $statusSlide = $_POST['status_slide'];
            }

            // check error
            if(empty($error)) {
                $createDate = time();
                $creatorId = getInfoUser("user_id");
                $dataInfoSldie = [
                    "slide_img"      => $slideImg,
                    "slide_number"   => $slideNumber,
                    "status_current" => $statusSlide,
                    "create_date"    => $createDate,
                    "creator_id"     => $creatorId
                ];
                addInfoSlide($dataInfoSldie);
            }
        }
        $listSlide = getListSlide();
        $dataSendView = [
            "listSlide" => $listSlide
        ];
        load_view('add', $dataSendView);
    }

    function captionAction() {
        load_view('caption');
    }

    function uploadImgslideAction() {
        if($_SERVER['REQUEST_METHOD']) {
            $targetDir = "public/uploads/slide/";
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

    function checkExistsSlideNumAction() {
        $num_vl = $_POST['num_vl'];
        $checkResult = checkExistsSlideNum($num_vl);
        if(!$checkResult) {
            $dataSendAjax = [
                "status" => "success"
            ];
        } else {
            $dataSendAjax = [
                "status" => "error"
            ];
        }
        echo json_encode($dataSendAjax);
    }

    function updateAction() {
        load('lib','validationForm');
        $idSlide = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
        $slideItem = getSlideItemById($idSlide);
        $listSlide = getListSlide();
        $dataSendView = [
            "slideItem" => $slideItem,
            "listSlide" => $listSlide
        ];
        if(isset($_POST['update_slide_btn'])) {
            $error = [];
            global $error;
            // check banner slide
            if(empty($_POST['banner_img_thumbNail_url'])) {
                $error['banner_img_thumbNail_url'] = "<span class='error'>(*) Vui lòng chọn ảnh cho slide</span>";
            } else {
                $slideImg = $_POST['banner_img_thumbNail_url'];
            }
            // check slide_number
            if(empty($_POST['slide_number'])) {
                $error['slide_number'] = "<span class='error'>(*) Vui lòng chọn vị trí hiển thị cho slide</span>";
            } else {
                $slideNumber = $_POST['slide_number'];
            }
            // check status current
            if(empty($_POST['status_slide'])) {
                $statusSlide = 'pending';
            } else {
                $statusSlide = $_POST['status_slide'];
            }

            // check error
            if(empty($error)) {
                $updateDate = time();
                $dataInfoSlide = [
                    "slide_img"      => $slideImg,
                    "slide_number"   => $slideNumber,
                    "status_current" => $statusSlide,
                    "update_date"    => $updateDate,
                ];
                updateInfoSlide($dataInfoSlide, $idSlide);
            }
        }
        load_view('update', $dataSendView);
    }
?>