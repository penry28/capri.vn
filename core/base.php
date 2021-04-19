<?php
defined('APPPATH') OR exit('Không được quyền truy cập phần này');
function get_controller() {
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['default_controller'];
    return $controller;
}
function get_module() {
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['default_module'];
    return $module;
}
function get_action() {
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['default_action'];
    return $action;
}
function load($type, $name) {
    if ($type == 'lib')
        $path = LIBPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if ($type == 'helper')
        $path = HELPERPATH . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        require "$path";
    } else {
        echo "{$type}:{$name} không tồn tại";
    }
}
function call_function($list_function = array()) {
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (function_exists($f())) {
                $f();
            }
        }
    }
}
function load_view($name, $data_send = array()) {
    global $data;
    $data = $data_send;
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name . 'View.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key_data => $v_data) {
                $$key_data = $v_data;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
function load_model($name) {
    $path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $name . 'Model.php';
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
function get_header($name = '') {
    global $data;
    if (empty($name)) {
        $name = 'header';
    } else {
        $name = "header-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
function get_footer($name = '') {
    global $data;
    if (empty($name)) {
        $name = 'footer';
    } else {
        $name = "footer-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
function get_menuRespon($name = '') {
    global $data;
    if (empty($name)) {
        $name = 'menu-respon';
    } else {
        $name = "menu-respon-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}


function get_form_contact($name = '') {
    global $data;
    if (empty($name)) {
        $name = 'formcontact';
    } else {
        $name = "formcontact-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_seo($name = '') {
    global $data;
    if (empty($name)) {
        $name = 'seo';
    } else {
        $name = "seo-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_banner($name = '') {
    global $data;
    if (empty($name)) {
        $name = 'banner';
    } else {
        $name = "banner-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_sidebar($name = '') {
    global $data;
    if (empty($name)) {
        $name = 'sidebar';
    } else {
        $name = "sidebar-{$name}";
    }
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
function get_template_part($name) {
    global $data;
    if (empty($name))
        return FALSE;
    $path = LAYOUTPATH . DIRECTORY_SEPARATOR . "template-{$name}.php";
    if (file_exists($path)) {
        foreach ($data as $key => $a) {
            $$key = $a;
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
?>