<style type="text/css">
    .brand-logo {
        background-color: #4169e1;
    }
    .logo-text {
        color: #fdfeff;
        font-size: 18px;
        display: inline-block;
        position: relative;
        top: 3px;
        letter-spacing: 2px;
        font-weight: 800;
        text-align: center;
        line-height: 50px;
    }
    .bg-white {
        background-color: #4169e1!important;
    }
</style>
<header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav align-items-center right-nav-link">
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile" style="color:white;">Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item"><a href="<?php echo BEGIN_PATH; ?>/login/logout"><i class="icon-power mr-2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>