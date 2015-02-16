  $(document).ready(function() {

    $("#search-drug").select2({
	    placeholder: "Search for Medicine",
	    minimumInputLength: 1,
	    ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
		    url:  $("#search-drug").data('url'),
		    dataType: 'json',
		    quietMillis: 250,
		    data: function (term, page) {
		    return {
		    	q: term, // search term
	    		};
	    	},
		    results: function (data, page) { // parse the results into the format expected by Select2.
		    // since we are using custom formatting functions we do not need to alter the remote JSON data 
	  	  		return { results: data.items };
		    },
		    cache: true
		    },
		    initSelection: function(element, callback) {
		    // the input tag has a value attribute preloaded that points to a preselected repository's id
		    // this function resolves that id attribute to an object that select2 can render
		    // using its formatResult renderer - that way the repository name is shown preselected
		    var id = $(element).val();
		    if (id !== "") {
 				console.log(id);
		    }
		    }, 
		     formatResult: repoFormatResult, // omitted for brevity, see the source of this page
			formatSelection: repoFormatSelection, // omitted for brevity, see the source of this page
			dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller 
	    escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
    });
});

   function repoFormatResult(repo) {
      var markup = '<div class="row"><div>' + 
               '<div class="col-sm-4">' + repo.brand_name + '</div>' +
               '<div class="col-sm-4"><i class="fa fa-code-fork"></i> ' + repo.generic_name + '</div>' + 
          	   '<div class="col-sm-2"><i class="fa fa-star"></i> ' + repo.strength + '</div>' +
               '<div class="col-sm-2"><i class="fa fa-star"></i> ' + repo.form + '</div>' ;
      markup += '</div></div>';



      return markup;
   }

   function repoFormatSelection(repo) {

      var table = '<tr><td>' + repo.generic_name + '</td>' +
               '<td> ' + repo.brand_name + '</td>' + 
          	   '<td>' + repo.strength + '</td>' +
         	   '<td>' + repo.form + '</td>' +
         	   '<td><input type="text" name="qty[' + repo.id + ']"></td>' +  
         	   '<td><textarea name="instructions[' + repo.id + ']"></textarea></td>' +
        	   '<td><a onclick="$(this).parent().parent().remove();">Delete</a></td>';
      table += '</table>';

      $('#medicine').append(table);   	
      return repo.brand_name;
   }