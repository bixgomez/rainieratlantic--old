<!-- This is the map on the left, which includes all navigation controls -->
<?php
	if (!isset($bigmapchoice)) {
		$bigmapchoice = '1908';
	}
?>

<?php /* ?>
<SCRIPT LANGUAGE="JavaScript">
  function locate(evt) {
    topVal = eval(event.y);
    leftVal = eval(event.x);
    document.coords.cursorl.value = leftVal;
    document.coords.cursort.value = topVal;
	}
  function load(url1,url2) {
    window.parent.info.location.href=url1;
    window.parent.nav.location.href=url2;
  }
</script>
<?php */ ?>

<!-- THE BIG MAP -->
<div id="map-window--bigmap" class="map-window map-window--bigmap">
  <img
    id="bigmap"
    src="maps/<?php print $bigmapchoice; ?>.jpg"
    style="
      width:<?php print $GLOBALS['app_bigmapwidth']; ?>px;
      height:<?php print $GLOBALS['app_bigmapheight']; ?>px;
      top:<?php print $_SESSION['sess_bigmaptop']; ?>px;
      left:<?php print $_SESSION['sess_bigmapleft']; ?>px;
    ">
  </img>
</div>

<!-- The FOUR COORDINATES -->
<img class="directional" id="north" src="i/n.gif" width=24 height=25 border=0 alt="">
<img class="directional" id="south" src="i/s.gif" width=24 height=25 border=0 alt="">
<img class="directional" id="east" src="i/e.gif" width=24 height=25 border=0 alt="">
<img class="directional" id="west" src="i/w.gif" width=24 height=25 border=0 alt="">

<!-- The RED BALL -->
<div id="redball" style="position:absolute; width:9px; height:9px; z-index:5; top:1000; left:1000"><img src="i/redball.gif" width=9 height=9 border=0 alt=""></div>

<!-- the form -->
<form class="map-chooser">
  <select name="bigmapchoice">
    <option value="1908" <?php if($bigmapchoice == '1908') { print 'selected'; } ?>>1908 Baist Map</option>
    <option value="1936" <?php if($bigmapchoice == '1936') { print 'selected'; } ?>>1936 Aerial Photo</option>
    <option value="1950" <?php if($bigmapchoice == '1950') { print 'selected'; } ?>>1950 Kroll Map</option>
    <option value="1960" <?php if($bigmapchoice == '1960') { print 'selected'; } ?>>1960 Aerial Photo</option>
    <option value="1987" <?php if($bigmapchoice == '1987') { print 'selected'; } ?>>1987 Kroll Map</option>
    <option value="1995" <?php if($bigmapchoice == '1995') { print 'selected'; } ?>>1995 Aerial Photo</option>
  </select>
</form>
