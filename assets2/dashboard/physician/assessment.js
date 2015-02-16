$(function(){

	/* Search Display add/remove */
	$(".search_text").keypress(function(e){
		if(e.which == 13) {
			txt = $(this).val();
			div = $(this).attr("data-target");
			add_search(txt,div);
		}
	});
	function add_search(txt,div){
		$(".clone_search .search_display").clone().appendTo("."+div).find("span").text(txt);
	}
	$("body").on("click",".search_display .fa-times",function(){
		$(this).parent().fadeOut("fast",function(){ $(this).remove(); });
	});

});