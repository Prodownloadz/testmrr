<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true" style="background: #042d5f !important;">
    <style type="text/css">
        .sidebar-menu>li.active>a, .sidebar-menu>li:hover>a{
            border-left-color: #06B7C2 !important ;
            background: #06B7C2 !important ;
        }
        .brand-logo, .navbar{
            background: #06b7c2 !important;
        }
    </style>
    <div class="brand-logo">
        <a href="<?php echo BEGIN_PATH; ?>/dashboard">
            <h5 class="logo-text">MRR Admin</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li>
            <a href="<?php echo BEGIN_PATH; ?>/dashboard" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
            </a>
        </li> 
        <li>
            <a href="<?php echo BEGIN_PATH; ?>/customers" class="waves-effect">
                <i class="zmdi zmdi-accounts-alt"></i> <span>Customers</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BEGIN_PATH; ?>/cases" class="waves-effect">
                <i class="zmdi zmdi-accounts-alt"></i> <span>Cases</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BEGIN_PATH; ?>/cases/just_submitted_cases" class="waves-effect">
                <i class="zmdi zmdi-accounts-alt"></i> <span>Just Submitted Cases</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BEGIN_PATH; ?>/changepassword" class="waves-effect">
                <i class="zmdi zmdi-lock"></i> <span>Change Password</span>
            </a>
        </li>
    </ul>
</div>