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
</div>