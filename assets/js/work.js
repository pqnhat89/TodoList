var modal = $('#work .modal');

// handle form submit
$('#work .modal button[type=submit]').click(function (e) {
    e.preventDefault();
    var startDate = $('#work .modal #start_date').val();
    var endDate = $('#work .modal #end_date').val();
    if (endDate < startDate) {
        alert('End Date must be great than End Date !!!')
    } else {
        $(this).closest('form').submit();
    }
});

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

$('#work .delete').click(function (e) {
    e.preventDefault();
    // get work_name
    var workName = $(this).closest('tr').find('.work-name').html().trim();
    if (confirm("Delete " + workName + " ?")) {
        $(this).closest('form').submit();
    }
});

// config datepicker
$('.date').datepicker({
    format: 'yyyy-mm-dd',
    todayBtn: true,
});