$(document).ready(function () {
        $( function() {
    $( "#slider-ssd-price" ).slider({
      range: true,
      min: 1,
      max: 539,
      values: [ 1, 539 ],
      slide: function( event, ui ) {
        $( "#ssd-price-amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#ssd-price-amount" ).val( "$" + $( "#slider-ssd-price" ).slider( "values", 0 ) +
      " - $" + $( "#slider-ssd-price" ).slider( "values", 1 ) );
  } );
});