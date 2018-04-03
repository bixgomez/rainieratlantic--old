$( document ).ready(function() {

  console.log( "Welcome to mapchoice.js" );

  $( "select[name='bigmapchoice']" ).change(function() {
    var selectedMapLeft = $("select[name='bigmapchoice']").val();
    // console.log('changed left map to: ' + selectedMapLeft);
    swapMapOut({ whichmap: 'left', newMap: selectedMapLeft });
  });

  $( "select[name='lilmapchoice']" ).change(function() {
    var selectedMapRight = $("select[name='lilmapchoice']").val();
    // console.log('changed right map to: ' + selectedMapRight);
    swapMapOut({ whichmap: 'right', newMap: selectedMapRight });
  });

});

function swapMapOut( {whichmap, newMap} ) {
  // console.log( whichmap + newMap );
  if (whichmap == 'left') {
    // console.log( whichmap + newMap );
    var newMap = 'maps/' + newMap + '.jpg';
    $( "#bigmap" ).attr("src",newMap);
  }
  if (whichmap == 'right') {
    // console.log( whichmap + newMap );
    var newMap = 'maps/' + newMap + '.jpg';
    $( "#lilmap" ).attr("src",newMap);
  }
}