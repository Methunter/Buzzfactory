<!DOCTYPE html>
<html>
    <head>
        <title>MelonHTML5 - Metro Gallery</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../demo.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/metro_gallery.css" />
        <script type="text/javascript" src="javascript/jquery.js"></script>
        <script type="text/javascript" src="javascript/hammer.js"></script>
        <script type="text/javascript" src="javascript/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="javascript/metro_gallery.min.js"></script>
        <script type="text/javascript" src="javascript/demo.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="header">
            <a id="setting_switch"></a>
            <div id="settings">
                <div class="arrow"></div>
                <div class="row">
                    <label>Animation</label>
                    <input type="radio" name="animaction" value="flip" onClick="changeAnimation('flip');" checked="checked" /><span class="label">Flip</span>
                    <input type="radio" name="animaction" value="fade" onClick="changeAnimation('fade');" /><span class="label">Fade</span>
                    <br />
                    <input type="radio" name="animaction" value="scale" onClick="changeAnimation('scale');" /><span class="label">Scale</span>
                    <input type="radio" name="animaction" value="" onClick="changeAnimation('');" /><span class="label">None</span>
                </div>
                <div class="row">
                    <label>Direction:</label>
                    <input type="radio" name="direction" value="vertical" onClick="changeDirection('vertical');" checked="checked" /><span class="label">Up/Down</span>
                    <input type="radio" name="direction" value="horizontal" onClick="changeDirection('horizontal');" /><span class="label">Left/Right</span>
                </div>
                <div class="row">
                    <label>Colour:</label>
                    <select onChange="changeColour(this.value);">
                        <option selected="selected" value="" />Custom
                        <option value="Blue" />Blue
                        <option value="Orange" />Orange
                        <option value="Red" />Red
                        <option value="Green" />Green
                        <option value="Yellow" />Yellow
                        <option value="Grey" />Grey
                        <option value="Purple" />Purple
                        <option value="Darkblue" />Darkblue
                        <option value="Darkred" />Darkred
                        <option value="Darkgreen" />Darkgreen
                        <option value="White" />White
                    </select>
                </div>
                <div class="row">
                    <label>Others:</label>
                    <input type="checkbox" onClick="toggleLightbox(this.checked);" disabled="disabled" /><span class="label">Lightbox</span>
                    <input type="checkbox" onClick="toggleBlackWhite(this.checked);" /><span class="label">Black & White</span>
                </div>
            </div>
        </div>
        <div id="main">
            <div style="width:1410px;">
                <div class="metro_gallery flip vertical lightbox" style="float:left;width:880px;">
                    <div class="tile tile_4x2 white">
                        <img src="images/ferguson.jpg" data-caption="Ferguson" data-link="http://www.manutd.com" />
                        <img src="images/paper.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rio.jpg" data-caption="ferdinand" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                </div>
                <div class="metro_gallery flip vertical lightbox" style="float:left;width:440px;">
                    <div class="tile tile_4x2 white">
                        <img src="images/ferguson.jpg" data-caption="Ferguson" data-link="http://www.manutd.com" />
                        <img src="images/paper.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rio.jpg" data-caption="ferdinand" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_2x2 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                    </div>
                    <div class="tile tile_1x1 white">
                        <img src="images/rooney.jpg" data-caption="Rooney" data-link="http://www.manutd.com" />
                        <img src="images/king.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                        <img src="images/tshirt.jpg" data-caption="ManUtd" data-link="http://www.manutd.com" />
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div id="footer">
           <a id="profile" href="http://scriptgates.com" target="_blank"><span>BY SCRIPTGATES.COM</span></a>
            <div id="demo_links"><a href="index.php">Demo 1</a><a href="demo2.php">Demo 2: Custom HTML</a><a href="demo3.php" class="active">Demo 3: Multiple Instances</a><a href="demo4.php">Demo 4: Video</a></div>
           
        </div>
        <script type="text/javascript">
            <!-- Twitter -->
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

            <!-- Google Plus -->
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();

            $(document).ready(function() {
                $("#setting_switch").click(function(e) {
                    e.preventDefault();

                    $(this).toggleClass("active");
                    $("#settings").toggleClass("active");
                });
            });
        </script>
        <script type="text/javascript">
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

                ga.onload = function() {
                    ga.parentNode.removeChild(ga);
                };
            })();
        </script>
    </body>
</html>