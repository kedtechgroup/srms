$(function ($) {

  

    $('#form').on('submit', function (e) {

        e.preventDefault();

        var formData = {
            'fullanme': $('#fullanme').val(),
            'rollid': $('#rollid').val(),
            'emailid': $('#email').val(),
            'gender': $('#gender').val(),
            'classid': $('#classid').val(),
            'dob': $('#date').val(),
        };

        $.ajax({
            type: "POST",
            url: 'create_student.php',
            data: formData,
            success: function (response) {
                let arr = JSON.parse(response);

                if (arr.success === true) {
                    toastr.options.closeButton = true;
                    toastr.options.progressBar = true;
                    toastr.success('Added Successfully!!!')
                } else {
                    toastr.options.closeButton = true;
                    toastr.options.progressBar = true;
                    toastr.warning('Warning Error Occured')
                }
            }
        })


    });

    $('#toogle').on('click', function () {
        $('#panel').toggle();
        $('#panel2').show();
    });

    $('#back').on('click', function () {
        $('#panel2').toggle();
        $('#panel').show();
        table.ajax.reload();
    });
    
    const table = $('#example').DataTable({

        "cache": "true",
        "ajax": {
            "url": "get_all_students.php",
            "type": "POST",
            "dataSrc": ""
        },

        "columnDefs": [
            {
                "targets": 0,
                "data": "StudentName",
            }, {
                "targets": 1,
                "data": "RollId",
            }, {
                "targets": 2,
                "data": "RegDate",
            }, {
                "targets": 3,
                "data": "Status",
            }, {
                "targets": 4,
                "data": "ClassName",
            }, {
                "targets": 5,
                "data": "name",
            }, {
                "targets": 6,
                "data": "StudentId",
                "render": function (data, type, row, meta) {
                    return '<a href="../../class_performance.php?' + data + '">Download</a>';
                }
            }
        ],



    });



    setInterval(function () {
        table.ajax.reload();
    }, 1000);
});


