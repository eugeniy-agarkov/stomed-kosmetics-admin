(function ($)
{

    /**
     * Datepicker
     */
    $('.datepicker').datepicker({language: 'ru', autoclose: true});

    tinymce.init({
        selector: '.custom-editor',
        height: '500',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        relative_urls: true,
        automatic_uploads: true,
        table_appearance_options: false,
        images_upload_handler: function (blobInfo, success, failure, progress) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/editor/upload');

            xhr.upload.onprogress = function (e) {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = function () {
                var json;

                if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            xhr.onerror = function () {
                failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            if (window.entitySlug) {
                formData.append('name', window.entitySlug);
            }
            xhr.send(formData);
        }
    });

    /**
     * Save Price in All Table Prices
     */
    $(document).on('click', '.priceLiveSave', function (e) {

        e.preventDefault();

        var $this = $(this),
            url = $this.prop('href'),
            fields = $this.closest('tr').find('input:not(:hidden),select,radio,checkbox,textarea'),
            model = $this.data('model'),
            id = $this.data('id');

        $.ajax( {
            beforeSend  :   function(xhr){

            },
            data        :   fields.serialize() + '&id=' + id + '&model=' + model,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method      :   'POST',
            complete    :   function(){

            },
            error: function(response) {

            },
            success     :   function( response ){

                if( response.status == 'success' )
                {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });

                }else {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });

                }


            },
            url         :   url
        } );

    });

    /**
     * Remove Price in All Table Prices
     */
    $(document).on('click', '.priceLiveDestroy', function (e)
    {

        e.preventDefault();

        if (confirm('Удалить запись?')) {

            var $this = $(this),
                url = $this.prop('href'),
                model = $this.data('model'),
                id = $this.data('id');

            $.ajax( {
                beforeSend  :   function(xhr){

                },
                data        :   {
                    id: id,
                    model: model,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method      :   'DELETE',
                complete    :   function(){

                },
                error: function(response) {

                },
                success     :   function( response ){

                    if( response.status == 'success' )
                    {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1000,
                            onClose: () => {
                                location.reload();
                            }
                        });

                    }else {

                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1000
                        });

                    }

                },
                url         :   url
            } );

        } else {

        }


    });


})($)
