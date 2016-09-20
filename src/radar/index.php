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
include('../header.inc.php');
?>

        <style type="text/css">
            div#radar {
                position: fixed;
                width: 100%;
                height: 100%;
                color:#FFFFFF;
                background-color:#000000;
                background-repeat:no-repeat;
                background-position:center;  
                background-size:cover;
                display:none;
            }
        </style>

        <script type="text/javascript" src="../geolocator.min.js"></script>
        <script type="text/javascript">
            // Success Callback
            function onGeoSuccess(location) {
                var strApi = 'http://api.wunderground.com/api/<?=$_key_weatherUnderground?>/animatedradar/image.gif?' + 
                    '&centerlat=' + location.coords.latitude +
                    '&centerlon=' + location.coords.longitude + 
                    '&width=800&height=1000&radius=100&newmaps=1&num=12&delay=25&noclutter=1';
                var radarImage = new Image();           
                radarImage.onload = function() {
                    document.getElementById('radar').style.backgroundImage = 'url(' + radarImage.src + ')';
                    document.getElementById('radar').style.display="block";
                    document.body.style.backgroundImage="none";
                };
                radarImage.src = strApi;
            }
            // Error Callback
            function onGeoError(message) {
                console.log(message);
                document.getElementById('radar').style.backgroundImage="none";
                document.body.style.backgroundImage=="url('../teslalogo.png')";
            }
            // Load Event Handler
            window.onload = function () {
                var html5Options = { enableHighAccuracy: true, timeout: 3000, maximumAge: 0 };
                geolocator.locate(onGeoSuccess, onGeoError, 0, html5Options, null);
            }
        </script>
        
<?php
include('../header2.inc.php');
?>
        
        <center>
            <div id="radar"/>
        </center> 
        
<?php
include('../footer.inc.php');
?>
