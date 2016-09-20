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

        <script src="../jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="../geolocator.min.js"></script>
        <script type="text/javascript">
            // Success Callback
            function onGeoSuccess(location) {
                var unitCode;
                if (location.address.countryCode == "US") {
                    unitCode = "us";
                } else if (location.address.countryCode == "GB") {
                    unitCode = "uk";
                } else {
                    unitCode = "ca";
                }
                getForecast();
                var loop = setInterval(function(){getForecast()}, 120000);
                function getForecast() {
                    var strForecast = '<iframe id="forecast_embed" style="background:#000000;" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=' + location.coords.latitude 
                        + '&lon=' + location.coords.longitude 
                        + '&name=' + location.address.city + '&color=#FFFFFF&text-color=#FFFFFF&font=Arial&units=' + unitCode + '"></iframe>';
                    console.log(strForecast);
                    document.getElementById('geo-forecast').innerHTML = strForecast;
                    document.body.style.backgroundImage="none"
                }
                if (location.address.countryCode == "US") {
                    jQuery(document).ready(function($) {
                        $.ajax({
                            url : 'https://api.forecast.io/forecast/4a71ece462e94548186cf04c809ec550/' + location.coords.latitude + ',' + location.coords.longitude,
                            dataType : "jsonp",
                            success : function(parsed_json) {
                                console.log(parsed_json);    
                                var strAlerts;
                                if(parsed_json.hasOwnProperty('alerts')) {
                                    $.each(parsed_json.alerts, function(i, item) {
                                        console.log(item);
                                        var date = new Date(0);
                                        date.setUTCSeconds(item.time);
                                        var fromStr = date.toString();
                                        date.setUTCSeconds(item.expires);
                                        var untilStr = date.toString();
                                        strAlerts = '<font size="5" color="red">' + item.title + '</font><br />' + 
                                            '<font size="4">From ' + fromStr + '</font><br />' +
                                            '<font size="4">Until ' + untilStr + '</font><br /><br />' +
                                            item.description + '<br /><br />';
                                    });
                                    if (strAlerts != null) {
                                         document.getElementById('geo-alerts').innerHTML = strAlerts;
                                    }
                                }
                            }
                        });
                    });
                }

            }
            // Error Callback
            function onGeoError(message) {
                console.log(message);
                document.body.style.backgroundImage="url('../teslalogo.png')";
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

<div id="geo-forecast"></div>
<br>
<div id="geo-alerts" style="width:960px;text-align:left;"></div>

<?php
include('../footer.inc.php');
?>
