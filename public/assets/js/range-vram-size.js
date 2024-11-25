$(document).ready(function () {
        $( function() {
    $( "#slider-vram-size" ).slider({
      range: true,
      min: 8,
      max: 24,
      values: [ 8, 24 ],
      slide: function( event, ui ) {
        $( "#vram-size-amount" ).val( ui.values[ 0 ] + "GB - " + ui.values[ 1 ] + "GB" );
      }
    });
    $( "#vram-size-amount" ).val( $( "#slider-vram-size" ).slider( "values", 0 ) + "GB" +
      " - " + $( "#slider-vram-size" ).slider( "values", 1 ) + "GB"  );
  } );
});