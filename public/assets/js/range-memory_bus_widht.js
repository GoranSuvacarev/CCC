$(document).ready(function () {
        $( function() {
    $( "#slider-memory-bus-widht" ).slider({
      range: true,
      min: 96,
      max: 384,
      values: [ 96, 384 ],
      slide: function( event, ui ) {
        $( "#memory-bus-widht-amount" ).val( ui.values[ 0 ] + "bit - " + ui.values[ 1 ] + "bit" );
      }
    });
    $( "#memory-bus-widht-amount" ).val( $( "#slider-memory-bus-widht" ).slider( "values", 0 ) + "bit" +
      " - " + $( "#slider-memory-bus-widht" ).slider( "values", 1 ) + "bit"  );
  } );
});