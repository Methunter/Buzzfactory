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
                    <label>Width:</label>
                    <select id="column_num" onChange="changeWidth(this.value);">
                        <option value="" selected="selected" />fluid
                        <option value="9" selected="selected" />9 Column
                        <option value="8" />8 Column
                        <option value="7" />7 Column
                        <option value="6" />6 Column
                        <option value="5" />5 Column
                        <option value="4" />4 Column
                        <option value="3" />3 Column
                        <option value="2" />2 Column
                        <option value="1" />1 Column
                    </select>
                </div>
                <div class="row">
                    <label>Others:</label>
                    <input type="checkbox" onClick="toggleLightbox(this.checked);" checked="checked" /><span class="label">Lightbox</span>
                    <input type="checkbox" onClick="toggleBlackWhite(this.checked);" /><span class="label">Black & White</span>
                </div>
                <div class="row">
                    <label>Base Size: (tile 1x1)</label>
                    <input type="number" id="base_size" value="100" />
                </div>
                <div class="row">
                    <label>Gutter:</label>
                    <input type="number" id="gutter" value="10" />
                </div>
                <div class="row">
                    <label>Scale (on hover):</label>
                    <input type="text" id="scale" value="1.4" />
                </div>
                <input type="button" value="Apply" id="gallery_setting_apply" />
            </div>
        </div>
        <div id="main">
            <div class="metro_gallery flip vertical lightbox" style="width:990px;">
                <div class="tile tile_1x1 blue">
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_1x1 darkred">
                    <img src="images/king.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_1x2 orange">
                    <img src="images/giggs.jpg" data-caption="Giggs" />
                    <img src="images/beckham.jpg" data-caption="Beckham" />
                </div>
                <div class="tile tile_2x1 red">
                    <img src="images/ferguson.jpg" data-caption="Ferguson" />
                    <img src="images/rio.jpg" data-caption="ferdinand" />
                </div>
                <div class="tile tile_2x2 purple">
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_1x1 darkred">
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                </div>
                <div class="tile tile_1x1 grey">
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                    <img src="images/ronaldo.jpg" data-caption="Ronaldo" />
                </div>
                <div class="tile tile_2x1 orange">
                    <img src="images/paper.jpg" data-caption="ManUtd" />
                    <img src="images/ferguson.jpg" data-caption="Ferguson" />
                </div>
                <div class="tile tile_3x3 green">
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_2x1 purple">
                    <img src="images/rio.jpg" data-caption="ferdinand" />
                    <img src="images/paper.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_2x3 yellow">
                    <img src="images/group.jpg" data-caption="Group" />
                    <img src="images/manutd_logo.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_4x2 darkblue">
                    <img src="images/ferguson.jpg" data-caption="Ferguson" />
                    <img src="images/paper.jpg" data-caption="ManUtd" />
                    <img src="images/rio.jpg" data-caption="ferdinand" />
                </div>
                <div class="tile tile_3x1 darkred">
                    <img src="images/champ.jpg" data-caption="EPL Champion" />
                    <img src="images/cloth.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_3x1 darkgreen">
                    <img src="images/wallpaper.jpg" data-caption="ManUtd" />
                    <img src="images/champ.jpg" data-caption="EPL Champion" />
                </div>
            </div>
        </div>
        <div id="footer">
           <a id="profile" href="http://scriptgates.com" target="_blank"><span>BY SCRIPTGATES.COM</span></a>
            <div id="demo_links"><a href="index.php" class="active">Demo 1</a><a href="demo2.php">Demo 2: Custom HTML</a><a href="demo3.php">Demo 3: Multiple Instances</a><a href="demo4.php">Demo 4: Video</a></div>
            
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