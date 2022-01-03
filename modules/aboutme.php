<?php

include("../modules/connection.php");

class Me {
    public
        $name,
        $alias,
        $aboutme;
    
    function __construct($name, $alias, $aboutme) {
        $this->name = $name;
        $this->alias = $alias;
        $this->aboutme = $aboutme;
    }

    function get_name() {
        return $this->name;
    }

    function get_alias() {
        return $this->alias;
    }

    function get_aboutme() {
        return $this->aboutme;
    }
}

$SQL_Result = $SQL_Handle->query("SELECT * FROM aboutme");
$SQL_Row = $SQL_Result->fetch_array();

$Me = new Me($SQL_Row['aboutme_name'], $SQL_Row['aboutme_alias'], $SQL_Row['aboutme_content']);

?>

<div class="aboutme">
    <div class="aboutme-inner">
        <div class="aboutme-content">
            <img src="../resources/aboutme.jpg" alt="photo-of-me">
            <h1 id="aboutme-title">About Me</h1>
                <?='<p>My name is <b>' . $Me->get_name() . '</b>, hence the name <b>"' . $Me->get_alias() . '"</b> which is just my surname in reverse.</p>'?>
                <?=$Me->get_aboutme();?>
        </div>
    </div>
</div>