$(document).ready(function () {
        $( function() {
    $( "#slider-tb-written" ).slider({
      range: true,
      min: 150,
      max: 6400,
      values: [ 150, 6400 ],
      slide: function( event, ui ) {
        $( "#tb-written-amount" ).val( ui.values[ 0 ] + "TB - " + ui.values[ 1 ] + "TB" );
      }
    });
    $( "#tb-written-amount" ).val( $( "#slider-tb-written" ).slider( "values", 0 ) + "TB" +
      " - " + $( "#slider-tb-written" ).slider( "values", 1 ) + "TB"  );
  } );
});