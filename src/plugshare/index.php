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
        <title>qTesla PlugShare</title>
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
            div#plugshare {
                position: fixed;
                width: 100%;
                height: 100%;
            }
            div#plugshare > iframe {
                display: block;
                width: 100%;
                height: 100%;
                border: none;
            }
        </style>
        
        <script src="../jquery-2.1.0.min.js"></script>
        <script type="text/javascript">
            $(window).resize(function() {
                document.body.style.backgroundImage="url('../spinner.gif')";
                var iframe = document.getElementById('plugshare_iframe');
                iframe.src = iframe.src;
            });
        </script>
    </head>

    <body style="margin:0px;padding:0px;overflow:hidden">
        <home><span style="font-size: 28px"><a href="../">qTesla</a></span></home>
        <donate><span style="font-size: 24px"><a href="../help">Help</a></span></donate>
        <center>
            <br>
            <br>
            <span style="font-size: 38px"><a href="../forecast">Forecast</a> &middot; <a href="../radar">Radar</a> &middot; <a href="../plugshare" class="red">PlugShare</a> &middot; <a href="../waze">Waze</a> &middot; <a href="../stock">Stock</a></span>
        </center>
        <br>
        <div id="plugshare">
            <iframe id="plugshare_iframe" src="http://tesla.plugshare.com" frameborder="0" />
        </div>
        <script type="text/javascript">
            document.getElementById('plugshare_iframe').onload= function() {
                document.body.style.backgroundImage="none"                
            };
        </script>
    </body>
</html>
