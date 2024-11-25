$(document).ready(function () {
        $( function() {
    $( "#slider-seq-read" ).slider({
      range: true,
      min: 2200,
      max: 7400,
      values: [ 2200, 7400 ],
      slide: function( event, ui ) {
        $( "#seq-read-amount" ).val( ui.values[ 0 ] + "MB/s - " + ui.values[ 1 ] + "MB/s" );
      }
    });
    $( "#seq-read-amount" ).val( $( "#slider-seq-read" ).slider( "values", 0 ) + "MB/s" +
      " - " + $( "#slider-seq-read" ).slider( "values", 1 ) + "MB/s"  );
  } );
});