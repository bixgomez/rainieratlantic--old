$( document ).ready(function() {

  console.log( "Welcome to directionals.js" );

  // Get all the relevant elements by id, assign variables.
  var redBox = document.getElementById('redbox');
  var redBoxInner = document.getElementById('redbox-inner');
  var guideMap = document.getElementById('guidemap');
  var bigMap = document.getElementById('bigmap');
  var lilMap = document.getElementById('lilmap');
  var dirNorth = document.getElementById('north');
  var dirSouth = document.getElementById('south');
  var dirEast = document.getElementById('east');
  var dirWest = document.getElementById('west');
  var bigMapWindow = document.getElementById('map-window--bigmap');
  var lilMapWindow = document.getElementById('map-window--lilmap');

  // Set variables based on key dimensions.
  var bmwidth = parseInt( $( bigMap ).css( "width" ) );
  var bmheight = parseInt( $( bigMap ).css( "height" ) );
  var gmwidth = parseInt( $( guideMap ).css( "width" ) );
  var gmheight = parseInt( $( guideMap ).css( "height" ) );
  var winwidth = parseInt( $( bigMapWindow ).css( "width" ) );
  var winheight = parseInt( $( bigMapWindow ).css( "height" ) );

  var bigMapMove = 96;
  var bigMapMove = ( (+bmheight - +winheight) / 5 );

  /*
  console.log( 'bmwidth: ' + bmwidth );
  console.log( 'bmheight: ' + bmheight );
  console.log( 'winwidth: ' + winwidth );
  console.log( 'winheight: ' + winheight );
  console.log( 'gmwidth: ' + gmwidth );
  console.log( 'gmheight: ' + gmheight );
  */

  // Set vars representing big/guide map scale factors.
  var guideWidthFactor = ( bmwidth / gmwidth );
  var guideHeightFactor = ( bmheight / gmheight );

  // console.log( 'guideWidthFactor: ' + guideWidthFactor );
  // console.log( 'guideHeightFactor: ' + guideHeightFactor );

  // Set the guide box dimensions based on these scale factors.
  var redBoxWidth = parseInt( (winwidth / guideWidthFactor) );
  var redBoxHeight = parseInt( (winheight / guideHeightFactor) );

  // console.log( 'redBoxWidth: ' + redBoxWidth );
  // console.log( 'redBoxHeight: ' + redBoxHeight );

  // Set the guide box to our new dimensions.
  $( redBox ).css( "width", redBoxWidth);
  $( redBox ).css( "height", redBoxHeight);
  $( redBoxInner ).css( "width", (redBoxWidth - 2) );
  $( redBoxInner ).css( "height", (redBoxHeight - 2) );

  // Set vars representing distance to move the big maps with each click.
  var winWidthFactor = ( bmwidth / winwidth );
  var winHeightFactor = ( bmheight / winheight );

  // console.log( 'winWidthFactor: ' + winWidthFactor );
  // console.log( 'winHeightFactor: ' + winHeightFactor );

  // listAllGlobals();
  // listMapPos('bigmap','lilmap');

  $(dirNorth).click(function() {
    // console.log( 'North clicked' );
    // console.log( 'app_bigmapmove: ' + app_bigmapmove );
    var bmtop = $( bigMap ).css( "top" );
    var bmtopVal = parseInt( bmtop, 10 );
    var bmtopNew = ( +bmtopVal + +bigMapMove ) + 'px';
    // console.log( 'bmtop: ' + bmtop );
    // console.log( 'bmtopVal: ' + bmtopVal );
    // console.log( 'bmtopNew: ' + bmtopNew );
    $( bigMap ).css( "top", bmtopNew);
    $( lilMap ).css( "top", bmtopNew);
    restrictMapPos();
    moveRedBox();
  });

  $(dirSouth).click(function() {
    // console.log( 'South clicked' );
    // console.log( 'app_bigmapmove: ' + app_bigmapmove );
    var bmtop = $( bigMap ).css( "top" );
    var bmtopVal = parseInt( bmtop, 10 );
    var bmtopNew = ( +bmtopVal - +bigMapMove ) + 'px';
    // console.log( 'bmtop: ' + bmtop );
    // console.log( 'bmtopVal: ' + bmtopVal );
    // console.log( 'bmtopNew: ' + bmtopNew );
    $( bigMap ).css( "top", bmtopNew);
    $( lilMap ).css( "top", bmtopNew);
    restrictMapPos();
    moveRedBox();
  });

  $(dirEast).click(function() {
    // console.log( 'East clicked' );
    // console.log( 'app_bigmapmove: ' + app_bigmapmove );
    var bmleft = $( bigMap ).css( "left" );
    var bmleftVal = parseInt( bmleft, 10 );
    var bmleftNew = ( +bmleftVal - +bigMapMove ) + 'px';
    // console.log( 'bmleft: ' + bmleft );
    // console.log( 'bmleftVal: ' + bmleftVal );
    // console.log( 'bmleftNew: ' + bmleftNew );
    $( bigMap ).css( "left", bmleftNew);
    $( lilMap ).css( "left", bmleftNew);
    restrictMapPos();
    moveRedBox();
  });

  $(dirWest).click(function() {
    // console.log( 'West clicked' );
    // console.log( 'app_bigmapmove: ' + app_bigmapmove );
    var bmleft = $( bigMap ).css( "left" );
    var bmleftVal = parseInt( bmleft, 10 );
    var bmleftNew = ( +bmleftVal + +bigMapMove ) + 'px';
    // console.log( 'bmleft: ' + bmleft );
    // console.log( 'bmleftVal: ' + bmleftVal );
    // console.log( 'bmleftNew: ' + bmleftNew );
    $( bigMap ).css( "left", bmleftNew);
    $( lilMap ).css( "left", bmleftNew);
    restrictMapPos();
    moveRedBox();
  });

  function restrictMapPos() {
    var bmtopVal = parseInt( $( bigmap ).css( "top" ), 10 );
    var bmleftVal = parseInt( $( bigmap ).css( "left" ), 10 );
    var lmtopVal = parseInt( $( lilmap ).css( "top" ), 10 );
    var lmleftVal = parseInt( $( lilmap ).css( "left" ), 10 );

    /*
    console.log ( 'bmtopVal: ' + bmtopVal );
    console.log ( 'bmleftVal: ' + bmleftVal );
    console.log ( 'lmtopVal: ' + lmtopVal );
    console.log ( 'lmleftVal: ' + lmleftVal );
     */

    if (bmtopVal > app_bigmapbasetop) {
     $( bigmap ).css( "top", app_bigmapbasetop + 'px' );
     $( lilmap ).css( "top", app_bigmapbasetop + 'px' );
    }

    if (lmleftVal > app_bigmapbaseleft) {
      $( bigmap ).css( "left", app_bigmapbaseleft + 'px' );
      $( lilmap ).css( "left", app_bigmapbaseleft + 'px' );
    }

    var mapWindowHeight = parseInt( $( '.map-window' ).css( "height" ), 10 );
    var mapWindowWidth = parseInt( $( '.map-window' ).css( "width" ), 10 );
    // console.log ( app_bigmapwidth );
    // console.log ( app_bigmapheight );

    var bmMaxTop = (+mapWindowHeight - +app_bigmapheight) ;
    // console.log (bmMaxTop);

    var bmMaxLeft = (+mapWindowWidth - +app_bigmapwidth) ;
    // console.log (bmMaxLeft);

    if (bmtopVal < bmMaxTop) {
      $( bigmap ).css( "top", bmMaxTop + 'px' );
      $( lilmap ).css( "top", bmMaxTop + 'px' );
    }

    if (lmleftVal < bmMaxLeft) {
      $( bigmap ).css( "left", bmMaxLeft + 'px' );
      $( lilmap ).css( "left", bmMaxLeft + 'px' );
    }

    moveRedBox();
  }

  function moveRedBox() {
    var bmtop = parseInt( $( bigMap ).css( "top" ), 10 );
    var bmleft = parseInt( $( bigMap ).css( "left" ), 10 );
    var redBoxTop = Math.abs( Math.round(bmtop * app_bmapfactor) );
    var redBoxLeft = Math.abs( Math.round(bmleft * app_bmapfactor) );

    /*
    console.log( 'bmtop: ' + bmtop );
    console.log( 'bmleft: ' + bmleft );
    console.log( 'redBoxTop: ' + redBoxTop );
    console.log( 'redBoxLeft: ' + redBoxLeft );
    console.log( 'gmwidth: ' + gmwidth );
    console.log( 'gmheight: ' + gmheight );
    console.log( 'redBoxWidth: ' + redBoxWidth );
    console.log( 'redBoxHeight: ' + redBoxHeight );
    console.log( redBoxTop + redBoxHeight );
    console.log( redBoxLeft + redBoxWidth );
    */

    if (( redBoxTop + redBoxHeight ) > gmheight ) {
      var redBoxTop = ( gmheight - redBoxHeight );
    }
    if (( redBoxLeft + redBoxWidth ) > gmwidth ) {
      var redBoxLeft = ( gmwidth - redBoxWidth );
    }

    $( redBox ).css( "top", redBoxTop + 'px' );
    $( redBox ).css( "left", redBoxLeft + 'px' );

  }

});

function listMapPos( vars ) {
  console.log( '============= All Locals =============' )
  console.log();
  for (var i = 0; i < arguments.length; i++) {
    var theVar = arguments[i];
    var theObj = document.getElementById( theVar );
    console.log( theVar + ': ' + $( theObj ).css( "top" ) );
    console.log( theVar + ': ' + $( theObj ).css( "left" ) );
  }
}

function listAllGlobals() {
  // default height and width of the big map
  console.log ( 'app_bigmapwidth: ' + app_bigmapwidth );
  console.log ( 'app_bigmapheight: ' + app_bigmapheight );

  // default height and width of the guide map
  console.log ( 'app_guidefactor: ' + app_guidefactor );
  console.log ( 'app_guidemapwidth: ' + app_guidemapwidth );
  console.log ( 'app_guidemapheight: ' + app_guidemapheight );

  // factor tests, based on widths and heights of maps
  console.log ( 'app_bmapfactor: ' + app_bmapfactor );

  // the dimensions of the red guide box
  console.log ( 'app_guidebox: ' + app_guidebox );

  // distance, in pixels, the big maps move with each click.
  console.log ( 'app_bigmapmove: ' + app_bigmapmove );

  // Base values for big maps and red box; distance, in pixels, from top and left of frames.
  console.log ( 'app_bigmapbasetop: ' + app_bigmapbasetop );
  console.log ( 'app_bigmapbaseleft: ' + app_bigmapbaseleft );
  console.log ( 'app_redboxbasetop: ' + app_redboxbasetop );
  console.log ( 'app_redboxbaseleft: ' + app_redboxbaseleft );

  console.log ( 'app_bigmapslimit: ' + app_bigmapslimit );
  console.log ( 'app_bigmapelimit: ' + app_bigmapelimit );

  // SESSION VARIABLES
  console.log ( 'sess_bigmaptop: ' + sess_bigmaptop );
  console.log ( 'sess_bigmapleft: ' + sess_bigmapleft );
  console.log ( 'sess_redboxtop: ' + sess_redboxtop );
  console.log ( 'sess_redboxleft: ' + sess_redboxleft );
}
