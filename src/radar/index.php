<!-- 
    This file is part of QuickTesla (http://qTes.la)

    © Copyright 2014 TachyonDev, LLC. All rights reserved. 

    QuickTesla is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, any later version.

    QuickTesla is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
-->
<?php
require_once '../keys.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>qTesla Radar</title>
		<link rel="icon" 
		      type="image/png" 
		      href="../favicon.png">
        <style type="text/css">
            a:link {color:#FFFFFF;text-decoration:none;} /* unvisited link */
            a:visited {color:#FFFFFF;text-decoration:none;}  /* visited link */
            a:hover {color:#7F7F7F;text-decoration:none;}  /* mouse over link */
            a:active {color:#7F7F7F;text-decoration:none;}  /* selected link */
            a.green:link {color:#5FFF5F;text-decoration:none;} /* unvisited link */
            a.green:visited {color:#5FFF5F;text-decoration:none;}  /* visited link */
            a.green:hover {color:#7FFF7F;text-decoration:none;}  /* mouse over link */
            a.green:active {color:#7FFF7F;text-decoration:none;}  /* selected link */
            a.red:link {color:#FF3F3F;text-decoration:none;} /* unvisited link */
            a.red:visited {color:#FF3F3F;text-decoration:none;}  /* visited link */
            a.red:hover {color:#FF5F5F;text-decoration:none;}  /* mouse over link */
            a.red:active {color:#FF5F5F;text-decoration:none;}  /* selected link */
            a img {border: none;}   
            input:focus, textarea:focus, *:focus {outline: none;}
            body
            {              
                color:#FFFFFF;
                background-color:#000000;
                font-family: 'Gotham Book', Gotham-Book, Arial, sans-serif;
            }
            home
            {
                position:fixed;
                top:20px;
                left:20px;
            }
            donate
            {
                position:fixed;
                top:20px;
                right:20px;
            }
            div#radar {
                position: fixed;
                width: 100%;
                height: 100%;
                color:#FFFFFF;
                background-color:#000000;
                background-repeat:no-repeat;
                background-position:center;  
                background-size:cover;
            }
            div#spinner {
                position: fixed;
                width: 100%;
                height: 100%;
                color:#FFFFFF;
                background-repeat:no-repeat;
                background-attachment:fixed;
                background-position:center;    
                background-image:url('../spinner.gif');  
            }
        </style>

        <script type="text/javascript" src="../geolocator.min.js"></script>
        <script type="text/javascript">
            // Success Callback
            function onGeoSuccess(location) {
                console.log(location);      
                var strApi = 'http://api.wunderground.com/api/<?=$_key_weatherUnderground?>/animatedradar/image.gif?' + 
                    '&centerlat=' + location.coords.latitude +
                    '&centerlon=' + location.coords.longitude + 
                    '&width=800&height=1000&radius=100&newmaps=1&num=12&delay=25&noclutter=1';
                var radarImage = new Image();           
                radarImage.onload = function() {
                    document.getElementById('radar').style.backgroundImage = 'url(' + radarImage.src + ')';
                    document.getElementById('spinner').style.backgroundImage="none";
                };
                radarImage.src = strApi;
            }
            // Error Callback
            function onGeoError(message) {
                console.log(message);
                document.getElementById('radar').style.backgroundImage="none";
                document.getElementById('spinner').style.backgroundImage="url('../teslalogo.png')";
            }
            // Load Event Handler
            window.onload = function () {
                var html5Options = { enableHighAccuracy: true, timeout: 3000, maximumAge: 0 };
                geolocator.locate(onGeoSuccess, onGeoError, 0, html5Options, null);
            }
        </script>
    </head>

    <body style="margin:0px;padding:0px;overflow:hidden">
        <home><span style="font-size: 28px"><a href="../">qTesla</a></span></home>
        <donate><span style="font-size: 24px"><a href="../help">Help</a></span></donate>
        <center>
            <br>
            <br>
            <span style="font-size: 38px"><a href="../forecast">Forecast</a> &middot; <a href="../radar" class="red">Radar</a> &middot; <a href="../plugshare">PlugShare</a> &middot; <a href="../waze">Waze</a> &middot; <a href="../stock">Stock</a></span>
        </center>
        <br>     
        <center>
            <div id="radar"/>
            <div id="spinner"/>
        </center>  
    </body>
</html>
