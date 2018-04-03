<!--- This is the map on the right --->
<?php
	if (!isset($lilmapchoice)) {
		$lilmapchoice = '1950';
	}
?>

<!--- THE SMALL MAP --->
<div id="map-window--lilmap" class="map-window map-window--lilmap">
  <img
    id="lilmap"
    src="maps/<?php print $lilmapchoice; ?>.jpg"
    style="
        width:<?php print $GLOBALS['app_bigmapwidth']; ?>px;
        height:<?php print $GLOBALS['app_bigmapheight']; ?>px;
        top:<?php print $_SESSION['sess_bigmaptop']; ?>px;
        left:<?php print $_SESSION['sess_bigmapleft']; ?>px;
        ">
  </img>
</div>

<!--- Red Ball --->
<div id="redball" style="position:absolute; width:9px; height:9px; z-index:5; top:1000; left:1000"><img src="i/redball.gif" width=9 height=9 border=0 alt=""></div>

<!-- the form -->
<form class="map-chooser">
  <select name="lilmapchoice">
    <option value="1908" <?php if($lilmapchoice == '1908') { print 'selected'; } ?>>1908 Baist Map</option>
    <option value="1936" <?php if($lilmapchoice == '1936') { print 'selected'; } ?>>1936 Aerial Photo</option>
    <option value="1950" <?php if($lilmapchoice == '1950') { print 'selected'; } ?>>1950 Kroll Map</option>
    <option value="1960" <?php if($lilmapchoice == '1960') { print 'selected'; } ?>>1960 Aerial Photo</option>
    <option value="1987" <?php if($lilmapchoice == '1987') { print 'selected'; } ?>>1987 Kroll Map</option>
    <option value="1995" <?php if($lilmapchoice == '1995') { print 'selected'; } ?>>1995 Aerial Photo</option>
  </select>
</form>
