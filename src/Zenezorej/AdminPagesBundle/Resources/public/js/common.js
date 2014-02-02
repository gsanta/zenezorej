$( '.delete-news' ).click( function() {

	var that = this;

	bootbox.confirm( "Biztosan törlöd az aktuális hírt?", function( result ) {
		if( result ) {
			$.post( "news/delete/" +  $(that).data("id"), function( data ) {
				if( data == "ok" ) {
					bootbox.alert( "A hír törölve")
				} else {
					bootbox.alert( "Hiba történt" )
				}
			  
			});
		}
	})

} );

$("#show-add-new-form").click( function() {
	$("#add-news-form").show( "slow" );

	$(this).hide();
} )

$(".cancel","#add-news-form").click( function() {
	alert("cancel");

	$("#add-news-form").hide( "slow", function() {
		$("#show-add-new-form").show();
	} )
} )