var work_id;

// handle click add btn
$('#work #add').click(function () {
    work_id = 0;
    $('#work .modal form')[0].reset();
    $('#work .modal').modal();
});

// get form data
function getData() {
    var modal = $('#work .modal');
    return {
        work_name: modal.find('#work_name').val(),
        start_date: modal.find('#start_date').val(),
        end_date: modal.find('#end_date').val(),
        status: modal.find('#status').val()
    };
}

// validation
function validation() {
    // get form data
    var modal = $('#work .modal');
    var data = {
        work_name: modal.find('#work_name'),
        start_date: modal.find('#start_date'),
        end_date: modal.find('#end_date'),
        status: modal.find('#status')
    };

    var isValid = true;
    $.each(data, function (k, v) {
        if (v.val() == '') {
            isValid = false;
            v.closest('.form-group').find('.error').show();
        } else {
            v.closest('.form-group').find('.error').hide();
        }
    });

    return isValid;
}

$('.date').datepicker({
    format: 'yyyy-mm-dd',
    todayBtn: true,
});