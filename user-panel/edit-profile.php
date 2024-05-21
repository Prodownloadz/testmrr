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
<style type="text/css">
    td {
        position: relative;
    }
    .viewpopup {
        color: #ffffff;
        background: #0d6efd;
        position: absolute;
        top: 0px;
        right: 0px;
        font-size: 10px;
        text-decoration: none;
        padding: 3px 4px;
    }
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
    div.container {
        width: 80%;
    }
</style>
<body>
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
                            <li class="breadcrumb-item">Profile Management</li>
                        </ol>
                    </nav>
                </div>
                                                                                                                                    
                <div class="col-lg-12 page-padding card p-4 user_profile_info">
                    
                    <div class="add-record profile-edit mt-3 mb-4" style="border: 1px solid #ddd; padding: 20px;">
                        
                        <?php
                            $query= "SELECT * FROM `customers` WHERE `id` = '".$_SESSION['user_id']."'";
                            $retval = mysqli_query( $conn, $query );
                            while ($arr = mysqli_fetch_array($retval)) {
                        ?>    
                        
                        <div class="row">
                            <div class="col-lg-6 page-padding">
                                
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="form-icon-group">
                                        <span><i class="fas fa-user-tie"></i></span>
                                        <input type="text" class="name form-control" name="name" placeholder="Enter name" value="<?php echo $arr['name'];?>">
                                    </div>
                                    <span class="name_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter name *</span>
                                </div>
                            </div>
                            <div class="col-lg-6 page-padding">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <div class="form-icon-group">
                                        <span><i class="fas fa-building"></i></span>
                                        <input type="text" class="company_name form-control" name="company_name" placeholder="Enter Company Name" value="<?php echo $arr['company_name'];?>">
                                    </div>
                                     <span class="company_name_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter Company Name *</span>
                                </div>
                            </div>
                             <div class="col-lg-6 page-padding">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-envelope"></i></span>
                                        <input type="email" class="email form-control" name="email" placeholder="Enter Email" value="<?php echo $arr['email'];?>">
                                    </div>
                                    <span class="email_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter your email address *</span>
                                    <span class="email_valid_error" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Please enter your valid email address</span>
                               </div>
                            </div>
                            
                            <div class="col-lg-6 page-padding">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-map-marked"></i></span>
                                        <!--<select class="choose_state form-control">
                                            <option value="">Choose state</option>
                                            <option value="one" <?//php echo $Data['state'] === 'one' ? 'selected' : ''; ?>>one</option>
                                            <option value="Mass Tort" <?//php echo $Data['state'] === 'one' ? 'selected' : ''; ?>>one</option>
                                        </select>-->
                                        <select class="choose_state form-control" name="state">
                                            <option value="">Select State</option>
                                            <option value="Alabama" <?php echo $arr['state'] === 'Alabama' ? 'selected' : ''; ?>>Alabama</option>
                                            <option value="Alaska" <?php echo $arr['state'] === 'Alaska' ? 'selected' : ''; ?>>Alaska</option>
                                            <option value="Arizona" <?php echo $arr['state'] === 'Arizona' ? 'selected' : ''; ?>>Arizona</option>
                                            <option value="Arkansas" <?php echo $arr['state'] === 'Arkansas' ? 'selected' : ''; ?>>Arkansas</option>
                                            <option value="California" <?php echo $arr['state'] === 'California' ? 'selected' : ''; ?>>California</option>
                                            <option value="Colorado" <?php echo $arr['state'] === 'Colorado' ? 'selected' : ''; ?>>Colorado</option>
                                            <option value="Connecticut" <?php echo $arr['state'] === 'Connecticut' ? 'selected' : ''; ?>>Connecticut</option>
                                            <option value="Delaware" <?php echo $arr['state'] === 'Delaware' ? 'selected' : ''; ?>>Delaware</option>
                                            <option value="Florida" <?php echo $arr['state'] === 'Florida' ? 'selected' : ''; ?>>Florida</option>
                                            <option value="Georgia" <?php echo $arr['state'] === 'Georgia' ? 'selected' : ''; ?>>Georgia</option>
                                            <option value="Hawaii" <?php echo $arr['state'] === 'Hawaii' ? 'selected' : ''; ?>>Hawaii</option>
                                            <option value="Idaho" <?php echo $arr['state'] === 'Idaho' ? 'selected' : ''; ?>>Idaho</option>
                                            <option value="Illinois" <?php echo $arr['state'] === 'Illinois' ? 'selected' : ''; ?>>Illinois</option>
                                            <option value="Indiana" <?php echo $arr['state'] === 'Indiana' ? 'selected' : ''; ?>>Indiana</option>
                                            <option value="Iowa" <?php echo $arr['state'] === 'Iowa' ? 'selected' : ''; ?>>Iowa</option>
                                            <option value="Kansas" <?php echo $arr['state'] === 'Kansas' ? 'selected' : ''; ?>>Kansas</option>
                                            <option value="Kentucky" <?php echo $arr['state'] === 'Kentucky' ? 'selected' : ''; ?>>Kentucky</option>
                                            <option value="Louisiana" <?php echo $arr['state'] === 'Louisiana' ? 'selected' : ''; ?>>Louisiana</option>
                                            <option value="Maine" <?php echo $arr['state'] === 'Maine' ? 'selected' : ''; ?>>Maine</option>
                                            <option value="Maryland" <?php echo $arr['state'] === 'Maryland' ? 'selected' : ''; ?>>Maryland</option>
                                            <option value="Massachusetts" <?php echo $arr['state'] === 'Massachusetts' ? 'selected' : ''; ?>>Massachusetts</option>
                                            <option value="Michigan" <?php echo $arr['state'] === 'Michigan' ? 'selected' : ''; ?>>Michigan</option>
                                            <option value="Minnesota" <?php echo $arr['state'] === 'Minnesota' ? 'selected' : ''; ?>>Minnesota</option>
                                            <option value="Mississippi" <?php echo $arr['state'] === 'Mississippi' ? 'selected' : ''; ?>>Mississippi</option>
                                            <option value="Missouri" <?php echo $arr['state'] === 'Missouri' ? 'selected' : ''; ?>>Missouri</option>
                                            <option value="Montana" <?php echo $arr['state'] === 'Montana' ? 'selected' : ''; ?>>Montana</option>
                                            <option value="Nebraska" <?php echo $arr['state'] === 'Nebraska' ? 'selected' : ''; ?>>Nebraska</option>
                                            <option value="Nevada" <?php echo $arr['state'] === 'Nevada' ? 'selected' : ''; ?>>Nevada</option>
                                            <option value="New Hampshire" <?php echo $arr['state'] === 'New Hampshire' ? 'selected' : ''; ?>>New Hampshire</option>
                                            <option value="New Jersey" <?php echo $arr['state'] === 'New Jersey' ? 'selected' : ''; ?>>New Jersey</option>
                                            <option value="New Mexico" <?php echo $arr['state'] === 'New Mexico' ? 'selected' : ''; ?>>New Mexico</option>
                                            <option value="New York" <?php echo $arr['state'] === 'New York' ? 'selected' : ''; ?>>New York</option>
                                            <option value="North Carolina" <?php echo $arr['state'] === 'North Carolina' ? 'selected' : ''; ?>>North Carolina</option>
                                            <option value="North Dakota" <?php echo $arr['state'] === 'North Dakota' ? 'selected' : ''; ?>>North Dakota</option>
                                            <option value="Ohio" <?php echo $arr['state'] === 'Ohio' ? 'selected' : ''; ?>>Ohio</option>
                                            <option value="Oklahoma" <?php echo $arr['state'] === 'Oklahoma' ? 'selected' : ''; ?>>Oklahoma</option>
                                            <option value="Oregon" <?php echo $arr['state'] === 'Oregon' ? 'selected' : ''; ?>>Oregon</option>
                                            <option value="Pennsylvania" <?php echo $arr['state'] === 'Pennsylvania' ? 'selected' : ''; ?>>Pennsylvania</option>
                                            <option value="Rhode Island" <?php echo $arr['state'] === 'Rhode Island' ? 'selected' : ''; ?>>Rhode Island</option>
                                            <option value="South Carolina" <?php echo $arr['state'] === 'South Carolina' ? 'selected' : ''; ?>>South Carolina</option>
                                            <option value="South Dakota" <?php echo $arr['state'] === 'South Dakota' ? 'selected' : ''; ?>>South Dakota</option>
                                            <option value="Tennessee" <?php echo $arr['state'] === 'Tennessee' ? 'selected' : ''; ?>>Tennessee</option>
                                            <option value="Texas" <?php echo $arr['state'] === 'Texas' ? 'selected' : ''; ?>>Texas</option>
                                            <option value="Utah" <?php echo $arr['state'] === 'Utah' ? 'selected' : ''; ?>>Utah</option>
                                            <option value="Vermont" <?php echo $arr['state'] === 'Vermont' ? 'selected' : ''; ?>>Vermont</option>
                                            <option value="Virginia" <?php echo $arr['state'] === 'Virginia' ? 'selected' : ''; ?>>Virginia</option>
                                            <option value="Washington" <?php echo $arr['state'] === 'Washington' ? 'selected' : ''; ?>>Washington</option>
                                            <option value="West Virginia" <?php echo $arr['state'] === 'West Virginia' ? 'selected' : ''; ?>>West Virginia</option>
                                            <option value="Wisconsin" <?php echo $arr['state'] === 'Wisconsin' ? 'selected' : ''; ?>>Wisconsin</option>
                                            <option value="Wyoming" <?php echo $arr['state'] === 'Wyoming' ? 'selected' : ''; ?>>Wyoming</option>
                                        </select>
                                        <i class="fal fa-angle-down"></i>
                                    </div>
                                     <span class="choose_state_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please select state *</span>
                                </div>
                            </div>
                            <div class="col-lg-6 page-padding">
                                <div class="form-group">
                                    <label>Username <!--<span class="error">*</span>--></label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-user-edit"></i></span>
                                        <input type="text" class="username form-control" name="username" placeholder="Enter Username" value="<?php echo $arr['username'];?>">
                                    </div>
                                    <span class="username_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter username *</span>
                                    <span class="username_invalid_error" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Username should be more than 6 digit *</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 page-padding">
                                <div class="btn-group" style="float: right;">
                                    <button class="profile-edit-btn btn btn-primary" name="saveprofile" type="button" value="<?php echo $arr['id'];?>"><i class="fal fa-save"></i> Save</button>
                                    <a href="user-profile.php" class="btn btn-danger"><i class="fal fa-times"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            }
                        ?>
                        
                        
                    </div>
                    
                    
                    
                </div>
                
                
            </div>
        </div>
    </div>
    <script src="js/jquery.blockUI.js" type="text/javascript"></script>
    <script src="js/edit-profile.js?ver=1.5" type="text/javascript"></script>
    <?php include("include/bottomscript.php"); ?>