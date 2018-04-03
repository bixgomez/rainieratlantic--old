<!--- This is the map on the bottom; the "guide" map --->
<div class="map-window map-window--guidemap"
     style="
         width:<?php print $GLOBALS['app_guidemapwidth']; ?>px;
         height:<?php print $GLOBALS['app_guidemapheight']; ?>px;">

  <img
      id="guidemap"
      style="
          width:<?php print $GLOBALS['app_guidemapwidth']; ?>px;
          height:<?php print $GLOBALS['app_guidemapheight']; ?>px;"
      src="i/guidemap.gif"
      alt="" />

  <div id="redbox"
       style="
           top:<?php print $_SESSION['sess_redboxtop']; ?>px;
           left:<?php print $_SESSION['sess_redboxleft']; ?>px;">
    <div id="redbox-inner" class="inner"></div>
  </div>

  <div id="guidemap-clicker"
       style="
           width:<?php print $GLOBALS['app_guidemapwidth']; ?>px;
           height:<?php print $GLOBALS['app_guidemapheight']; ?>px;"></div>

</div>
