$('#03').addClass('active');

$('.contact_number').inputmask('+1(999)-999-9999');

//Dropzone.autoDiscover = false;
//var DZ = new Dropzone("#additional_files", {
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

$('.cancel-btn').click(function () {
    location.reload();
});

$('.update-case-detail-1').click(function () {
    var case_id = $(this).val();
    var Data = [];
    var Error = [];
    var Classname = ['attorney_name', 'contact_person', 'contact_number', 'case_name', 'case_description', 'case_type'];

    for (var i = 0; i < Classname.length; i++) {
        if (!$.trim($('.' + Classname[i]).val())) {
            Error.push('');
            $('.' + Classname[i] + '_error').css("display", "block");
        } else {
            Data.push($.trim($('.' + Classname[i]).val()));
            $('.' + Classname[i] + '_error').css("display", "none");
        }
    }

    var contact_no = (($('.contact_number').val().replace(/[_-]/g, '')).replace(/\(|\)/g, '')).length;

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
    Data.push(case_id);

//    if (!$.trim($('.email').val())) {
//        Error.push('');
//        $('.email_error').css("display", "block");
//    } else {
    Data.push($.trim($('.email').val()));
//        $('.email_error').css("display", "none");
//    }

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
            data: {'Id': 'update-case-detail-1', 'Data': Data},
            success: function (data) {
                if (data === '1') {
                    alert('Case Details Successfully Updated!');
                    location.reload();
                } else {
                    alert('Problem to update case details *');
                }
            },
            complete: function () {
                $.unblockUI();
            }
        });
    }
});

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
//
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
//
//$('.upload-case-files-btn').click(function () {
//    var formData = new FormData();
//    var upload_files = DZ.getAcceptedFiles();
//    if (upload_files.length !== 0) {
//        $('.upload_files_error').removeClass('show');
//        $('.upload_files_02_error').removeClass('show');
//        $('div#additional_files').block({message: null});
//        for (var i = 0; i < upload_files.length; i++) {
//            formData.append('file[]', upload_files[i]);
//        }
//        
//        var Timings = 5;
//        var arr = [10, 20, 30, 40, 50, 60, 70];
//        $('.update-case-detail-2').attr("disabled", 'disabled');
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
//                    $('.update-case-detail-2').removeAttr("disabled");
//                    $('.upload-case-files-btn').attr('id', '1');
//                } else {
//                    alert('Problem to upload case files *');
//                }
//            }
//        });
//        
//        // for (var i = 0; i < upload_files.length; i++) {
//        //     var file = upload_files[i];
//        //     uploadFile(file);
//        // }
//    } else {
//        $('.upload_files_error').addClass('show');
//    }
//});

$('.update-case-detail-2').click(function () {
    var case_id = $(this).val();
    var Data = [];
    var Error = [];
    var formData = new FormData();

    Data.push($.trim($('.additional_info').val()));
    Data.push(case_id);

//    var upload_files = DZ.getAcceptedFiles();
//
//    var uploaded_file_names = [];
//
//    if (upload_files.length !== 0) {
//        for (var i = 0; i < upload_files.length; i++) {
//            uploaded_file_names.push(upload_files[i].name);
//        }
//    }
//
//    Data.push(uploaded_file_names);

    var filenames = [];

    $('.dropped-files').find('.cancel-upload').each(function () {
        filenames.push($(this).attr('data-filename'));
    });

    if (filenames.length === 0) {
        Error.push('');
        $('.upload_files_error').addClass('show');
    } else {
        $('.upload_files_error').removeClass('show');
    }

    Data.push(filenames);

    formData.append('Id', 'update-case-detail-2');
    formData.append('Data', JSON.stringify(Data));

    if (Error.length === 0) {
//        if (upload_files.length !== 0) {
//            if ($('.upload-case-files-btn').attr('id') === '1') {
//                $('.upload_files_02_error').removeClass('show');
//            } else {
//                $('.upload_files_02_error').addClass('show');
//                return false;
//            }
//        }
        $.blockUI({message: '<h5><img src="image/loader.gif" alt="Please wait..." width="15%" /> Please wait...</h5>'});
        $.ajax({
            type: 'POST',
            url: './trans.php',
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                if (data === '1') {
                    alert('Case Additional Info Successfully Updated!');
                    location.reload();
                } else {
                    alert('Problem to update case details *');
                }
            },
            complete: function () {
                $.unblockUI();
            }
        });
    }
});

$('.update-case-detail-3').click(function () {
    var case_id = $(this).val();
    var Data = [];
    var Error = [];

    Data.push(case_id);

    if ($('.review_services:checked').length === 0 && $('.add_on_services:checked').length === 0 && $('.medical_charts:checked').length === 0) {
        $('.service_request_error').css("display", "block");
        Error.push('');
    } else {
        var review_services = [];
//    if ($('.review_services:checked').length === 0) {
//        Error.push('');
//        $('.review_services_error').css("display", "block");
//    } else {
        $('.review_services:checked').each(function (i) {
            review_services.push($(this).val());
        });
        Data.push(review_services);
//        $('.review_services_error').css("display", "none");
//    }

        var add_on_services = [];
//    if ($('.add_on_services:checked').length === 0) {
//        Error.push('');
//        $('.add_on_services_error').css("display", "block");
//    } else {
        $('.add_on_services:checked').each(function (i) {
            add_on_services.push($(this).val());
        });
        Data.push(add_on_services);
//        $('.add_on_services_error').css("display", "none");
//    }

        var medical_charts = [];
//    if ($('.medical_charts:checked').length === 0) {
//        Error.push('');
//        $('.medical_charts_error').css("display", "block");
//    } else {
        $('.medical_charts:checked').each(function (i) {
            medical_charts.push($(this).val());
        });
        Data.push(medical_charts);
//        $('.medical_charts_error').css("display", "none");
//    }
        $('.service_request_error').css("display", "none");
    }

    if (Error.length === 0) {
        $.blockUI({message: '<h5><img src="./image/loader_1.gif" alt="Please wait..." width="20%" /> Please wait...</h5>'});
        $.ajax({
            type: 'POST',
            url: './trans.php',
            data: {'Id': 'update-case-detail-3', 'Data': Data},
            success: function (data) {
                if (data === '1') {
                    alert('Case Services Successfully Updated!');
                    location.reload();
                } else {
                    alert('Problem to update case details *');
                }
            },
            complete: function () {
                $.unblockUI();
            }
        });
    }
});

$('.case-file-remove-btn').click(function () {
    if (confirm("Are you sure want to remove the case file ?")) {
        window.location.href = "case-file-delete.php?case-file-id=" + $(this).val() + "&case-id=" + $(this).attr('id');
    }
});