$( '.delete-news' ).click( function() {

	if( !confirm("Biztosan törlöd az aktuális hírt?") ) return;

	$.post( "news/delete/" +  $(this).data("id"), function( data ) {
		if( data == "ok" ) {
			alert( "A hír törölve")
		} else {
			alert( "Hiba történt" )
		}
	  
	});
} );
