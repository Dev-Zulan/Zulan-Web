<?php

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
    
    function set_aboutme($aboutme) {
        $this->aboutme = $aboutme;
    }
}

$Me = new Me("Alfredo Roi B. Naluz", "Zulan", "");

$Me->set_aboutme('
<p>
    My name is <b>Alfredo Roi B. Naluz</b>, hence the name <b>"Zulan"</b> which is just my surname in reverse. I\'m a Developer and mostly taught myself how to code and stuffs, which I find more effective for me. I first started getting fond of programming when I was in middle school, I forgot how that caught my interest. The first programming language I tried is C++ and made a simple calculator program that takes 2 inputs and calculates them depending on what Mathematical operation the user chooses, just simple stuffs.
</p>
<p>
    I did not focus much on my studies on programming during my High School and Senior High School years, not until I went to college and now studies Computer Science. I got back to learning more programming languages and started on some projects, mostly gaming server development.
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque at sit dolor fugiat exercitationem adipisci culpa veritatis iste dolores asperiores hic, laboriosam numquam obcaecati, aliquam minima placeat, consectetur inventore? Cupiditate ex maxime nesciunt commodi expedita neque ratione, in quis natus consectetur illo magnam omnis! Quas, aut quidem. Reprehenderit, explicabo sint?
</p>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque at sit dolor fugiat exercitationem adipisci culpa veritatis iste dolores asperiores hic, laboriosam numquam obcaecati, aliquam minima placeat, consectetur inventore? Cupiditate ex maxime nesciunt commodi expedita neque ratione, in quis natus consectetur illo magnam omnis! Quas, aut quidem. Reprehenderit, explicabo sint?
</p>
');

class Website {
    public
        $aboutweb;
    
    function __construct($aboutweb) {
        $this->aboutweb = $aboutweb;
    }

    function get_aboutweb() {
        return $this->aboutweb;
    }
    
    function set_aboutweb($aboutweb) {
        $this->aboutweb = $aboutweb;
    }
}

$Website = new Website("");

$Website->set_aboutweb('
<p>
    This website will be used as my personal website that contains my portfolio and other stuffs. I started making the website on December 9, 2021 for a project in my school which I used an opportunity to make it my own personal website.
</p>
<p>
    I rented a domain name for it on December 15, 2021 (zulan.best) just for general purposes.
</p>
<p>
    The website\'s source is available publicly in its repository on my GitHub account at <a href="https://github.com/Dev-Zulan/Zulan-Web" target="_blank">[https://github.com/Dev-Zulan/Zulan-Web]. </a>
</p>
<p>
    This is the very first website I "actually" made and I\'m quite happy of the results even if it\'s not fully finished yet. I can admit that the production of the website is slow since I am just coding it on my leisure.
</p>
<p>
    After I passed it on the deadline, since the project is open-source, I might let other people make pull requests so I can make it a fully open-source project. 
</p>
');

?>

<div class="aboutme">
    <div class="aboutme-inner">
        <div class="aboutme-content">
            <img src="../resources/aboutme.jpg" alt="photo-of-me">
            <h1 id="aboutme-title">About Me</h1>
            <?php
                echo $Me->get_aboutme();
            ?>
        </div>
    </div>
    <div class="aboutme-inner">
        <div class="aboutme-content">
            <h1 id="aboutme-title">Website</h1>
            <?php
                echo $Website->get_aboutweb();
            ?>
        </div>
    </div>
</div>