<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('topscript') ?>
    <link href="<?php echo BEGIN_PATH; ?>/assets/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .mt-20 {
            margin-top: 10px;
        }
        @keyframes progress-bar-stripes {
            from {
                background-position: 1rem 0;
            }
            to {
                background-position: 0 0;
            }
        }
        .progress {
            height: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
            box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
        }
        .progress-bar {
            float: left;
            width: 0;
            height: 100%;
            font-size: 12px;
            line-height: 20px;
            color: #fff;
            text-align: center;
            background-color: #337ab7;
            -webkit-box-shadow: inset 0 -1px 0 rgb(0 0 0 / 15%);
            box-shadow: inset 0 -1px 0 rgb(0 0 0 / 15%);
            -webkit-transition: width .6s ease;
            -o-transition: width .6s ease;
            transition: width .6s ease;
        }
        .progress-bar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            background-color: #007bff;
            transition: width .6s ease;
        }
        .progress-bar-striped {
            background-image: linear-gradient(
                45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
            background-size: 1rem 1rem;
        }
        .progress-bar-animated {
            -webkit-animation: progress-bar-stripes 1s linear infinite;
            animation: progress-bar-stripes 1s linear infinite;
        }
        .progress-bar-striped.bg-success {
            background-color: #28a745!important
        }
        .progress-bar i {
            position: absolute;
            left: 42%;
            right: auto;
        }
        form .form-footer {
            border-top: 0px solid #d3dce9;
            padding: 20px 0 10px 0;
            margin-top: 20px;
        }
        .form-control {
            display: block;
            width: 100%;
            height: calc(2.6rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .dropzone {
                border: 2px dashed #377dff;
                border-radius: 5px;
                background: #f8fafd;
                min-height: 150px;
                padding: 20px 20px;
            }

            .dropzone i{

                font-size: 3rem;

            }

            .dropzone .dz-message {

                color: rgba(0,0,0,.54);

                font-weight: 500;

                font-size: initial;

                text-transform: capitalize;

            }

            .badge.bg-info {

                cursor: pointer;

                padding: 6px 10px;

                font-size: 14px;

                background: #0f3057;

                font-weight: 500;

                margin-top: 10px;

                margin-bottom: 10px;

            }

            .dz-preview {
                min-width: 130px !important;
                height: 120px;
                border: 1px solid #e7e7e7;
                padding: 5px;
                border-radius: 20px;
                margin: 10px;
                background: #dbdbdb;

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
            .dz-error-mark, .dz-success-mark{
                width: 50%;
                float: left;
                margin-top: 10px;
            }
            .dz-error-mark i, .dz-success-mark i {
                font-size: 1.5rem;
            }
            .dz-details{
                margin-top: 10px;
            }
            .dz-preview .dz-details span{
                color: #377dff;
            }

        .badge-class {
            cursor: pointer;
            padding: 6px 10px;
            font-size: 14px;
            background: #0f3057;
            font-weight: 500;
            margin-top: 10px;
            margin-bottom: 10px;
            color: #ffffff;
        }
        .upload-case-files-btn + .upload_files_02_error {
            clear: both;
            width: 100%;
            float: left;
            position: relative;
        }
    </style>
    <body>
        <div id="wrapper">
            <?php
            $this->load->view('leftmenu');
            $this->load->view('header');
            ?>    
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo BEGIN_PATH; ?>/cases/edit" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        <h4 class="form-header text-uppercase"><i class="fa fa-cloud"></i> Upload Output File</h4>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="dropzone w-100" id="dropzone" style="width: 100%;">
                                                    <div class="dz-message" style="text-align: center;">
                                                        <i class="fa fa-cloud" style="color: #0b91af;"></i><br>
                                                        Drag & Drop or Browse Your Files Here
                                                        <br />
                                                        <small>Max Size - 1.5GB / 1536MB</small>
                                                    </div>
                                                    <div class="dropped-files row" style="display: flex; margin-left: 0px;"></div>
                                                </div>   
                                                <input type="file" name="upload_files[]" id="upload_files" multiple="" style="display: none;">
                                                <span class="output_files_error collapse" style="font-size: 12px; color: red; margin-top: 5px;">Please upload files *</span>
                                            </div>
                                            <!--<div class="col-sm-6">
                                                <label class="col-form-label">Upload File :</label>
                                                <div class="output_files dropzone dropzone-area" id="output_files">
                                                    <form action="#">
                                                        <div class="dz-message">
                                                            <i class="fa fa-cloud" style="color: #0b91af;"></i><br>
                                                            Drop Images Here Or Click To Upload <br />
                                                            <small>Maximum file upload size 1.5GB / 1536MB</small>
                                                        </div>
                                                        <div class="fallback">
                                                            <input name="output_files" type="file" />
                                                        </div>
                                                    </form>
                                                </div>
                                                <span class="output_files_error collapse clearfix" style="font-size: 12px; color: red; margin-top: 5px;">Please upload files *</span>
                                                <span class="upload-case-files-btn badge badge-class clearfix" id="0" style="cursor: pointer; padding: 6px 10px; font-size: 14px;"><i class="fa fa-cloud"></i> Upload Output Files</span>
                                                <span class="upload_files_02_error collapse clearfix" style="font-size: 12px; color: red;">Please upload output files after you've submit *</span>
                                                <div class="progress mt-20" style="display: none;">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                </div>
                                                <input type="file" class="form-control" id="output_file" name="output_file" required="">
                                            </div>-->
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <input type="hidden" class="cid" name="cid" value="<?= $content[0]['id']; ?>">
                                                <div class="form-footer" style="float: right;">
                                                    <a href="<?php echo BEGIN_PATH; ?>/cases/caseview?cid=<?= $content[0]['id']; ?>" class="btn btn-danger"> Cancel</a>
                                                    <input type="button" class="upload-case-files-btn btn btn-success" name="register-submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('bottomscript'); ?>
        <!--Form Validatin Script-->
        <!--<script src="<?php echo BEGIN_PATH; ?>/assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>-->
        <!--<script src="<?php echo BEGIN_PATH; ?>/assets/js/dropzone.js" type="text/javascript"></script>-->
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/dropbox-api/Dropbox-sdk.js" type="text/javascript"></script>
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/jquery.blockUI.js" type="text/javascript"></script>
        <script type="text/javascript">         
                                                        
        /* Start Dropbox File Upload */
    
        var dropZone = document.getElementById('dropzone');
    
        dropZone.addEventListener('dragover', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.dataTransfer.dropEffect = 'copy';
        });
    
        dropZone.addEventListener('drop', function (e) {
            e.stopPropagation();
            e.preventDefault();
            var files = e.dataTransfer.files;
            upload(files);
        });
    
        $('#dropzone').click(function (e) {
            e.preventDefault();
            if (!$(e.target).hasClass('cancel-upload')) {
                $('#upload_files').trigger('click');
            }
        });
    
        $('#upload_files').change(function (e) {
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
    
            $.each(files, function (key, value) {
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
                var dbx = new Dropbox.Dropbox({accessToken: ACCESS_TOKEN});
    
                if (file.size < UPLOAD_FILE_SIZE_LIMIT) { // File is smaller than 150 Mb - use filesUpload API
                    dbx.filesUpload({path: '/Output-Files/' + file.name, contents: file}).then(function (response) {
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
                            return acc.then(function () {
                                return dbx.filesUploadSessionStart({close: false, contents: blob})
                                        .then(response => response.result.session_id);
                            });
                        } else if (idx < items.length - 1) {
                            // Append part to the upload session
                            return acc.then(function (sessionId) {
                                var cursor = {session_id: sessionId, offset: idx * maxBlob};
                                return dbx.filesUploadSessionAppendV2({cursor: cursor, close: false, contents: blob}).then(() => sessionId);
                            });
                        } else {
                            // Last chunk of data, close session
                            return acc.then(function (sessionId) {
                                var cursor = {session_id: sessionId, offset: file.size - blob.size};
                                var commit = {path: '/Output-Files/' + file.name, mode: 'add', autorename: true, mute: false};
                                return dbx.filesUploadSessionFinish({cursor: cursor, commit: commit, contents: blob});
                            });
                        }
                    }, Promise.resolve());
                    task.then(function (result) {
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
    
        $(document).on('click', '.cancel-upload', function (e) {
            var key = $(this).data('id');
            var file_name = $('#error' + key).attr('data-filename');
    
            if (file_name !== 'undefined') {
                var fileData = {
                    path: '/Output-Files/' + file_name
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
        
    
        $('.upload-case-files-btn').click(function () {
            var Error = [];
            var formData = new FormData();

            var filenames = [];

            $('.dropped-files').find('.cancel-upload').each(function () {
                filenames.push($(this).attr('data-filename'));
            });

            if (filenames.length === 0) {
                Error.push('');
                $('.output_files_error').addClass('show');
            } else {
                $('.output_files_error').removeClass('show');
            }
    
            var Data = {
                'cid': $('.cid').val(),
                'files': filenames
            };
    
            formData.append('Data', JSON.stringify(Data));
    
            if (Error.length === 0) {
                // if ($('.upload-case-files-btn').attr('id') === '1') {
                //     $('.upload_files_02_error').removeClass('show');
                    $.blockUI({message: '<h5><img src="<?php echo BEGIN_PATH; ?>/assets/images/loader_1.gif" alt="Please wait..." width="20%" /> Please wait...</h5>'});
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BEGIN_PATH; ?>/cases/edit',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            if (data === '1') {
                                alert('Case Output File Successfully Added!');
                                window.location.href = '<?php echo BEGIN_PATH; ?>/cases/caseview?cid=' + $('.cid').val();
                            } else {
                                alert('Problem to add case output files *');
                            }
                        },
                        complete: function () {
                            $.unblockUI();
                        }
                    });
                // } else {
                //     $('.upload_files_02_error').addClass('show');
                // }
            }
        });
        </script>
    </body>
</html>