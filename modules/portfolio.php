<?php

$portfolio_items = array("Software Dev", "Game Dev", "Web-Design", "Digital Art", "GitHub", "Resume");

class Portfolio {
    public
        $title,
        $img_path,
        $id;

    function __construct($title, $img_path, $id) {
        $this->title = $title;
        $this->img_path = $img_path;
        $this->id = $id;
    }

    function get_title() {
        return $this->title;
    }

    function get_image_path() {
        return $this->img_path;
    }

    function get_id() {
        return $this->id;
    }
}

$Portfolio[] = new Portfolio("Software Dev", "../resources/portfolio-1.jpeg", "portfolio-1");
$Portfolio[] = new Portfolio("Game Dev", "../resources/portfolio-2.jpeg", "portfolio-2");
$Portfolio[] = new Portfolio("Mobile Dev", "../resources/portfolio-3.jpeg", "portfolio-3");
$Portfolio[] = new Portfolio("Web-Design", "../resources/portfolio-4.jpeg", "portfolio-4");
$Portfolio[] = new Portfolio("GitHub", "../resources/portfolio-5.jpeg", "portfolio-5");
$Portfolio[] = new Portfolio("Resume", "../resources/portfolio-6.jpeg", "portfolio-6");

?>

<div class="portfolio-section">
    <div class="portfolio-items">
        <?php
            foreach($Portfolio as $x => $i) {
                echo '<div id="' . $Portfolio[$x]->get_id() . '" style="background-image: url(\'' . $Portfolio[$x]->get_image_path() . '\');">' . $Portfolio[$x]->get_title() . '</div>';
            }
        ?>
    </div>
</div>

<script>
    var gitHub = document.getElementById('portfolio-5')

    gitHub.style.cursor = 'pointer'
    gitHub.onclick = function() {
        window.open('https://github.com/Dev-Zulan/', '_blank')
    };
</script>