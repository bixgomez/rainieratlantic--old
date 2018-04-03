<?php

// Display all the info below.
print 'app_guidebox = ' . $GLOBALS['app_guidebox'] . ' x ' . $GLOBALS['app_guidebox'] . '<br />';
print 'sess_bigmaptop, left = ' . $_SESSION['sess_bigmaptop'] . ', ' . $_SESSION['sess_bigmapleft'] . '<br />';
print 'sess_redboxtop, left = ' . $_SESSION['sess_redboxtop'] . ', ' . $_SESSION['sess_redboxleft'] . '<br />';

/*

// These variables don't seem to ever be set anywhere.

if (!empty($bmaptdist) {
  print 'bmaptdist = ' . $bmaptdist . '<br />';
}

if (isset($bmapldist) {
  print 'bmapldist = ' . $bmapldist . '<br />';
}

if (isset($rboxtdist) {
  print 'rboxtdist = ' . $rboxtdist . '<br />';
}

if (isset($rboxldist) {
  print 'rboxldist = ' . $rboxldist . '<br />';
}

*/

print 'app_bigmapslimit = ' . $GLOBALS['app_bigmapslimit'] . '<br />';
print 'app_bigmapelimit = ' . $GLOBALS['app_bigmapelimit'] . '<br />';

/*

// need to sort this out.

if (isset($cursort) && isset($cursorl) && isset($realt) && isset($reall)) {
	print 'cursort = ' . $cursort . '<br />';
	print 'cursorl = ' . $cursorl . '<br />';
	print 'realt = ' . $realt . '<br />';
	print 'reall = ' . $reall . '<br />';
}
*/