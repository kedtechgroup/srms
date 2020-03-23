$(function($) {

 let table = $('#example').DataTable({

        "cache" : "true",
        ajax : {
            "url": "get_years.php",
            "type": "POST",
            "dataSrc": ""
        }, "columnDefs": [
             {
                 "targets": 0,
                 "data": "year_name",
             },{
                 "targets": 1,
                 "data": "created_at",
             },{
                 "targets": 2,
                    "data" : "year_id",
                 "render": function ( data, type, row, meta ) {
                     return '<a href="../../class_performance.php'+data+'">Download</a>';
                 }
             }
     ]

    });

    setInterval( function () {
        table.ajax.reload();
    }, 100000 );

    $('#add_new_year').on('click', function () {
        $('#hide_section').show();
            $('#active_section').toggle();
    });
    $('#back').on('click', function () {
        $('#hide_section').toggle();
        $('#active_section').show();
            table.ajax.reload();
    });

    $('#form').on('submit',function (e) {

        e.preventDefault();

        var formData = {
            'year_name'    : $('#year_name').val(),
        };

        $.ajax({
            type: "POST",
            url: 'add_year.php',
            data:  formData ,
            success: function (response) {
                let arr = JSON.parse(response);

                    if (arr.success === true){
                            toastr.success('Added Successfully!!!')
                    } else {
                        let err = arr.message;
                            toastr.options.progressBar = true;
                            toastr.warning(err)
                }
            }
        })


    });
});
