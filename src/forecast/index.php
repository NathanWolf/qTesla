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
<!DOCTYPE html>
<html>
    <head>
        <title>qTesla Forecast</title>
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
                background-image:url('../spinner.gif');
                background-repeat:no-repeat;
                background-attachment:fixed;
                background-position:center;      
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
        </style>

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
    </head>

    <body style="margin:0px;padding:0px;overflow:hidden">
        <home><span style="font-size: 28px"><a href="../">qTesla</a></span></home>
        <donate><span style="font-size: 24px"><a href="../help">Help</a></span></donate>
        <center>
            <br>
            <br>
            <span style="font-size: 38px"><a href="../forecast" class="red">Forecast</a> &middot; <a href="../radar">Radar</a> &middot; <a href="../plugshare">PlugShare</a> &middot; <a href="../waze">Waze</a> &middot; <a href="../stock">Stock</a></span>
        </center>       
            <br>
            <br>
        <center>
            <div id="geo-forecast"></div>
            <br>
            <div id="geo-alerts" style="width:960px;text-align:left;"></div>
        </center>       
    </body>
</html>
