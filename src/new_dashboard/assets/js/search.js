$(document).ready(function() {
    // Store the original content of the sidebar
    var originalSidebarContent = $("#search_container").html();

    $(document).on('input', '#search_by_text', function(e) {
        make_search();
    });

    function make_search() {
        var search_by_text = $("#search_by_text").val().trim() // Trim leading and trailing spaces
        var token_search = $("#token_search").val();
        var ajax_search_url = $("#ajax_search_url").val();

        if (search_by_text !== "") {
            jQuery.ajax({
                url: ajax_search_url,
                type: 'post',
                dataType: 'html',
                cache: false,
                data: {
                    "ass": "asd",
                    search_by_text: search_by_text,
                    "_token": token_search
                },
                success: function(data) {
                    var cleanData = data.replace(/<!--/g, '');
                    $("#search_container").html(cleanData);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            // Restore the original content when the search input is empty
            $("#search_container").html(originalSidebarContent);
        }
    }
});