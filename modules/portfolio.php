<?php

$portfolio_items = array("Software Dev", "Game Dev", "Web-Design", "Digital Art", "GitHub", "Resume");

?>

<div class="portfolio-section">
    <div class="portfolio-items">
        <?php
            foreach($portfolio_items as $x=>$i) {
                $y = $x+1;
                echo '<div id="portfolio-' . $y . '" style="background-image: url(\'../resources/' . $y . '.jpeg\');">' . $i . '</div>';
            }
        ?>
    </div>
</div>

<script>
    var gitHub = document.getElementById('portfolio-5');

    gitHub.style.cursor = 'pointer';
    gitHub.onclick = function() {
        window.open('https://github.com/Dev-Zulan/', '_blank');
    };
</script>