$(document).ready(function () {
        $( function() {
    $( "#slider-cpu-price" ).slider({
      range: true,
      min: 1,
      max: 800,
      values: [ 1, 2000 ],
      slide: function( event, ui ) {
        $( "#cpu-price-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#cpu-price-amount" ).val( "$" + $( "#slider-cpu-price" ).slider( "values", 0 ) +
      " - $" + $( "#slider-cpu-price" ).slider( "values", 1 ) );
  } );
});