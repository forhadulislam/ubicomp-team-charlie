<?php
    session_start();
    include_once("config.php");
    include_once("header.php");
?>
    <div class="sitemap col-md-6 col-md-offset-3">
        <h2>Sitemap</h2>
        <a href="./"><h3>Restroom Feedback</h3></a>
        <a href="./status.php"><h3>Restroom Status</h3></a>
        <a href="./stat.php"><h3>Restroom Stats</h3></a>
        <a href="./set-restroom.php"><h3>Update Current Restroom</h3></a>
        <a href="./stats-status.php"><h3>Restroom Status & Stats</h3></a>
    </div>

<?php
    include_once("footer.php");
?>