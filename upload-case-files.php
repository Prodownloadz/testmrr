<!doctype html>

<html class="no-js" lang="">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Medical Records Reform</title>

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">



        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- Place favicon.ico in the root directory -->

        <link rel='icon' href="img/favicon.ico" >

        <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->

        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Font Awesome -->

        <link href="css/font-awesome.css" rel="stylesheet">

        <!-- Main Style -->

        <link href="css/magnific-popup.css" rel="stylesheet">

        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />-->

        <link href="css/slick.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">

        <link rel="stylesheet" href="css/responsive.css">

        <link rel="stylesheet" href="css/style.css">

        <!-- STYLE FOR OPENING IMAGE IN POPUP USING FANCYBOX-->

        <!--<link href="css/jquery.fancybox.css" rel="stylesheet" />-->

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

        <!--<link rel="stylesheet" type="text/css" href="css/extralayers.css" media="screen" />-->

        <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

        <!-- Flex Slider -->

        <!--<link href="css/flexslider.css" rel="stylesheet">-->

        <link rel="stylesheet" href="css/m_responsive.css">



        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!--<link href="user-panel/css/dropzone.css" rel="stylesheet" type="text/css"/>-->

        <style type="text/css">

            .mt-20 {

                margin-top: 10px;

            }
            .w-100{
                width:100%;
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

                margin-bottom: 10px;

                overflow: hidden;

                background-color: #f5f5f5;

                border-radius: 4px;

                -webkit-box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);

                box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);

                width: 100%;

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

            input.upload-case-files-btn {

                background: #0b91af;

                border: 1px solid #0b91af;

                color: #fff;

                width: auto;

                margin: 15px 0;

                padding: 12px 20px;

                height: auto;

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
            .add_service_info ul{
                list-style-type: disc;
            }
            .add_service_info ul li{
                position: relative;
            }
        </style>

    </head>

    <body class="s_home" data-spy="scroll" data-target=".navbar">



        <div class="wrapper">

            <!--[if lt IE 8]>

                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

            <![endif]-->









            <!-- Static navbar -->

            <header id="header" class="header-style-two">

                <!--Topbar Starts-->

                <section class="top_bar">

                    <div class="container">

                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

                            <ul class="top_contact">

                                <li><a href="tel:+17702155493"><i class="fa fa-phone"></i>+17702155493</a></li>

                                <li><a href="mailto:support@medicalrecordsreform.com"><i class="fa fa-envelope-o"></i>support@medicalrecordsreform.com</a></li>

                            </ul> 

                        </div>

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                            <ul class="top_uploadlogin">

                                <li><a href="just-submit-case.php" class="animated-button1">

                                        <span></span>

                                        <span></span>

                                        <span></span>

                                        <span></span><i class="fa fa-upload"></i> Upload Your Case</a></li>

                                <li><a href="./user-panel" target="_blank"><i class="fa fa-sign-in"></i> Login</a></li>

                            </ul>

                            <div class="focus_country">

                                <img src="img/us_flag.jpg" alt="USA Flag"  />

                            </div>



                        </div>

                    </div>

                </section>



                <!--Topbar Ends-->



                <nav class="navbar navbar-default navbar-static-top no-margin"> 

                    <div class="container">

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                                <span class="sr-only">Toggle navigation</span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>

                            <a href="index.html" title="MRR Logo">



                                <img class="navbar-brand" src="img/logo.png" alt="Medical Records Reform LLC Logo">

                            </a>

                        </div>





                        <div id="navbar" class="navbar-collapse collapse navbar-right">

                            <ul class="nav navbar-nav main-menu scrollable-menu">

                                <li><a href="index.html">Home</a></li>

                                <li><a href="about.html">About</a></li>





                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> Our Services</a>



                                    <div class="dropdown-menu dropdown-large">

                                        <div class="row">

                                            <div class="col-md-5">

                                                <h4 class="title">Review Services</h4>

                                                <ul class="list-unstyled">

                                                    <li><a href="medical-chronology.html">Medical Chronology</a></li>

                                                    <li><a href="narrative-summary.html">Narrative Summary</a></li>

                                                    <li><a href="demand-letter.html">Demand Letter</a></li>

                                                    <li><a href="expert-medical-opinion.html">Expert Medical Opinion</a></li>

                                                    <li><a href="deposition-summary.html">Deposition Summary</a></li>

                                                </ul>

                                            </div>

                                            <div class="col-md-7">

                                                <h4 class="title">Add on services</h4>

                                                <ul class="list-unstyled">

                                                    <li><a href="medical-expenses-billing-summary.html">Medical Expenses & Billing Summary</a></li>

                                                    <li><a href="med-interpret.html">Med-Interpret/ Med-A-Word</a></li>

                                                    <li><a href="bookmarks.html">Bookmarks <strong>*Free</strong></a></li>

                                                    <li><a href="hyperlinks.html">Hyperlinks <strong>*Free</strong></a></li>

                                                    <li><a href="identify-missing-records.html">Identify missing records <strong>*Free</strong></a></li>

                                                    <li><a href="pdf-merging-sorting.html">PDF Merging & Sorting</a></li>

                                                    <li><a href="provider-list.html">Provider List</a></li>

                                                    <li><a href="jury-questionnaires.html">Jury Questionnaires</a></li>

                                                </ul>

                                            </div>

                                        </div>

                                    </div> <!-- dropdown-large.// -->



                                </li>



                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Expertise</a>

                                    <ul class="dropdown-menu">

                                        <li><a href="personal-injury.html">Personal Injury</a></li>

                                        <li><a href="medical-malpractice.html">Medical Malpractice</a></li>

                                        <li><a href="mass-tort.html">Mass Tort</a></li>

                                        <li><a href="workers-compensation.html">Worker’s Compensation</a></li>

                                        <li><a href="nursing-home-abuse.html">Nursing Home Abuse</a></li> 

                                        <li><a href="product-liability.html">Product Liability</a></li> 

                                    </ul>

                                </li>

                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Others</a>

                                    <ul class="dropdown-menu">

                                        <li><a href="medical-charts.html">Medical Charts</a></li>

                                        <li><a href="our-samples.html">Our Samples</a></li>

                                        <li><a href="our-pricing.html">Our Pricing</a></li>

                                        <li><a href="blog.html">Blog</a></li>

                                    </ul>

                                </li>

                                <li><a href="contact-us.html">Contact Us</a></li>



                            </ul>

                        </div><!--/.nav-collapse -->

                    </div>

                </nav>



            </header>
            <div class="wrap-contact100">
                <div class="contact100-form ">
                    <form class="validate-form w-100" enctype="multipart/form-data" >
                        <div class="add_service_info two_uploadbtn jus_submit nw_jus_submit">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul>
                                        <li>1. Hey! You are here for uploading your files.</li>
                                        <li>2. Use this widget! The files can be browsed or dropped. Please select the files if you have bunch of files when you are try browsing.</li>
                                        <li>3. Then, Click upload.</li>
                                        <li>4. Do you have any trouble in uploading the files in widget area?</li>
                                        <li>
                                            5. Then, you can upload files using this Zoho Drive also -
											
                                            <a href="https://workdrive.zohopublic.in/collection/th23wbb05a91450c84e66877666f7bcbda5bc/external" style="color: #ff1616; text-decoration: underline;font-weight:bold;" target="_blank">Zoho Drive  - Case Files Upload</a>
                                           
                                           <!---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--->
											<br />
											  <!---<a href="https://www.dropbox.com/request/0OfBN1E1CVHnni2kVpJ1" style="color: #47b050; text-decoration: underline; line-height: 40px;" target="_blank">Zoho Drive  - Case Files Upload </a> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!---<div class="row mt-5">
                                <div class="col-sm-12">
                                    <div class="dropzone w-100" id="dropzone" style="width: 100%;">
                                        <div class="dz-message" style="text-align: center;">
                                            <i class="fa fa-cloud-upload" style="color: #377dff;"></i><br>
                                            Drag & Drop or Browse Your Files Here
                                            <br />
                                            <small>Max Size - 1.5GB / 1536MB</small>
                                        </div>
                                        <div class="dropped-files row" style="display: flex; margin-left: 0px;"></div>
                                    </div>   
                                    <input type="file" name="upload_files[]" id="upload_files" multiple="" style="display: none;">
                                    <span class="upload_files_error collapse" style="font-size: 12px; color: red; margin-top: 5px;">Please upload files *</span>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-md-12 col-sm-12">
                                    <input type="hidden" class="case_id" value="<?= $_GET['case']; ?>" />
                                    <input class="upload-case-files-btn" style="float: right;" type="button" value="Upload" />
                                </div>
                            </div>-->
                        </div>
                    </form>
                   <!--<iframe src="https://rrrhealthtechllc.sharefile.com/remoteupload/acbc25f5-a50f-474c-a58d-034ef43fd950" frameborder="0" width="400px" height="500px" scrolling="auto" id="sfRemoteUploadFrame"></iframe>-->
                   <iframe src="https://rrrhealthtechllc.sharefile.com/remoteupload/2ff1311b-097d-4662-9b98-4e251c6ac10a" frameborder="0" width="400px" height="500px" scrolling="auto" id="sfRemoteUploadFrame"></iframe>
                </div>
                <div class="contact100-more flex-col-c-m" style="background-image: url('img/uploadnewcase/doctor_left1.jpg');">
                    <h3>Upload Your Case Files</h3> 
                </div>
            </div>
            <!--Footer Social Icons Starts-->
            <section class="footer_socialicons footer_newsletter bg bg_8 bg_transparent color_white">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="footer_socialicons__inner clearfix">
                                <h2>Sign up to Newsletter</h2>
                                <form action="newssignup.php" name="form25" method="post" onsubmit="return validateSubscribe();">
                                    <div class="col-md-6 col-sm-6">
                                        <input type="email" name="email" id="txtEmail" placeholder="Enter your email" required/>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <input type="submit" value="Subscribe" class="news_subscribe"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Footer Social Icons Ends-->



            <div class="colourfull-row"></div>	



            <footer id="style-one" class="top_ftr top_ftr_white">

                <div class="container">



                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <h3>Quick Links</h3>

                        <ul class="useful_links">

                            <li><a href="index.html">Home</a></li>

                            <li><a href="about.html">About</a></li>

                            <li><a href="medical-charts.html">Medical Charts</a></li>

                            <li><a href="our-pricing.html">Our Pricing</a></li>

                            <li><a href="contact-us.html">Contact Us</a></li>

                        </ul>

                    </div> 

                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <h3>Services</h3>

                        <ul class="useful_links">

                            <li><a href="medical-chronology.html">Medical Chronology</a></li>

                            <li><a href="narrative-summary.html">Narrative Summary</a></li>

                            <li><a href="demand-letter.html">Demand Letter</a></li>

                            <li><a href="expert-medical-opinion.html">Expert Medical Opinion</a></li>

                            <li><a href="deposition-summary.html">Deposition Summary</a></li>

                        </ul>

                    </div> 

                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <h3>Add on Services</h3>

                        <ul class="useful_links">

                            <li><a href="medical-expenses-billing-summary.html">Medical Expenses & Billing</a></li>

                            <li><a href="med-interpret.html">Med-Interpret/ Med-A-Word</a></li>

                            <li><a href="bookmarks.html">Bookmarks <strong>*Free</strong></a></li>

                            <li><a href="hyperlinks.html">Hyperlinks <strong>*Free</strong></a></li>

                            <li><a href="identify-missing-records.html">Identify missing records <strong>*Free</strong></a></li>

                            <li><a href="pdf-merging-sorting.html">PDF Merging & Sorting</a></li>

                            <li><a href="provider-list.html">Provider List</a></li>

                            <li><a href="jury-questionnaires.html">Jury Questionnaires</a></li>

                        </ul>

                    </div> 

                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <h3>Contact Info</h3>

                        <div class="ftr_icntxt">

                            <div class="ftr_icn">

                                <i class="fa fa-map-marker"></i>

                            </div>

                            <div class="ftr_txt">

                                13165 W Lake Houston Pkwy #1019 Houston, Texas 77044

                            </div>

                        </div>

                        <div class="ftr_icntxt">

                            <div class="ftr_icn">

                                <i class="fa fa-phone"></i>

                            </div>

                            <div class="ftr_txt">

                                <a href="tel:+17702155493">+1 770 215 5493</a>

                            </div>

                        </div>

                        <div class="ftr_icntxt">

                            <div class="ftr_icn">

                                <i class="fa fa-fax"></i>

                            </div>

                            <div class="ftr_txt">

                                <a href="#">(832) 672-8168</a>

                            </div>

                        </div>

                        <div class="ftr_icntxt">

                            <div class="ftr_icn">

                                <i class="fa fa-envelope-o"></i>

                            </div>

                            <div class="ftr_txt">

                                <a href="mailto:support@medicalrecordsreform.com">support@medicalrecordsreform.com</a>

                            </div>

                        </div>

                        <div class="social-icons">
                            <a href="https://www.facebook.com/medicalrecordsreform" target="_blank" class="social-icon social-icon--facebook">

                                <i class="fa fa-facebook"></i>

                                <div class="tooltip">Facebook</div>

                            </a>

                            <a href="https://twitter.com/medical_reform" target="_blank" class="social-icon social-icon--twitter">

                                <i class="fa fa-twitter"></i>

                                <div class="tooltip">Twitter</div>

                            </a>

                            <a href="https://www.instagram.com/medicalrecordsreform" target="_blank" class="social-icon social-icon--instagram">

                                <i class="fa fa-instagram"></i>

                                <div class="tooltip">Instagram</div>

                            </a>

                            <a href="https://www.linkedin.com/company/80281786/" target="_blank" class="social-icon social-icon--linkedin">

                                <i class="fa fa-linkedin"></i>

                                <div class="tooltip">LinkedIn</div>

                            </a>
                        </div>

                    </div>



                </div>

            </footer>





            <section class="copyright-bar copyright_bar_white text-center dark">

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <p> <font size = '2.5px'>Medical Records Reform LLC </font> <font size = '2px'> | copyrights © reserved by </font> <br> <font size = '2.5px'>Medical Records Reform MRR Private Limited  <br> 2017 - 2022 </font><br> </p>

                        </div>

                    </div>

                </div>

            </section>



        </div> <!--Wrapper End-->



        <script src="js/jquery.min.js"></script>

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->

        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>

        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <script src="js/bootstrap.js"></script>

        <script src="js/main.js?version=1.2"></script>

        <!--Photo Gallery-->

        <script src="js/photo-gallery.js"></script>

        <!--Flex Slider-->

        <script src="js/jquery.flexslider.js"></script>

        <script src="js/jquery.fancybox.js"></script>

        <!-- ISOTOPE SCRIPTS -->

        <script src="js/jquery.isotope.js"></script>

        <script src="js/fancy-popup.js"></script>

        <script src="js/smoothscroll.js"></script>

        <script type="text/javascript" id="zsiqchat">var $zoho = $zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "e625ee226d6ed90ff453fb174472f5dd545c4612343ff2061d00168a3b6ab96451db01ae713697054c12ca172f2bed2b", values: {}, ready: function () {}};var d = document;s = d.createElement("script");s.type = "text/javascript";s.id = "zsiqscript";s.defer = true;s.src = "https://salesiq.zoho.in/widget";t = d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s, t);</script>

        <script src="user-panel/js/jquery.blockUI.js" type="text/javascript"></script>

        <script src="user-panel/js/jquery.inputmask.min.js" type="text/javascript"></script>

        <script src="js/dropbox-api/Dropbox-sdk.js" type="text/javascript"></script>
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
                                                dbx.filesUpload({path: '/Case-Files/' + file.name, contents: file}).then(function (response) {
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
                                                            var commit = {path: '/Case-Files/' + file.name, mode: 'add', autorename: true, mute: false};
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

                                    $('.upload-case-files-btn').click(function () {
                                        var Data = [];
                                        var Error = [];
                                        var formData = new FormData();

                                        Data.push($.trim($('.case_id').val()));

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

                                        formData.append('Id', 'upload-case-files');
                                        formData.append('Data', JSON.stringify(Data));

                                        if (Error.length === 0) {
                                            $.blockUI({message: '<h5><img src="user-panel/image/loader.gif" alt="Please wait..." width="15%" /> Please wait...</h5>'});
                                            $.ajax({
                                                type: 'POST',
                                                url: './trans.php',
                                                contentType: false,
                                                processData: false,
                                                data: formData,
                                                success: function (data) {
                                                    if (data === '1') {
                                                        alert('Case Files are Successfully Uploaded!');
                                                        window.location.href = "./just-submit-case.php";
                                                    } else {
                                                        alert('Problem to add case files *');
                                                    }
                                                },
                                                complete: function () {
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
    </body>
</html>