$(function($) {

    $('#form').on('submit',function (e) {

        let formData = {
            'classname'    : $('#classname').val(),
            'class_name_numeric'   : $('#class_name_numeric').val(),
            'stream_id'     : $('#stream_id').val(),

        };

        $.ajax({
            type: "POST",
            url: 'create_class.php',
            data:  formData ,

        }).done(function (response) {
            let arr = JSON.parse(response);

            if (arr.success === true) {
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                toastr.success('Added Successfully!!!')
            }else{
                toastr.options.closeButton = true;
                toastr.options.progressBar = true;
                toastr.warning('Warning Error Occured')
            }
        });
        e.preventDefault()
    });

  const table =  $('#example').DataTable({

        "cache" : "true",
        "ajax": {
            "url": "get_all_classes.php",
            "type": "POST",
            "dataSrc": ""
        },
      "columnDefs": [
          {
              "targets": 0,
              "data": "ClassName",
          },{
              "targets": 1,
              "data": "ClassNameNumeric",
          },{
              "targets": 2,
              "data": "CreationDate",
          },{
              "targets": 3,
              "data": "name",
          },{
              "targets": 4,
              "data" : "id",
              "render": function (data) {
                  return '<a class="btn btn-xs btn-success" href="class_subjects.php?cid='+data+'">View</a>';
              }
          }
      ],

    });

    $('#add_class').on('click', function () {
        $('#panel1').toggle();
            $('#panel2').show();
    });

    $('#cancel').on('click', function (e) {
        $('#panel2').toggle();
            $('#panel1').show();
            table.ajax.reload();
    });

    setInterval( function () {
        table.ajax.reload();
}, 100000 );

});
