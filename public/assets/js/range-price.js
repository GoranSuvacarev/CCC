$(document).ready(function () {
        $( function() {
    $( "#slider-range-price" ).slider({
      range: true,
      min: 1,
      max: 2000,
      values: [ 1, 2000 ],
      slide: function( event, ui ) {
        $( "#price-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#price-amount" ).val( "$" + $( "#slider-range-price" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range-price" ).slider( "values", 1 ) );
  } );
});