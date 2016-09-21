<?php
/**
 * Note that you need to create a src/keys.inc.php file with the following API keys (please use your own!)
 *
 * $_key_weatherUnderground = '...';
 * $_key_timezone = '...';
 * 
 */
require_once('keys.inc.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>qTesla</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <style type="text/css">
        a:link {
            color: #FFFFFF;
            text-decoration: none;
        }

        /* unvisited link */
        a:visited {
            color: #FFFFFF;
            text-decoration: none;
        }

        /* visited link */
        a:hover {
            color: #7F7F7F;
            text-decoration: none;
        }

        /* mouse over link */
        a:active {
            color: #7F7F7F;
            text-decoration: none;
        }

        /* selected link */
        a.green:link {
            color: #5FFF5F;
            text-decoration: none;
        }

        /* unvisited link */
        a.green:visited {
            color: #5FFF5F;
            text-decoration: none;
        }

        /* visited link */
        a.green:hover {
            color: #7FFF7F;
            text-decoration: none;
        }

        /* mouse over link */
        a.green:active {
            color: #7FFF7F;
            text-decoration: none;
        }

        /* selected link */
        a.red:link {
            color: #FF3F3F;
            text-decoration: none;
        }

        /* unvisited link */
        a.red:visited {
            color: #FF3F3F;
            text-decoration: none;
        }

        /* visited link */
        a.red:hover {
            color: #FF5F5F;
            text-decoration: none;
        }

        /* mouse over link */
        a.red:active {
            color: #FF5F5F;
            text-decoration: none;
        }

        /* selected link */
        a img {
            border: none;
        }

        input:focus, textarea:focus, *:focus {
            outline: none;
        }

        body {
            color: #FFFFFF;
            background-color: #000000;
            background-image: url('../spinner.gif');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Gotham Book', Gotham-Book, Arial, sans-serif;
        }

        home {
            position: fixed;
            top: 20px;
            left: 20px;
        }

        clock {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
