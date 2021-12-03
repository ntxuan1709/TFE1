<?php
// $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
// echo $actual_link; link url
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
} elseif (!$_SESSION['lang']) {
    $_SESSION['lang'] = 'en';
}
include_once('home/language/lang_' . $_SESSION['lang'] . '.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Technology for everyone">
    <meta name="author" content="Xuan Nguyn">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>TFE | Technology For Everyone</title>

    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="home/assets/css/plugins.css" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/dark.css" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/colors.css" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/style.css" />
    <!--[if lt IE 9]> <script type="text/javascript" src="home/assets/js/modernizr.custom.js"></script> <![endif]-->
    <!-- /STYLES -->

</head>

<body>
    <?php
    include_once('home/database/database.php');
    include_once('home/models/homeModel.php');
    $menu     = new Menu();
    // list menu
    $listMenu = $menu->getListAll();
    ?>
    <!-- PRELOADER -->
    <!-- <div id="preloader">
        <div class="loader_line"></div>
    </div> -->
    <!-- /PRELOADER -->
    <div class="tokyo_tm_all_wrap" data-magic-cursor="" data-color="black">
        <!-- If you want disable magic cursor add value "hide" -->
        <!-- MAGIC CURSOR VALUES: "", hide -->
        <!-- COLOR VALUES: blue, green, brown, pink, orange, black, white, purple, sky, cadetBlue, crimson, olive, red -->
        <?php include_once("home/views/home/mobile.php"); ?>
        <div class="leftpart">
            <div class="leftpart_inner">
                <div class="logo">
                    <a href="#">
                        <img src="home/assets/images/logo/Screenshot_3.png" alt="" /><img src="home/assets/images/logo/animation.gif" alt="" width="80px" height="80px" style="padding-bottom: 20px;" />
                    </a>
                    <hr />
                    <button type="button" id="vi" value="vi" onclick="change_lang(this.value)" style="border:none;">
                        VI <a href="index.php?lang=vi"><img src="home/assets/images/icon/flag_vietnam_icon.png" width="24px" height="24px" alt="" /></a>
                    </button>
                    <button type="button" id="en" value="en" onclick="change_lang(this.value)" style="border:none;">
                        EN <a href="index.php?lang=en"><img src="home/assets/images/icon/flag_usa_icon.png" width="24px" height="24px" alt="" /></a>
                    </button>

                    <div class="slide_container">
                        <?php echo constant("font_size"); ?>
                        <input id="range_slider" type="range" min="15" max="25" value="15" class="range_slider">
                        <span class="range_slider_value">0</span>
                    </div>

                </div>
                <div class="menu">
                    <ul>
                        <?php
                        // Lay ra danh sach menu cha
                        $temp = array();
                        $arrayChild = array();
                        $check = null;
                        foreach ($listMenu as $menu) {
                            if ($check != $menu['menu_id']) {
                                if (!isset($menu['parent_id'])) {
                                    if ($menu['href'] == '#') {
                        ?>
                                        <li class="dropdown"><a href="#"><?php echo constant($menu['name']); ?></a>
                                        <?php
                                    } else { ?>
                                        <li class="dropdown"><a href="?controller=<?php echo $menu['name'] ?>&act=showAll<?php echo '&lang=' . $_SESSION['lang'] ?>"><?php echo constant($menu['name']); ?></a>
                                    <?php
                                    }
                                } ?>
                                    <ul class="dropdown-content">
                                        <?php
                                        $check = $menu['menu_id'];
                                        foreach ($listMenu as $menu) {
                                            if ($check == $menu['parent_id'] && isset($menu['parent_id'])) {
                                        ?>
                                                <li class="dropdown"><a href="?controller=category&categoryName=<?php echo $menu['name']; ?>&act=showAll<?php echo '&lang=' . $_SESSION['lang'] ?>"><?php echo constant($menu['name']); ?></a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                        </li>
                                <?php
                            }
                        }
                                ?>
                    </ul>
                </div>
                <div class="copyright">
                    <p>Created by Xuan Nguyn</a></p>
                </div>
            </div>
        </div>

        <!-- RIGHTPART -->
        <div class="rightpart">
            <div class="rightpart_in">
                <?php
                if (isset($_GET['controller'])) {
                    $result = include_once "home/controllers/" . $_GET['controller'] . "Controller.php";
                    if (!$result) {
                        echo "<script>window.location.href='?controller=home&act=notfound</script>";
                    }
                } else {
                    $_GET['controller'] = 'home';
                    $_GET['act'] = 'showAll';
                    include_once "home/controllers/" . $_GET['controller'] . "Controller.php";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /RIGHTPART -->

    <!-- CURSOR -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- /CURSOR -->
    <!-- WRAPPER ALL -->

    <!-- / WRAPPER ALL -->

    <!-- SCRIPTS -->
    <script src="home/assets/js/jquery.js"></script>
    <script src="home/assets/js/plugins.js"></script>
    <script src="home/assets/js/init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="home/assets/js/script_custom.js"></script>
    <!-- /SCRIPTS -->

</body>

</html>