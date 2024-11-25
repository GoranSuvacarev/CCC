$(document).ready(function () {
        $( function() {
    $( "#slider-texture-mapping-units" ).slider({
      range: true,
      min: 72,
      max: 512,
      values: [ 72, 512 ],
      slide: function( event, ui ) {
        $( "#texture-mapping-units-amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });
    $( "#texture-mapping-units-amount" ).val( $( "#slider-texture-mapping-units" ).slider( "values", 0 ) +
      " - " + $( "#slider-texture-mapping-units" ).slider( "values", 1 ) );
  } );
});