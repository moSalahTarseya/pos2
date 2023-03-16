function formAjax(edit, action, selector, load, show_message) {


    if (!selector)
        selector = ".form";

    if (!load)
        load = false;

    if (show_message == undefined)
        show_message = true;

    $(selector).each(function() {

        var submitBtnHtml = $(this).find("button[type=submit]").html();

        var form = this;
        $(form).find("button[type=submit]").click(function() {
            if ($(form).find('input[type=file]').length > 0) {

                if ($(form).find('input[type=file]')[0].required && $(form).find('input[type=file]').val().length <= 0)
                    return success("please select file");
            }
        });


        this.onsubmit = function(e) {
            // observe tiny editor changes
            observeTinyEditor();

            e.preventDefault();
            var form = this;
            console.log($(this).find("button[type=submit]"));
            $(this).find("button[type=submit]").html('<i class="fa fa-spin fa-spinner" ></i>');
            $(this).find("button[type=submit]").attr('disabled', 'disabled');


            var formdata = new FormData();
            var elements = this.elements;
            var self = this;

            for (var i = 0; i < elements.length; i++) {

                var e = elements[i];
                if (e.name.length > 0) {
                    if (e.type == "file") {
                        if (e.files[0] != undefined)
                            formdata.append(e.name, e.files[0]);
                    } else {
                        if (Array.isArray($(e).val())) {
                            var vv = $(e).val();
                            for (var indexx = 0; indexx < vv.length; indexx++) {
                                formdata.append(e.name, vv[indexx]);
                            }
                        } else
                            formdata.append(e.name, e.value);
                    }
                }

            }

            console.log("formdata", formdata);

            //sendPost(this.action, formdata, function(r){console.log(r);});

            $.ajax({
                url: this.action,
                type: 'POST',
                data: formdata,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(data) {
                    if (data.status == 1) {
                        if (show_message)
                        // toastr.success(data.message);
                            success(data.message);
                        // reload data
                        try {
                            $('#table').DataTable().ajax.reload();
                        } catch (e) {}

                        if (!edit)
                            self.reset();

                        if (load || data.load == 1)
                            window.location.reload();
                    } else {
                        if (show_message)
                            error(data.message);
                    }

                    $(self).find("button[type=submit]").html(submitBtnHtml);
                    $(self).find("button[type=submit]").removeAttr('disabled');


                    if (action)
                        action(data);
                }
            });

            return false;
        };
    });

}



function observeTinyEditor() {
    $("textarea").each(function(){

        var id = $(this).attr("id");
        tinymce.get(id).save();

    });
}
