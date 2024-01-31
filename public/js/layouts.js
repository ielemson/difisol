(function($) {
    'use strict';
    $(function() {
    $('.file-upload-browse').on('click', function() {
        var file = $(this).parent().parent().parent().find('.file-upload-default');
        file.trigger('click');
      });
      $('.file-upload-default').on('change', function() {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
      });
    });
    $(document).ready(function() {
        var listDelete = $('.list-sdelete');
        
             listDelete.on('click', function() {
             var dataId = $(this).attr("data-id");
             
            swal({
                title: "Are you sure?",
                text: "Do you really want to delete this item?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
            .then((willDelete) => {
                var type = "GET";
                var ajaxurl = '/news/delete/' + dataId;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    dataType: 'json',
                    success: function(data) {  
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
                if (willDelete) {
                    swal({
                        title: "Deleted",
                        text: "The list item has been deleted!",
                        icon: "success",
                    });
                    setTimeout(function() { 
                       location.reload();
                    }, 2000);
                } else {
                    swal("The item is not deleted!");
                }
            });
        });

        $('.html-editor').summernote({
          height: 300,
          tabsize: 2
        });
    })
})(jQuery);