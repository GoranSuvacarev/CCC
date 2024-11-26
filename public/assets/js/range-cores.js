$(document).ready(function () {
        $( function() {
    $( "#slider-cores" ).slider({
      range: true,
      min: 6,
      max: 24,
      values: [ 6, 24 ],
      slide: function( event, ui ) {
        $( "#cores-amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#cores-amount" ).val( $( "#slider-cores" ).slider( "values", 0 ) +
      " - " + $( "#slider-cores" ).slider( "values", 1 ) );
  } );
});