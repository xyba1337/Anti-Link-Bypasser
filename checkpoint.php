<?php
session_start();

$minutes = 2;//change to your likings.
$convert_minutes = $minutes * 60;
ini_set('session.gc_maxlifetime', $convert_minutes); // set the session max lifetime to 2 minutes

if (isset($_SESSION['reached']) && isset($_SESSION["authorized"]) && (time() - $_SESSION['reached'] > $convert_minutes) && (time() - $_SESSION['authorized'] > $convert_minutes)) {
    // last request was more than 2 minutes ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}


if (isset($_SESSION["reached"]) &&  isset($_SESSION["authorized"])) {
    echo "authorized => You can now continue! <br>";
    echo "<button>Continue here</button>";

    $_SESSION['reached'] = time(); // Update session
    $_SESSION['authorized'] = time(); // Update session
    exit();
} else {
    echo "stop bypassing man... go through <a href='#'>this</a> link first:";
    exit();
}
?>
