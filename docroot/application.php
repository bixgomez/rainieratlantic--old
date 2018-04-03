<?php

// Set directory and database choices, depending on where site is accessed

/*
// Application variables for local server
<cfset application.rootdir="C:\Inetpub\wwwroot\www_rainieratlantic">
<cfset application.imagedir="C:\Inetpub\wwwroot\www_rainieratlantic\images">
<cfset application.datasource="RainierAtlantic">
<cfset application.sitetable="RainierAtlantic">

// Application variables for remote server
<cfset application.rootdir="D:\servers\cosmicbook\htdocs\rainieratlantic">
<cfset application.imagedir="D:\servers\cosmicbook\htdocs\rainieratlantic\images">
<cfset application.datasource="RainierAtlantic database">
<cfset application.sitetable="RainierAtlantic">
*/

$GLOBALS['foo'] = 'bar';

// set default height and width of the big map 
$GLOBALS['app_bigmapwidth'] = 2145; /* application.bigmapwidth */
$GLOBALS['app_bigmapheight'] = 814; /* application.bigmapheight */

// set default height and width of the guide map 
$GLOBALS['app_guidefactor'] = 1.25; /* application.guidefactor */
$GLOBALS['app_guidemapwidth'] = ($GLOBALS['app_guidefactor'] * 478);
$GLOBALS['app_guidemapheight'] = ($GLOBALS['app_guidefactor'] * 180);

$GLOBALS['app_redboxwidth'] = ($GLOBALS['app_guidefactor'] * 45);
$GLOBALS['app_redboxheight'] = ($GLOBALS['app_redboxwidth']);

// factor tests, based on widths and heights of maps 
$GLOBALS['app_bmapfactor'] =  0.27855; /* application.bmapfactor */

// set the dimensions of the red guide box 
$GLOBALS['app_guidebox'] = ($GLOBALS['app_bmapfactor'] * 288); /* application.guidebox */

// distance, in pixels, the big maps move with each click. 
$GLOBALS['app_bigmapmove'] = (96); /* application.bigmapmove */

// Base values for big maps and red box; distance, in pixels, from top and left of frames. 
$GLOBALS['app_bigmapbasetop'] = 0;
$GLOBALS['app_bigmapbaseleft'] = 0;
$GLOBALS['app_redboxbasetop'] = 0;
$GLOBALS['app_redboxbaseleft'] = 0;

$GLOBALS['app_bigmapslimit'] = $GLOBALS['app_bigmapbasetop'] - $GLOBALS['app_bigmapheight'] + 288;
$GLOBALS['app_bigmapelimit'] = $GLOBALS['app_bigmapbaseleft'] - $GLOBALS['app_bigmapwidth'] + 288;

// SESSION VARIABLES
if (isset($reset)) {
  $_SESSION['sess_bigmaptop']  = $GLOBALS['app_bigmapbasetop'];
  $_SESSION['sess_bigmapleft'] = $GLOBALS['app_bigmapbaseleft'];
  $_SESSION['sess_redboxtop']  = $GLOBALS['app_redboxbasetop'];
  $_SESSION['sess_redboxleft'] = $GLOBALS['app_redboxbaseleft'];
}

if (!isset($_SESSION['sess_bigmaptop']))  {
	$_SESSION['sess_bigmaptop']  = $GLOBALS['app_bigmapbasetop'];
}

if (!isset($_SESSION['sess_bigmapleft'])) {
	$_SESSION['sess_bigmapleft'] = $GLOBALS['app_bigmapbaseleft'];
}

if (!isset($_SESSION['sess_redboxtop']))  { 
	$_SESSION['sess_redboxtop']  = $GLOBALS['app_redboxbasetop'];
}

if (!isset($_SESSION['sess_redboxleft'])) { 
	$_SESSION['sess_redboxleft'] = $GLOBALS['app_redboxbaseleft'];
}
