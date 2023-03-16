// const { lastIndexOf } = require("lodash");

/**
 * set select2 for select with options
 * @param selector -> the selector of jquery
 * @param options {
 *  enable_image : check if the select2 with image
 *  row : return the template html of the select2 with image
 * }
 */
function select2(selector, options={}) {
    // check on with image option
    if (options.enable_image) {
        return $(selector).select2({
            templateResult: function(resource) {
                return options.row(resource);
            },
            templateSelection: function(resource) {
                return options.row(resource);
            }
        });
    }

    return $(selector).select2();
}


/**
 * set deleteItem for delete item from database
 * @param url_route -> the url of item of destroy
 *
 */
function deleteItem(url_route ){
    $('.deleteRow').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: LANG.are_you_sure_to_delete,
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: LANG.yes,
            cancelButtonText: LANG.no,
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data("id");
                console.log(id);
                var url = url_route + id;
                url = url.replace(':id', id);
                $.ajax({
                    type:'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    enctype: 'multipart/form-data',
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    contentType: false,
                    processData: false,
                    success : function(data){
                        location.reload();
                    },
                    error: function(data){
                    }
                });
                Swal.fire(
                    LANG.this_item_has_been_deleted,
                    '',
                    'success'
                )
            } else {
                window.location.reload();
            }
        })
    });
}
