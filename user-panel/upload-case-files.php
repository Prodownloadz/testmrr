<?php
session_start();
if (!isset($_SESSION['mrr-user-loggedin'])) {
    header('location: ./');
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
include("include/topscript.php");
include('include/config.php');
?>
<!--<link href="css/dropzone.css" rel="stylesheet" type="text/css"/>-->

<body>
    <style type="text/css">
        .mt-20 {
            margin-top: 10px;
        }

        .progress {
            position: relative;
            height: 20px;
            margin-bottom: 20px;
        }

        .progress-bar-striped.bg-success {
            background-color: #28a745 !important
        }

        .progress-bar {
            display: block;
            font-size: 12px;
            line-height: 20px;
        }

        .addcase {
            background: #06B7C2;
        }

        .dropzone {
            border: 2px dashed #0b91af;
            /*#377dff*/
            border-radius: 5px;
            background: #f8fafd;
            min-height: 150px;
            padding: 20px 20px;
        }

        .dropzone i {
            font-size: 3rem;
        }

        .dropzone .dz-message {
            color: rgba(0, 0, 0, .54);
            font-weight: 500;
            font-size: initial;
            text-transform: capitalize;
        }

        .badge-class {
            cursor: pointer;
            padding: 6px 10px;
            font-size: 14px;
            background-color: #0f3057;
            font-weight: 500;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .upload-case-files-btn+.upload_files_02_error {
            clear: both;
            width: 100%;
            float: left;
            position: relative;
        }

        .dz-preview {
            min-width: 130px !important;
            height: 120px;
            border: 1px solid #e7e7e7;
            padding: 5px;
            border-radius: 20px;
            margin: 10px;
            background: #dbdbdb;
            max-width: 130px;
        }

        .progress-bar {
            background-color: #007bff;
        }

        .dz-image {
            position: absolute;
            width: 120px;
            height: 120px;
        }

        .dz-details {
            max-width: 120px;
            overflow: hidden;
            text-align: center;
        }

        .dz-success-mark {
            font-size: 25px;
            color: #4CAF50;
            text-align: center;
        }

        .dz-error-mark {
            font-size: 25px;
            color: #F44336;
            text-align: center;
        }

        .dz-filename {
            overflow: hidden;
            height: 25px;
            display: inline-block;
        }

        .dz-error-mark,
        .dz-success-mark {
            width: 50%;
            float: left;
            margin-top: 10px;
        }

        .dz-error-mark i,
        .dz-success-mark i {
            font-size: 1.5rem;
        }

        .dz-details {
            margin-top: 10px;
        }

        .dz-preview .dz-details span {
            color: #377dff;
        }
    </style>
    <div class="container-fluid" id="dashboard wrapper">
        <div class="row top-flex">
            <?php
            include("include/header.php");
            include("include/side-menu.php");
            ?>
            <div class="col-lg-10" id="main-page-wapper">
                <div class="col-lg-12 breadcrumb-holder p-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Upload Case Files</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 page-padding">
                    <div class="col-sm-12">
                        <ul>
                            <li>1. Hey! You are here for uploading your files.</li>
                            <li>2. Use this widget! The files can be browsed or dropped. Please select the files if you have bunch of files when you are try browsing.</li>
                            <li>3. Then, Click upload.</li>
                            <li>4. Do you have any trouble in uploading the files below?</li>
                            <li>
                                5. Then, you can upload files using this Zoho Drive also -
                                <a href="https://workdrive.zohopublic.in/collection/th23wbb05a91450c84e66877666f7bcbda5bc/external" style="color: #ff1616; text-decoration: underline;font-weight:bold;" target="_blank">Zoho Drive  - Case Files Upload</a>
                                           
                                           <!---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--->
											<br />
											  <!---<a href="https://www.dropbox.com/request/0OfBN1E1CVHnni2kVpJ1" style="color: #47b050; text-decoration: underline; line-height: 40px;" target="_blank">Zoho Drive  - Case Files Upload </a> -->
                                        </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <iframe src="https://medicalrecordsreform.sharefile.com/remoteupload/195ecd64-7256-4db8-99ce-410c3c268314" frameborder="0" width="1000px" height="500px" scrolling="auto" id="sfRemoteUploadFrame"></iframe>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
        $('#02').addClass('active');
    </script>
    <script src="js/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="js/jquery.blockUI.js" type="text/javascript"></script>
    <script src="../js/dropbox-api/Dropbox-sdk.js" type="text/javascript"></script>
    <script type="text/javascript">
        /* Start Dropbox File Upload */

        var dropZone = document.getElementById('dropzone');

        dropZone.addEventListener('dragover', function(e) {
            e.stopPropagation();
            e.preventDefault();
            e.dataTransfer.dropEffect = 'copy';
        });

        dropZone.addEventListener('drop', function(e) {
            e.stopPropagation();
            e.preventDefault();
            var files = e.dataTransfer.files;
            upload(files);
        });

        $('#dropzone').click(function(e) {
            e.preventDefault();
            if (!$(e.target).hasClass('cancel-upload')) {
                $('#upload_files').trigger('click');
            }
        });

        $('#upload_files').change(function(e) {
            var files = e.target.files;
            upload(files);
        });

        var dropboxToken = "3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT";
        var listupload = [];
        var filenames = [];
        var droppedfiles = 0;
        var uploadedfiles = 0;
        var cancelled = 0;

        function upload(files) {
            if (files.length) {
                $('.upload-case-files-btn').attr('disabled', true);
                $('.dz-message').addClass('collapse');
            } else {
                $('.dz-message').removeClass('collapse');
            }

            droppedfiles = (droppedfiles * 1) + files.length;

            $.each(files, function(key, value) {
                $('.upload-case-files-btn').attr('disabled', true);

                var file = value;

                var key_val = Math.floor(1000 + Math.random() * 9000);

                var _size = file.size;
                var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
                    i = 0;
                while (_size > 900) {
                    _size /= 1024;
                    i++;
                }
                var exactSize = (Math.round(_size * 100) / 100) + ' ' + fSExt[i];

                var preview = ' <div class="dz-preview" style="z-index:1" id="preview_' + key_val + '">\
    <div class="dz-image" style="z-index:-1"><img data-dz-thumbnail="" alt="" ></div>\
    <div class="dz-details">\
      <div class="dz-size"><span data-dz-size=""><strong>' + exactSize + '</strong> </span></div>\
      <div class="dz-filename"><span data-dz-name="">' + file.name + '</span></div>\
    </div>\
    <div class="dz-progress progress">\
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="progressbar' + key_val + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Uploading...</div>\
    </div>\
    <div class="dz-error-message"  style="display: none;"><span data-dz-errormessage=""></span></div>\
    <div class="dz-success-mark" id="success' + key_val + '" style="display: none;">\
     <i class="fa fa-check" aria-hidden="true"></i>\
    </div>\
    <div class="dz-error-mark dz-remove-btn-' + key_val + '" data-id="' + key_val + '" style="z-index: 999; display: none;">\
     <i class="fa fa-times-circle cancel-upload" aria-hidden="true" data-id="' + key_val + '" id="error' + key_val + '"></i>\
    </div>\
  </div>';

                $('.dropped-files').append(preview);

                const UPLOAD_FILE_SIZE_LIMIT = 150 * 1024 * 1024;
                var ACCESS_TOKEN = dropboxToken;
                var dbx = new Dropbox.Dropbox({
                    accessToken: ACCESS_TOKEN
                });

                if (file.size < UPLOAD_FILE_SIZE_LIMIT) { // File is smaller than 150 Mb - use filesUpload API
                    dbx.filesUpload({
                        path: '/Case-Files/' + file.name,
                        contents: file
                    }).then(function(response) {
                        $('.upload-case-files-btn').attr('disabled', true);
                        if (response.status === 200) {
                            $('#progressbar' + key_val).closest('.progress').hide();
                            $('.dz-remove-btn-' + key_val).css('display', 'block');
                            $('#success' + key_val).show();

                            $('#error' + key_val).attr('data-filename', file.name);
                            $('.upload-case-files-btn').attr('disabled', false);
                        }
                    });
                } else { // File is bigger than 150 Mb - use filesUploadSession* API
                    const maxBlob = 128 * 1000 * 1000; // 128Mb - Dropbox JavaScript API suggested max file / chunk size
                    var workItems = [];
                    var offset = 0;
                    while (offset < file.size) {
                        var chunkSize = Math.min(maxBlob, file.size - offset);
                        workItems.push(file.slice(offset, offset + chunkSize));
                        offset += chunkSize;
                    }
                    const task = workItems.reduce((acc, blob, idx, items) => {
                        if (idx === 0) {
                            // Starting multipart upload of file
                            return acc.then(function() {
                                return dbx.filesUploadSessionStart({
                                        close: false,
                                        contents: blob
                                    })
                                    .then(response => response.result.session_id);
                            });
                        } else if (idx < items.length - 1) {
                            // Append part to the upload session
                            return acc.then(function(sessionId) {
                                var cursor = {
                                    session_id: sessionId,
                                    offset: idx * maxBlob
                                };
                                return dbx.filesUploadSessionAppendV2({
                                    cursor: cursor,
                                    close: false,
                                    contents: blob
                                }).then(() => sessionId);
                            });
                        } else {
                            // Last chunk of data, close session
                            return acc.then(function(sessionId) {
                                var cursor = {
                                    session_id: sessionId,
                                    offset: file.size - blob.size
                                };
                                var commit = {
                                    path: '/Case-Files/' + file.name,
                                    mode: 'add',
                                    autorename: true,
                                    mute: false
                                };
                                return dbx.filesUploadSessionFinish({
                                    cursor: cursor,
                                    commit: commit,
                                    contents: blob
                                });
                            });
                        }
                    }, Promise.resolve());
                    task.then(function(result) {
                        $('.upload-case-files-btn').attr('disabled', true);
                        if (result.status === 200) {
                            $('#progressbar' + key_val).closest('.progress').hide();
                            $('.dz-remove-btn-' + key_val).css('display', 'block');
                            $('#success' + key_val).show();

                            $('#error' + key_val).attr('data-filename', file.name);
                            $('.upload-case-files-btn').attr('disabled', false);
                        }
                    });
                }
            });
        }

        $(document).on('click', '.cancel-upload', function(e) {
            var key = $(this).data('id');
            var file_name = $('#error' + key).attr('data-filename');

            if (file_name !== 'undefined') {
                var fileData = {
                    path: '/Case-Files/' + file_name
                };

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'https://api.dropboxapi.com/2/files/delete_v2');
                xhr.setRequestHeader('Authorization', 'Bearer ' + dropboxToken);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(JSON.stringify(fileData));

                $("#preview_" + key).remove();
            }
            if ($.trim($('.dropped-files').html()) === '') {
                $('.dz-message').removeClass('collapse');
            } else {
                $('.dz-message').addClass('collapse');
            }
        });

        /* End Dropbox File Upload */

        $('.upload-case-files-btn').click(function() {
            var Data = [];
            var Error = [];
            var formData = new FormData();

            Data.push($.trim($('.case_id').val()));

            var filenames = [];

            $('.dropped-files').find('.cancel-upload').each(function() {
                filenames.push($(this).attr('data-filename'));
            });

            if (filenames.length === 0) {
                Error.push('');
                $('.upload_files_error').addClass('show');
            } else {
                $('.upload_files_error').removeClass('show');
            }

            Data.push(filenames);

            formData.append('Id', 'upload-case-files');
            formData.append('Data', JSON.stringify(Data));

            if (Error.length === 0) {
                $.blockUI({
                    message: '<h5><img src="image/loader.gif" alt="Please wait..." width="15%" /> Please wait...</h5>'
                });
                $.ajax({
                    type: 'POST',
                    url: './trans.php',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(data) {
                        if (data === '1') {
                            alert('Case Files are Successfully Uploaded!');
                            window.location.href = "./case-management.php";
                        } else {
                            alert('Problem to add case files *');
                        }
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            } else {
                var class_name = $('[class*="_error"].show').attr('class').split(' ')[0];
                $('html, body').stop().animate({
                    scrollTop: $('.' + class_name).offset().top - 200
                }, 500);
            }
        });
    </script>
    <?php
    include("include/bottomscript.php");
