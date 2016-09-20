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

<?php
include('../header2.inc.php');
?>

        <div id="plugshare">
            <iframe id="plugshare_iframe" src="http://tesla.plugshare.com" frameborder="0" />
        </div>
        <script type="text/javascript">
            document.getElementById('plugshare_iframe').onload= function() {
                document.body.style.backgroundImage="none";                
            };
        </script>

<?php
include('../footer.inc.php');
?>

