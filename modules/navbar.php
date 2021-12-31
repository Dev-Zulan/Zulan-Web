<?php

$nav_pages = array(
    array("HOME", "../index.php"),
    array("SERVICES", "../pages/services.php"),
    array("CONTACTS", "../pages/contacts.php"),
    array("LOGIN/REGISTER", "../pages/login.php"),
    array("USER", "../pages/user.php"),
    array("ADMIN", "../pages/admin.php"),
);

?>

<nav class="nav-container">
    <div class="nav-title">
        <?php echo '<h1><a href="">' . strtoupper($web_name) . '</a></h1>'; ?>
    </div>
    <div class="nav-pages">
        <?php

        echo '<ul>';

        foreach ($nav_pages as $x=>$i) {
            if($nav_pages[$x][0] == "LOGIN/REGISTER") {
                echo '<li id="auth-page"><a href="' . $nav_pages[$x][1] . '">' . $nav_pages[$x][0] . '</a></li>';
                continue;
            }
            if($nav_pages[$x][0] == "USER") {
                echo '<li id="user-page"><a href="' . $nav_pages[$x][1] . '">' . $nav_pages[$x][0] . '</a></li>';
                continue;
            }
            if($nav_pages[$x][0] == "ADMIN") {
                echo '<li id="admin-page"><a href="' . $nav_pages[$x][1] . '">' . $nav_pages[$x][0] . '</a></li>';
                continue;
            }
            echo '<li><a href="' . $nav_pages[$x][1] . '">' . $nav_pages[$x][0] . '</a></li>';
        }

        echo '</ul>';

        ?>
    </div>
</nav>

<?php
include('connection.php');

if(isset($_SESSION['user_id'])) {
    if($SQL_Statement = $SQL_Handle->prepare("SELECT `user_id` FROM `admins` WHERE `user_id`=?")) {
        $SQL_Statement->bind_param('d', $_SESSION['user_id']);
        $SQL_Statement->execute();
    
        $SQL_Result = $SQL_Statement->get_result();

        echo '<script>
                document.getElementById("auth-page").style.display = "none";
                document.getElementById("admin-page").style.display = "none";
                document.getElementById("user-page").style.display = "block";
            </script>';
        if(mysqli_num_rows($SQL_Result)) {
            echo '<script>
                    document.getElementById("admin-page").style.display = "block";
                </script>';
        }
    }
} else {
    echo '<script>
            document.getElementById("user-page").style.display = "none";
            document.getElementById("admin-page").style.display = "none";
         </script>';
}

?>