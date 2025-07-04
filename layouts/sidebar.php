<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box" style="padding: 0;">
        <!-- Dark Logo-->
        <a href="index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.jpg" alt="" height="70">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-lg.png" alt="" height="60">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.jpg" alt="" height="70">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-lg.png" alt="" height="60">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <!--li class="menu-title"><span><?=$lang['t-menu']?></span></li-->
                <!-- <li class="nav-item">
                    <a href="dashboard.php" class="nav-link"><i class="mdi mdi-billboard"></i><?=$lang['t-billboard']?></a>
                </li> -->
                <!--li class="nav-item">
                    <a href="index.php" class="nav-link"><i class="ri-dashboard-2-line"></i><?=$lang['t-weighing']?></a>
                </li-->       
                <li class="nav-item">
                    <a href="weighingDashboard.php" class="nav-link"><i class="mdi mdi-view-dashboard"></i><?=$lang['t-dashboard']?></a>
                </li>         
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-weight"></i> <span><?=$lang['t-weighing']?></span>
                    </a>
                    <div class="collapse show menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link"><?=$lang['t-pending']?></a>
                            </li>
                            <li class="nav-item">
                                <a href="complete.php" class="nav-link"><?=$lang['t-complete']?></a>
                            </li>
                            <li class="nav-item">
                                <a href="cancelled.php" class="nav-link"><?=$lang['t-cancelled']?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <?php
                    if($_SESSION["roles"] == 'ADMIN' || $_SESSION["roles"] == 'SADMIN' || $_SESSION["roles"] == 'MANAGER'){
                        echo '<li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMasterdata" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarMasterdata">
                                <i class="ri-pages-line"></i> <span>'.$lang['t-masterdata'].'</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarMasterdata">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="customer.php" class="nav-link">'.$lang['t-customer'].'</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="driver.php" class="nav-link">'.$lang['t-driver'].'</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="destination.php" class="nav-link">'.$lang['t-destination'].'</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="product.php" class="nav-link">'.$lang['t-product'].'</a>
                                    </li>
                                    <!--li class="nav-item">
                                        <a href="rawMaterial.php" class="nav-link">'.$lang['t-raw-mat'].'</a>
                                    </li-->
                                    <li class="nav-item">
                                        <a href="supplier.php" class="nav-link">'.$lang['t-supplier'].'</a>
                                    </li>    
                                    <li class="nav-item">
                                        <a href="vehicle.php" class="nav-link">'.$lang['t-vehicle'].'</a>
                                    </li>                        
                                    <li class="nav-item">
                                        <a href="transporter.php" class="nav-link">'.$lang['t-transporter'].'</a>
                                    </li>                 
                                    <li class="nav-item">
                                        <a href="user.php" class="nav-link">'.$lang['t-user'].'</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="plant.php" class="nav-link">'.$lang['t-plant'].'</a>
                                    </li>  
                                    <!--li class="nav-item">
                                        <a href="unit.php" class="nav-link">'.$lang['t-unit'].'</a>
                                    </li>                             
                                    <li class="nav-item">
                                        <a href="site.php" class="nav-link">'.$lang['t-site'].'</a>
                                    </li-->                   
                                </ul>
                            </div>
                        </li>';
                    }
                ?>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarReport" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarReport">
                        <i class="ri-account-circle-line"></i> <span><?=$lang['t-report']?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarReport">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a href="weighingReport.php" class="nav-link"><?=$lang['t-weighingReport']?></a>
                                </li>
                                <?php
                                    if($_SESSION["roles"] == 'ADMIN' || $_SESSION["roles"] == 'SADMIN'){
                                        echo '<li class="nav-item">
                                            <a href="auditLog.php" class="nav-link">'.$lang['t-auditLog'].'</a>
                                        </li> ';
                                    }
                                ?>                            
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span><?=$lang['t-setting']?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <?php
                                    if($_SESSION["roles"] == 'ADMIN' || $_SESSION["roles"] == 'SADMIN'){
                                        echo '<li class="nav-item">
                                            <a href="companyProfile.php" class="nav-link">'.$lang['t-companyProfile'].'</a>
                                        </li> ';
                                    }
                                ?>
                                
                                <li class="nav-item">
                                    <a href="portSetup.php" class="nav-link"><?=$lang['t-portSetup']?></a>
                                </li> 
                                <li class="nav-item">
                                    <a href="myProfile.php" class="nav-link"><?=$lang['t-myProfile']?></a>
                                </li> 
                                <li class="nav-item">
                                    <a href="ChangePassword.php" class="nav-link"><?=$lang['t-changePassword']?></a>
                                </li>                                 
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="php/logout.php" class="nav-link"><i class="mdi mdi-logout-variant"></i> <span><?=$lang['t-logout']?></span></a>
                </li>                 
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
