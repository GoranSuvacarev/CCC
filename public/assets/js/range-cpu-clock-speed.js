$(document).ready(function () {
        $( function() {
    $( "#slider-cpu-clock-speed" ).slider({
      range: true,
      min: 2.5,
      max: 4.7,
      step: 0.1,
      values: [ 2.5, 4.7 ],
      slide: function( event, ui ) {
        $( "#cpu-clock-speed-amount" ).val( ui.values[ 0 ] + "GHz - " + ui.values[ 1 ] + "GHz" );
      }
    });
    $( "#cpu-clock-speed-amount" ).val( $( "#slider-cpu-clock-speed" ).slider( "values", 0 ) + "GHz" +
      " - " + $( "#slider-cpu-clock-speed" ).slider( "values", 1 ) + "GHz"  );
  } );
});