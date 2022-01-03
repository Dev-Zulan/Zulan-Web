<?php
class NavBar {
    public $title;
    function __construct($title) {
        $this->title = $title;
    }

    function get_title() {
        return $this->title;
    }
}

class NavPages {
    public
        $page,
        $path,
        $id;
    
    function __construct($page, $path, $id) {
        $this->page = $page;
        $this->path = $path;
        $this->id = $id;
    }

    function get_page() {
        return $this->page;
    }

    function get_path() {
        return $this->path;
    }

    function get_id() {
        return $this->id;
    }
}

$NavBar = new NavBar("Zulan");

$NavPages[] = new NavPages("HOME", "../index.php", "");
$NavPages[] = new NavPages("SERVICES", "../pages/services.php", "");
$NavPages[] = new NavPages("CONTACTS", "../pages/contacts.php", "");
$NavPages[] = new NavPages("LOGIN/REGISTER", "../pages/login.php", "auth-page");
$NavPages[] = new NavPages("USER", "../pages/user.php", "user-page");
$NavPages[] = new NavPages("ADMIN", "../pages/admin.php", "admin-page");

?>

<nav class="nav-container">
    <div class="nav-title">
        <?='<h1><a href="">' . strtoupper($NavBar->get_title()) . '</a></h1>'; ?>
    </div>
    <div class="nav-pages">
        <?php

        echo '<ul>';
        foreach($NavPages as $x => $i) {
            echo '<li id="' . $NavPages[$x]->get_id() . '"><a href="' . $NavPages[$x]->get_path() . '">' . $NavPages[$x]->get_page() . '</a></li>';
        }
        echo '</ul>';

        ?>
    </div>
</nav>

<?php
include('connection.php');

if(isset($_SESSION['user_id'])) {
    echo '<script>
            document.getElementById("auth-page").style.display = "none";
            document.getElementById("admin-page").style.display = "none";
            document.getElementById("user-page").style.display = "block";
        </script>';
    
    $SQL_Result = NULL;

    $SQL_Statement = $SQL_Handle->prepare("SELECT user_id FROM admins WHERE user_id=?");
    $SQL_Statement->bind_param('d', $_SESSION['user_id']);
    $SQL_Statement->execute();

    $SQL_Result = $SQL_Statement->get_result();
    
    if(mysqli_num_rows($SQL_Result)) {
        echo '<script>
                document.getElementById("admin-page").style.display = "block";
            </script>';
    }
} else {
    echo '<script>
            document.getElementById("user-page").style.display = "none";
            document.getElementById("admin-page").style.display = "none";
         </script>';
}

?>