jQuery(function($) {
    $('tbody tr, .linkbutton').click(function(){
        window.location = $(this).data('url');
    });

    $(".del").click(function(e){
        if (confirm("Are you sure that you want to delete this record?")){
            return true;
        }
        e.preventDefault();
    });
});
