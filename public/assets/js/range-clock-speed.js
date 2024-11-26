$(document).ready(function () {
        $( function() {
    $( "#slider-range-clock-speed" ).slider({
      range: true,
      min: 1042,
      max: 2340,
      values: [ 1042, 2340 ],
      slide: function( event, ui ) {
        $( "#clock-speed-amount" ).val( ui.values[ 0 ] + "MHz - " + ui.values[ 1 ] + "MHz" );
      }
    });
    $( "#clock-speed-amount" ).val( $( "#slider-range-clock-speed" ).slider( "values", 0 ) + "MHz" +
      " - " + $( "#slider-range-clock-speed" ).slider( "values", 1 ) + "MHz"  );
  } );
});