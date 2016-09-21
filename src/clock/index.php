<!-- 
    This file is part of QuickTesla (http://qTes.la)

    © Copyright 2016 TachyonDev, LLC. All rights reserved. 

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
    #clock {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -125px;
        margin-left: -150px;
    }
</style>

        <script src="../jquery-2.1.0.min.js"></script>
        <script type="text/javascript">
            // Success Callback
            function onGeoSuccess(location) {
                console.log(location);
                var strSensor = false;
                if(location.ipGeoSource == null) {
                    strSensor = true;
                }
                var strQuery = 'http://api.timezonedb.com/?lat=' +  
                            location.coords.latitude + '&lng=' + 
                            location.coords.longitude + '&time=' + 
                            Math.floor(location.timestamp/1000) + '&format=json&key=<?=$_key_timezone?>';
                console.log(strQuery);
                jQuery(document).ready(function($) {
                    $.ajax({
                        crossDomain: true,
                        url : strQuery,
                        dataType : "jsonp",
                        success : function(json) {
                            console.log(json);
                            var gmtOffset = json.gmtOffset / 3600;
                            console.log(gmtOffset);
                            document.getElementById('clock').innerHTML = '<canvas id="c1" class="CoolClock:chunkySwissOnBlack:150:seconds:' + gmtOffset + '"></canvas>';
                            CoolClock.findAndCreateClocks();
                            document.body.style.backgroundImage="none"
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            document.getElementById('clock').innerHTML = '<canvas id="c1" class="CoolClock:chunkySwissOnBlack:150"></canvas>';
                            CoolClock.findAndCreateClocks();
                        } 
                    });
                });
            }
            // Error Callback
            function onGeoError(message) {
                console.log(message);
            }
            // Load Event Handler
            window.onload = function () {
                var html5Options = { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 };
                navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError, html5Options);
            }
        </script>
        <script src="coolclock.js" type="text/javascript"></script>

<?php
include('../header2.inc.php');
?>

<div id="clock" />

<?php
include('../footer.inc.php');
?>

