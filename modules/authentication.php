<?php

define('REGISTER', 1);
define('LOGIN', 2);

$auth_type = array(
    array("Register an Account", "REGISTER"),
    array("Login Your Account", "LOGIN"),
);

function validate_credentials($type) {
    switch($type) {
        case REGISTER: {
            if(preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST['register_name'])) return false;
            if(empty($_POST['register_name']) || empty($_POST['register_pass']) || empty($_POST['register_confirm_pass'])) return false;
            if($_POST['register_name'] == 'Username' || $_POST['register_pass'] == 'Password' || $_POST['register_confirm_pass'] == 'Password') return false;
            if($_POST['register_pass'] != $_POST['register_confirm_pass']) return false;
            break;
        }
        case LOGIN: {
            if(preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST['login_name'])) return false;
            if(empty($_POST['login_name']) || empty($_POST['login_pass'])) return false;
            if($_POST['login_name'] == 'Username' || $_POST['login_pass'] == 'Password') return false;
            break;
        }
    }
    
    return true;
}
