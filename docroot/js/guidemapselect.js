$( document ).ready(function() {

  console.log( "Welcome to guidemapselect.js" );

  $( "#guidemap-clicker" ).click(function(e) {
    // console.log( "clicked!" );

    var guideMapWidth = parseInt( $( "#guidemap-clicker" ).css( "width" ), 10 );
    var guideMapHeight = parseInt( $( "#guidemap-clicker" ).css( "height" ), 10 );

    var redBoxWidth = parseInt( $( "#redbox" ).css( "width" ) );
    var redBoxHeight = parseInt( $( "#redbox" ).css( "height" ) );

    var redBoxLeft = parseInt( $( "#redbox" ).css( "left" ) );
    var redBoxTop = parseInt( $( "#redbox" ).css( "top" ) );

    var offset = $( "#guidemap-clicker" ).offset();
    var relativeX = (e.pageX - offset.left);
    var relativeY = (e.pageY - offset.top);
    // console.log( 'clicked at: ' + relativeX + ' x ' + relativeY);

    var newRedBoxLeft = (+relativeX - (redBoxWidth/2) );
    var newRedBoxTop = (+relativeY - (redBoxHeight/2) );

    if ( (+newRedBoxTop + +redBoxHeight) > guideMapHeight ) {
      var newRedBoxTop = (guideMapHeight - +redBoxHeight);
    }
    if ( (+newRedBoxLeft + +redBoxWidth) > guideMapWidth ) {
      var newRedBoxLeft = (guideMapWidth - +redBoxWidth);
    }

    if ( +newRedBoxTop < 0 ) {
      var newRedBoxTop = 0;
    }
    if (+newRedBoxLeft  < 0 ) {
      var newRedBoxLeft = 0;
    }

    $( "#redbox" ).css( "top", newRedBoxTop + 'px' );
    $( "#redbox" ).css( "left", newRedBoxLeft + 'px' );

    moveBigMap({
      redBoxWidth: redBoxWidth,
      redBoxHeight: redBoxHeight,
      redBoxTop: newRedBoxTop,
      redBoxLeft: newRedBoxLeft
    });

  });

});

function moveBigMap({
  redBoxWidth,
  redBoxHeight,
  redBoxTop,
  redBoxLeft }) {

  var bigMapWidth = parseInt( $( "#bigmap" ).css( "width" ), 10 );
  var bigMapHeight = parseInt( $( "#bigmap" ).css( "height" ), 10 );
  var bigMapWindow = parseInt( $( "#map-window--bigmap" ).css( "width" ), 10 );

  /*
  console.log('redBoxWidth: ' + redBoxWidth);
  console.log('redBoxHeight: ' + redBoxHeight);
  console.log('redBoxTop: ' + redBoxTop);
  console.log('redBoxLeft: ' + redBoxLeft);
  console.log('bigMapWidth: ' + bigMapWidth);
  console.log('bigMapHeight: ' + bigMapHeight);
  console.log('bigMapWindow: ' + bigMapWindow);
  */

  var bigMapNewTop = ( 0 - Math.abs( Math.round( redBoxTop / app_bmapfactor ) ) );
  var bigMapNewLeft = ( 0 - Math.abs( Math.round( redBoxLeft / app_bmapfactor ) ) );

  // console.log(bigMapNewTop);
  // console.log(bigMapNewLeft);

  $( "#bigmap" ).css( "top", bigMapNewTop + 'px' );
  $( "#bigmap" ).css( "left", bigMapNewLeft + 'px' );
  $( "#lilmap" ).css( "top", bigMapNewTop + 'px' );
  $( "#lilmap" ).css( "left", bigMapNewLeft + 'px' );

}

