$( document ).ready( function() {
	$( 'body' ).addClass( 'loaded' );
	$("#loader").css('display', 'none');
} );

$( document ).on( 'click', '.toggle-site-menu', function() {
  $( '#site-menu' ).addClass( 'show' );
} );

$( ".close" ).click( function() {
  $( '#site-menu' ).removeClass( 'show' );
} );