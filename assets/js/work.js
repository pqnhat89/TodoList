var modal = $('#work .modal');

// handle click add btn
$('#work #add').click(function () {
    // reset form data
    modal.find('#work_id').val(0);
    $('#work .modal form')[0].reset();
    $('#work .modal').modal();
});

// handle click edit btn
$('#work .edit').click(function () {
    // get work_id
    var work_id = $(this).closest('tr').data('id');
    // send ajax
    $.ajax({
        url: '/Controller/Work/Get.php?work_id=' + work_id,
        success: function (res) {
            // parse data
            res = JSON.parse(res);
            // set data
            modal.find('#work_id').val(res.work_id);
            modal.find('#work_name').val(res.work_name);
            modal.find('#start_date').val(res.start_date);
            modal.find('#end_date').val(res.end_date);
            modal.find('#status').val(res.status);
            modal.modal();
        }
    });
});

// config datepicker
$('.date').datepicker({
    format: 'yyyy-mm-dd',
    todayBtn: true,
});