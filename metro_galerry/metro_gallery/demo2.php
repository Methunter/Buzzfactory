<!DOCTYPE html>
<html>
    <head>
        <title>MelonHTML5 - Metro Gallery</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                    <input type="radio" name="animaction" value="flip" onClick="changeAnimation('flip');" /><span class="label">Flip</span>
                    <input type="radio" name="animaction" value="fade" onClick="changeAnimation('fade');" checked="checked" /><span class="label">Fade</span>
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
                        <option value="10" />10 Column
                        <option value="8" />8 Column
                        <option value="6" />6 Column
                        <option value="4" />4 Column
                        <option value="2" />2 Column
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
            <div class="metro_gallery fade vertical lightbox" style="width:auto;">
                <div class="tile tile_2x2 blue">
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                    <img src="images/king.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_2x2 red">
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                </div>
                <div class="tile tile_2x2 orange">
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />The Dutchman worked the ball onto his left foot at the Stadium of Light and fired in a shot but it took a deflection off Titus Bramble and will go down as an own goal against the Black Cats centre-back.</p>
                    </div>
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                </div>
                <div class="tile tile_2x2 green">
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />The Dutchman worked the ball onto his left foot at the Stadium of Light and fired in a shot but it took a deflection off Titus Bramble and will go down as an own goal against the Black Cats centre-back.</p>
                    </div>
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_2x2 yellow">
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                </div>
                <div class="tile tile_2x2 darkred">
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_2x2 white">
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                </div>
                <div class="tile tile_2x2 purple">
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />The Dutchman worked the ball onto his left foot at the Stadium of Light and fired in a shot but it took a deflection off Titus Bramble and will go down as an own goal against the Black Cats centre-back.</p>
                    </div>
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                </div>
                <div class="tile tile_2x2 grey">
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />The Dutchman worked the ball onto his left foot at the Stadium of Light and fired in a shot but it took a deflection off Titus Bramble and will go down as an own goal against the Black Cats centre-back.</p>
                    </div>
                </div>
                <div class="tile tile_2x2 darkgreen">
                    <img src="images/tshirt.jpg" data-caption="ManUtd" />
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                </div>
                <div class="tile tile_2x2 darkblue">
                    <div>
                        <p><b>Sir Alex Ferguson</b><br />is backing Robin van Persie to end his goal drought but feels United's top scorer was unlucky not to be credited with the winner at Sunderland last weekend.</p>
                    </div>
                    <img src="images/king.jpg" data-caption="ManUtd" />
                    <img src="images/rooney.jpg" data-caption="Rooney" />
                </div>
            </div>
        </div>
        <div id="footer">
           <a id="profile" href="http://scriptgates.com" target="_blank"><span>BY SCRIPTGATES.COM</span></a>
            <div id="demo_links"><a href="index.php">Demo 1</a><a href="demo2.php" class="active">Demo 2: Custom HTML</a><a href="demo3.php">Demo 3: Multiple Instances</a><a href="demo4.php">Demo 4: Video</a></div>
           
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