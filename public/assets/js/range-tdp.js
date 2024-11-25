$(document).ready(function () {
        $( function() {
    $( "#slider-tdp" ).slider({
      range: true,
      min: 65,
      max: 170,
      values: [ 65, 170 ],
      slide: function( event, ui ) {
        $( "#tdp-amount" ).val( ui.values[ 0 ] + "W - " + ui.values[ 1 ] + "W" );
      }
    });
    $( "#tdp-amount" ).val( $( "#slider-tdp" ).slider( "values", 0 ) + "W" +
      " - " + $( "#slider-tdp" ).slider( "values", 1 ) + "W"  );
  } );
});