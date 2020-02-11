
alert('ju');

    $(document).ready(function () {

        $('#foto').fileinput({

            languaje: 'es',
            allowedFileExtensions: ['jpg','jpeg','png'],
            maxFileSize: 1000,
            showUpload: false,
            initialPreviewAsData: true,
            dropZoneEnabled: false,
            theme:"fa",

        });
        alert('ju');
    });

