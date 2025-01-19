$(document).ready(function() {
    // Store the original content of the sidebar
    var originalSidebarContent = $("#search_container_project").html();

    $(document).on('input', '#search_by_text_project', function(e) {
        make_search();
    });

    function make_search() {
        var search_by_text = $("#search_by_text_project").val().trim() // Trim leading and trailing spaces
        var token_search = $("#token_search_project").val();
        var ajax_search_url = $("#ajax_search_url_project").val();
        var project_id = $("#project_id").val();

        if (search_by_text !== "") {
            jQuery.ajax({
                url: ajax_search_url,
                type: 'post',
                dataType: 'html',
                cache: false,
                data: {
                    project_id : project_id,
                    search_by_text: search_by_text,
                    "_token": token_search
                },
                success: function(data) {
                    var cleanData = data.replace(/<!--/g, '');
                    $("#search_container_project").html(cleanData);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            // Restore the original content when the search input is empty
            $("#search_container_project").html(originalSidebarContent);
        }
    }
});