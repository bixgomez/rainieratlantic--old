<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Rainier Atlantic</title>

  <!-- Set js vars based on php global vars. -->
  <script type="text/javascript">

    // set default height and width of the big map
    var app_bigmapwidth = '<?php echo $GLOBALS['app_bigmapwidth'];?>';
    var app_bigmapheight = '<?php echo $GLOBALS['app_bigmapheight'];?>';

    // set default height and width of the guide map
    var app_guidefactor = '<?php echo $GLOBALS['app_guidefactor'];?>';
    var app_guidemapwidth = '<?php echo $GLOBALS['app_guidemapwidth'];?>';
    var app_guidemapheight = '<?php echo $GLOBALS['app_guidemapheight'];?>';

    // factor tests, based on widths and heights of maps
    var app_bmapfactor = '<?php echo $GLOBALS['app_bmapfactor'];?>';

    // set the dimensions of the red guide box
    var app_guidebox = '<?php echo $GLOBALS['app_guidebox'];?>';

    // distance, in pixels, the big maps move with each click.
    var app_bigmapmove = '<?php echo $GLOBALS['app_bigmapmove'];?>';

    // Base values for big maps and red box; distance, in pixels, from top and left of frames.
    var app_bigmapbasetop = '<?php echo $GLOBALS['app_bigmapbasetop'];?>';
    var app_bigmapbaseleft = '<?php echo $GLOBALS['app_bigmapbaseleft'];?>';
    var app_redboxbasetop = '<?php echo $GLOBALS['app_redboxbasetop'];?>';
    var app_redboxbaseleft = '<?php echo $GLOBALS['app_redboxbaseleft'];?>';

    var app_bigmapslimit = '<?php echo $GLOBALS['app_bigmapslimit'];?>';
    var app_bigmapelimit = '<?php echo $GLOBALS['app_bigmapelimit'];?>';

    // SESSION VARIABLES
    var sess_bigmaptop = '<?php echo $_SESSION['sess_bigmaptop'];?>';
    var sess_bigmapleft = '<?php echo $_SESSION['sess_bigmapleft'];?>';
    var sess_redboxtop = '<?php echo $_SESSION['sess_redboxtop'];?>';
    var sess_redboxleft = '<?php echo $_SESSION['sess_redboxleft'];?>';

  </script>

  <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

  <script
      src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
      integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
      crossorigin="anonymous"></script>

  <script type="application/javascript" src="js/directionals.js"></script>
  <script type="application/javascript" src="js/mapchoice.js"></script>
  <script type="application/javascript" src="js/guidemapselect.js"></script>

	<link rel="stylesheet" href="styles/css/styles.css" type="text/css">
</head>