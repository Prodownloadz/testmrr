$('#04').addClass('active');

$('.old_password').keyup(function () {
    var old_password = $(this).val();
    if (old_password) {
        $.ajax({
            type: 'POST',
            url: './trans.php',
            data: {'Id': 'old-password-check', 'Data': old_password},
            success: function (data) {
                if (data === '1') {
                    $('.invalid_old_password_error').css("display", "none");
                    $('.valid_old_password_msg').css("display", "block");
                    $('.change-password-btn').css("display", "block");
                } else {
                    $('.invalid_old_password_error').css("display", "block");
                    $('.valid_old_password_msg').css("display", "none");
                    $('.change-password-btn').css("display", "none");
                }
            }
        });
    }
});

$('.password, .confirm_password').keyup(function () {
    var password1 = $('.password').val();
    var password2 = $('.confirm_password').val();
    if (password1 !== password2) {
        $('.password_error_msg').css("display", "block");
        $('.change-password-btn').css("display", "none");
    } else {
        $('.password_error_msg').css("display", "none");
        $('.change-password-btn').css("display", "block");
    }
});

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onkeyup = function () {
    var error = [];
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
        error.push('1');
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
        error.push('1');
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
        error.push('1');
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
        error.push('1');
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
    if (error.length === 4) {
        document.getElementById("message").style.display = "none";
        $('.change-password-btn').css("display", "block");
        $('.confirm_password').removeAttr('readonly', 'readonly');
    } else {
        document.getElementById("message").style.display = "block";
        $('.change-password-btn').css("display", "none");
        $('.confirm_password').attr('readonly');
    }
};

$('.change-password-btn').click(function () {
    var Data = [];
    var Error = [];

    if (!$.trim($('.old_password').val())) {
        Error.push('');
        $('.old_password_error').css("display", "block");
    } else {
        Data.push($.trim($('.old_password').val()));
        $('.old_password_error').css("display", "none");
    }

    if (!$.trim($('.password').val())) {
        Error.push('');
        $('.password_error').css("display", "block");
    } else {
        Data.push($.trim($('.password').val()));
        $('.password_error').css("display", "none");
    }

    if (!$.trim($('.confirm_password').val())) {
        Error.push('');
        $('.confirm_password_error').css("display", "block");
    } else {
        $('.confirm_password_error').css("display", "none");
    }

    if (Error.length === 0) {
        $.ajax({
            type: 'POST',
            url: './trans.php',
            data: {'Id': 'change-password', 'Data': Data},
            success: function (data) {
                if (data === '1') {
                    alert("Password Successfully Changed!");
                    window.location.href = "./";
                } else {
                    alert("Problem to Change Password *");
                }
            }
        });
    }
});