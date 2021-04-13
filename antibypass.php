<?php 
echo $_SERVER["HTTP_REFERER"] . "<br>"; //in case you want to check for the header first

function checkforbypass($check_for_header)
{
    $check_for_header;

    $result1 = "https://rscripts.net/workspace/ab/checkpoint";
    $result2 = "Bypassed... why not give money men";

    if (($check_for_header !== false)) {
        header("Location:" . "$result1");

        session_start();

        $_SESSION['reached'] = time(); // Update session
        $_SESSION['authorized'] = time(); // Update session

        sleep(2);
    } else {
        echo $result2;
    }
}

checkforbypass(strpos($_SERVER["HTTP_REFERER"], "https://mboost.me/"));//e.g. add https://linkvertise.com/ - in order to prevent people from skipping the linkvertise link
