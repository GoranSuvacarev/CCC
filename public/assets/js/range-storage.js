$(document).ready(function () {
        $( function() {
    $( "#slider-storage-size" ).slider({
      range: true,
      min: 250,
      max: 4096,
      values: [ 250, 4096 ],
      slide: function( event, ui ) {
        $( "#storage-size-amount" ).val( ui.values[ 0 ] + "GB - " + ui.values[ 1 ] + "GB" );
      }
    });
    $( "#storage-size-amount" ).val( $( "#slider-storage-size" ).slider( "values", 0 ) + "GB" +
      " - " + $( "#slider-storage-size" ).slider( "values", 1 ) + "GB"  );
  } );
});