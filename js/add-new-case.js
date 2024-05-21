$('.contact_number').inputmask('+1(999)-999-9999');

//Dropzone.autoDiscover = false;
//var DZ = new Dropzone("#upload_files", {
//    maxFilesize: null, // MB
//    maxFiles: null,
//    acceptedFiles: null,
//    preventDuplicates: true,
//    dictDuplicateFile: "Duplicate Files Cannot Be Uploaded",
//    autoProcessQueue: false,
//    paramName: "file",
//    addRemoveLinks: true,
//    url: "#",
//    dictRemoveFile: " Remove"
//});
//
//DZ.on("addedfile", function (file) {
//    $('.dz-progress').hide();
//    if (this.files.length) {
//        var _i, _len;
//        for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) {
//            if (this.files[_i].name === file.name && this.files[_i].size === file.size && this.files[_i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
//                this.removeFile(file);
//            }
//        }
//        var uploaded_size = 0;
//        $.each(this.files, function (i, v) {
//            uploaded_size += v.size;
//        });
//        uploaded_size = (uploaded_size / (1024 * 1024)).toFixed(2);
//        if (uploaded_size > 2048.00) {
//            alert('Total size of all files: ' + uploaded_size + ' MB');
//            this.removeFile(file);
//        } else {
//            $('.upload_files_error').removeClass('show');
//        }
//    }
//});

//function progressBarLoop(arr) {
//    var result = true;
//    $.each(arr, function (key, value) {
//        $('.progress').show();
//        $('.progress-bar').addClass('progress-bar-animated');
//        $('.progress-bar').width(value + '%');
//        $('.progress-bar').attr("aria-valuenow", value);
//        $('.progress-bar').html('Uploading...');
//        if (value === 100) {
//            $('.progress-bar').removeClass('progress-bar-animated');
//            $('.progress-bar').addClass('bg-success');
//            $('.progress-bar').html('<i class="fa fa-check"></i> Uploaded!');
//            result = false;
//        }
//    });
//    return result;
//}

//function TimerFunc(Timings, arr) {
//    var Dates = new Date();
//    const deadline = Dates.setMinutes(Dates.getMinutes() + Timings);
//    var result = true;
//    var x = setInterval(function () {
//        var now = new Date().getTime();
//        var t = deadline - now;
//        var progressbar = progressBarLoop(arr);
//        clearInterval(x);
//        if (t < 0) {
//            if (!progressbar) {
//                result = false;
//            }
//        }
//    }, 1000);
//    return result;
//}

//$('.upload-case-files-btn').click(function () {
//    var formData = new FormData();
//    var upload_files = DZ.getAcceptedFiles();
//    if (upload_files.length !== 0) {
//        $('.upload_files_error').removeClass('show');
//        $('.upload_files_02_error').removeClass('show');
//        $('div#upload_files').block({message: null});
//        for (var i = 0; i < upload_files.length; i++) {
//            formData.append('file[]', upload_files[i]);
//        }
//
//        var Timings = 5;
//        var arr = [10, 20, 30, 40, 50, 60, 70];
//        $('.add-new-case').attr("disabled", 'disabled');
//        $('.upload-case-files-btn').attr('id', '0');
//        TimerFunc(Timings, arr);
//
//        $.ajax({
//            type: 'POST',
//            url: './file-upload.php',
//            contentType: false,
//            processData: false,
//            data: formData,
//            success: function (data) {
//                console.log(data);
//                if (data === '1') {
//                    var Timings = 0;
//                    var arr = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
//                    TimerFunc(Timings, arr);
//                    $('.add-new-case').removeAttr("disabled");
//                    $('.upload-case-files-btn').attr('id', '1');
//                } else {
//                    alert('Problem to upload case files *');
//                }
//            }
//        });
//
////        for (var i = 0; i < upload_files.length; i++) {
////            var file = upload_files[i];
////            uploadFile(file);
////        }
//    } else {
//        $('.upload_files_error').addClass('show');
//    }
//});

$('.add-new-case').click(function () {
    var Data = [];
    var Error = [];
    var formData = new FormData();
    var Classname = ['attorney_name', 'contact_person', 'email', 'contact_number'];

    for (var i = 0; i < Classname.length; i++) {
        if (!$.trim($('.' + Classname[i]).val())) {
            Error.push('');
            $('.' + Classname[i] + '_error').addClass('show');
        } else {
            Data.push($.trim($('.' + Classname[i]).val()));
            $('.' + Classname[i] + '_error').removeClass('show');
        }
    }

    Data.push($('.state').val());

    var Classname_2 = ['case_name', 'case_type', 'case_description'];

    for (var j = 0; j < Classname_2.length; j++) {
        if (!$.trim($('.' + Classname_2[j]).val())) {
            Error.push('');
            $('.' + Classname_2[j] + '_error').addClass('show');
        } else {
            Data.push($.trim($('.' + Classname_2[j]).val()));
            $('.' + Classname_2[j] + '_error').removeClass('show');
        }
    }

    var contact_no = (($('.contact_number').val().replace(/[_-]/g, '')).replace(/\(|\)/g, '')).length;

    if ($('.contact_number').val()) {
        if (contact_no !== 12) {
            Error.push('');
            $('.contact_number_invalid_error').addClass('show');
        } else {
            $('.contact_number_invalid_error').removeClass('show');
        }
    }

    if (!$.trim($('.email').val())) {
        $('.email_valid_error').removeClass('show');
    } else {
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test($.trim($('.email').val()))) {
            $('.email_valid_error').removeClass('show');
        } else {
            Error.push('');
            $('.email_valid_error').addClass('show');
        }
    }

    var email = $('.email').val();

    if (!$.trim($('.email_2').val())) {
        $('.email_2_valid_error').removeClass('show');
    } else {
        var testEmail_2 = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail_2.test($.trim($('.email_2').val()))) {
            $('.email_2_valid_error').removeClass('show');
        } else {
            Error.push('');
            $('.email_2_valid_error').addClass('show');
        }
    }

    Data.push($.trim($('.law_firm_name').val()));
    Data.push($.trim($('.country').val()));
    Data.push($.trim($('.expected_delivery_date').val()));

    if ($('.review_services:checked').length === 0 && $('.add_on_services:checked').length === 0 && $('.medical_charts:checked').length === 0) {
        $('.service_request_error').addClass('show');
        Error.push('');
    } else {
        var review_services = [];
        $('.review_services:checked').each(function (i) {
            review_services.push($(this).val());
        });
        Data.push(review_services);

        var add_on_services = [];
        $('.add_on_services:checked').each(function (i) {
            add_on_services.push($(this).val());
        });
        Data.push(add_on_services);

        var medical_charts = [];
        $('.medical_charts:checked').each(function (i) {
            medical_charts.push($(this).val());
        });
        Data.push(medical_charts);
        $('.service_request_error').removeClass('show');
    }

    Data.push($.trim($('.notes').val()));

//    var upload_files = DZ.getAcceptedFiles();
//
//    var uploaded_file_names = [];
//
//    if (upload_files.length === 0) {
//        Error.push('');
//        $('.upload_files_error').addClass('show');
//    } else {
//        for (var i = 0; i < upload_files.length; i++) {
//            uploaded_file_names.push(upload_files[i].name);
//        }
//        $('.upload_files_error').removeClass('show');
//    }
//
//    Data.push(uploaded_file_names);

    var filenames = [];

//    $('.dropped-files').find('.cancel-upload').each(function () {
//        filenames.push($(this).attr('data-filename'));
//    });
//
//    if (filenames.length === 0) {
//        Error.push('');
//        $('.upload_files_error').addClass('show');
//    } else {
//        $('.upload_files_error').removeClass('show');
//    }

    Data.push(filenames);

    Data.push($.trim($('.email_2').val()));

    formData.append('Id', 'add-new-case-guest');
    formData.append('Data', JSON.stringify(Data));

    if (Error.length === 0) {
        if ($.trim(email)) {
            $.blockUI({message: '<h5><img src="user-panel/image/loader.gif" alt="Please wait..." width="15%" /> Please wait...</h5>'});
            $.ajax({
                type: 'POST',
                url: './trans.php',
                data: {'Id': 'is-check-customer', 'email': email},
                success: function (data) {
                    if (data === '1') {
                        $('.email_already_exists_error').removeClass('show');
//                        if ($('.upload-case-files-btn').attr('id') === '1') {
//                            $('.upload_files_02_error').removeClass('show');
//                        $.blockUI({message: ''});
                        $('.add-new-case').attr('disabled', 'disabled');
                        $.ajax({
                            type: 'POST',
                            url: './trans.php',
                            contentType: false,
                            processData: false,
                            data: formData,
//                            beforeSend: function () {
//                                $.blockUI({message: '<h5><img src="user-panel/image/loader.gif" alt="Please wait..." width="15%" /> Please wait...</h5>'});
//                            },
                            success: function (data) {
                                var rData = JSON.parse(data);
                                if (rData[0] === '1') {
                                    alert('Case Successfully Added, Please Upload you are Case Files *');
                                    window.location.href = './upload-case-files.php?case=' + rData[1];
                                } else {
                                    alert('Problem to add case details *');
                                }
                            },
                            complete: function () {
                                $.unblockUI();
                            }
                        });
//                        } else {
//                            $('.upload_files_02_error').addClass('show');
//                        }
                    } else {
                        $('.email_already_exists_error').addClass('show');
                        var class_name = $('[class*="_error"].show').attr('class').split(' ')[0];
                        $('html, body').stop().animate({
                            scrollTop: $('.' + class_name).offset().top - 200
                        }, 500);
                        $.unblockUI();
                    }
                }
//                ,
//                complete: function () {
//                    $.unblockUI();
//                }
            });
        }
    } else {
        var class_name = $('[class*="_error"].show').attr('class').split(' ')[0];
        $('html, body').stop().animate({
            scrollTop: $('.' + class_name).offset().top - 200
        }, 500);
    }
});

$('.email').keyup(function () {
    var email = $(this).val();
    if ($.trim(email)) {
        $.ajax({
            type: 'POST',
            url: './trans.php',
            data: {'Id': 'is-check-customer', 'email': email},
            success: function (data) {
                console.log(data);
                if (data === '1') {
                    $('.email_already_exists_error').removeClass('show');
                } else {
                    $('.email_already_exists_error').addClass('show');
                }
            }
        });
    }
});