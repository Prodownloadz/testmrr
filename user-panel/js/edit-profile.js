$('#05').addClass('active');

/*$("input[name='username']").keyup(function () {
    if ($(this).val().length > 6) {
        $('.username_invalid_error').css('display', 'none');
        $("button[name='saveprofile']").css('display', 'block');
    } else {
        $('.username_invalid_error').css('display', 'block');
        $("button[name='saveprofile']").css('display', 'none');
    }
});*/

$('.profile-edit-btn').click(function () {
    var user_id = $(this).val();
    var Data = [];
    var Error = [];
    var Classname = ['name', 'company_name', 'choose_state', 'username', 'email'];

    for (var i = 0; i < Classname.length; i++) {
        if (!$.trim($('.' + Classname[i]).val())) {
            Error.push('');
            $('.' + Classname[i] + '_error').css("display", "block");
        } else {
            Data.push($.trim($('.' + Classname[i]).val()));
            $('.' + Classname[i] + '_error').css("display", "none");
        }
    }
    
    var username = ($('.username').val()).length;

    if ($('.username').val()) {
        if (username <= 6) {
            Error.push('');
            $('.username_invalid_error').css("display", "block");
        } else {
            $('.username_invalid_error').css("display", "none");
        }
    }
    
    /*var contact_no = (($('.contact_number').val().replace(/[_-]/g, '')).replace(/\(|\)/g, '')).length;

    if ($('.contact_number').val()) {
        if (contact_no !== 12) {
            Error.push('');
            $('.contact_number_invalid_error').css("display", "block");
        } else {
            $('.contact_number_invalid_error').css("display", "none");
        }
    }

    Data.push($.trim($('.law_firm_name').val()));
    Data.push($.trim($('.expected_delivery_date').val()));
    Data.push(case_id);*/


    Data.push($.trim($('.email').val()));

    if (!$.trim($('.email').val())) {
        $('.email_valid_error').css("display", "none");
    } else {
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test($.trim($('.email').val()))) {
            $('.email_valid_error').css("display", "none");
        } else {
            Error.push('');
            $('.email_valid_error').css("display", "block");
        }
    }

    if (Error.length === 0) {
        $.blockUI({message: '<h5><img src="./image/loader_1.gif" alt="Please wait..." width="20%" /> Please wait...</h5>'});
        $.ajax({
            type: 'POST',
            url: './trans.php',
            data: {'Id': 'profile-edit-details', 'Data': Data},
            success: function (data) {
                if (data === '1') {
                    alert('Profile Successfully Updated!');
                    location.reload();
                } else {
                    alert('Problem to update profile details *');
                }
            },
            complete: function () {
                $.unblockUI();
            }
        });
    }
});