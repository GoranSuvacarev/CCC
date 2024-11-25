$(document).ready(function () {
        $( function() {
    $( "#slider-threads" ).slider({
      range: true,
      min: 12,
      max: 32,
      values: [ 12, 32 ],
      slide: function( event, ui ) {
        $( "#threads-amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#threads-amount" ).val( $( "#slider-threads" ).slider( "values", 0 ) +
      " - " + $( "#slider-threads" ).slider( "values", 1 ) );
  } );
});