$(document).ready(function () {
        $( function() {
    $( "#slider-seq-write" ).slider({
      range: true,
      min: 2200,
      max: 6600,
      values: [ 2200, 6600 ],
      slide: function( event, ui ) {
        $( "#seq-write-amount" ).val( ui.values[ 0 ] + "MB/s - " + ui.values[ 1 ] + "MB/s" );
      }
    });
    $( "#seq-write-amount" ).val( $( "#slider-seq-write" ).slider( "values", 0 ) + "MB/s" +
      " - " + $( "#slider-seq-write" ).slider( "values", 1 ) + "MB/s"  );
  } );
});