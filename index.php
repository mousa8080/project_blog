    
    <?php
    require_once "./config/db.php";
    require_once "./core/function.php";
    require_once "./core/validation.php";
    require_once "./views/layouts/header.php";


    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    show_Message();
    switch ($page) {
        //pages -nav
        case "/":
        case "home":
            include("./views/home.php");
            break;
        case "about-us":
            include("./views/about.php");
            break;
        case "post":
            include("./views/post.php");
            break;
        case "contact":
            include("./views/contact.php");
            break;
        //register-user
        case "register":
            include("./views/auth/register.php");
            break;
        //login-user
        case "login":
            include("./views/auth/login.php");
            break;
        //login-user
        case "sign-up":
            include("./controllers/auth/register_controller.php");
            break;
        //login-user
        case "logout":
            include("./controllers/auth/logoutController.php");
            break;
        //login-user
        case "login-controller":
            include("./controllers/auth/login_Controller.php");
            break;
        default:
            include("./views/maintenance.php");
            break;
    }
    require_once "./views/layouts/footer.php";
