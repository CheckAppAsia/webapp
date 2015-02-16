$(document).ready(function(){
	
	CA_FEED.init({
		factory: "#factory",
		feedList: "#feeds",
		loader: "#load-more",
		checkpoint: Math.floor(new Date().getTime()/1000),
	});
	
	CA_FEED.loadNews();
	
	CA_FEED.hasForm();
	
	$("#load-more").on('click', function(){
		CA_FEED.loadNews();
	});
	
});