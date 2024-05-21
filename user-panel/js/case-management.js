$('#03').addClass('active');

$(document).ready(function () {

    $('.cancel-btn').click(function () {
        location.reload();
    });

    $('.casesTable').DataTable();

    $('.case-remove-btn').click(function () {
        if (confirm("Are you sure want to remove the case ?")) {
            window.location.href = "case-delete.php?cid=" + $(this).attr('id');
        }
    });

    $('.case-filter-btn').click(function () {
        var user_id = $(this).val();
        var Data = [];
        Data.push($('.case_type').val());
        Data.push($('.case_name').val());
        Data.push($('.case_status').val());
        Data.push($('.sort_by').val());
        Data.push(user_id);
        $.ajax({
            type: 'POST',
            url: './trans.php',
            data: {'Id': 'case-filter', 'Data': Data},
            success: function (data) {
                $('.case-details').html(data);
            }
        });
    });
});