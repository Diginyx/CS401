<?php
if (isset($_SESSION["status"])) 
{
    $statuses = $_SESSION["status"];
    unset($_SESSION["status"]);
    foreach ($statuses as $status)
    {
        echo "<div class='wrapper " . $_SESSION["sentiment"] . "'>" .  $status . "<span class='close'></span></div>";
    }
}