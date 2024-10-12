<?php include_once ('import/head.php');
require_once('user.php');
if(isset($_POST['ajout']))
{
    $c = new users();
    // if($c->setadmin($_POST['isadmin'])=='yes'){
    //     $b=1;

    // }else{
    //     $b=0;
    // }
    
    
    $c->setAll($_POST['nom'],$_POST['prenom'],$_POST['username'],md5($_POST['password']),$_POST['isAdmin']);
    $c->add();

    $c = $c->search();
    
    header('Location: user_affichage.php');   
}
?>

<body data-topbar="colored">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm-dark.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="44">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm-light.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="24">
                            </span>
                        </a>
                    </div>

                    <!-- Menu Icon -->

                    <button type="button" class="btn px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>


                    
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- App Search -->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                    </form>



                    <!-- User -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-4.jpg"
                                alt="Header Avatar">
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item text-primary" href="../logout.php"><i
                                    class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                                <span>Logout</span></a>
                        </div>
                    </div>

                    <!-- Setting -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-cog bx-spin"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <?php include_once ('../side-bar-user.php');?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18">Ajouter un utilisateur</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MyPress</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"></a>Admin</li>
                                        <li class="breadcrumb-item active">Ajouter un utilisateur</li>
                                    </ol>
                                </div>

                                <div class="state-information d-none d-sm-block">
                                    <div class="state-graph">
                                        <div id="header-chart-1"></div>
                                    </div>
                                    <div class="state-graph">
                                        <div id="header-chart-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <br><br>
                    <!-- end page title -->

                    <!-- Start page content-wrapper -->
                    <div class="page-content-wrapper">
                        <div class="row ">

                            <!-- End Col -->


                            <div class="col-lg-6 ">
                                <div class="card " style=" left:50%;">
                                    <div class="card-body">
                                        <h4 class="card-title"> Ajouter un utilisateur</h4><br>

                                        <form class="needs-validation" action="" method="post" novalidate>
                                            <div class="row">
                                                <input type="hidden" class="form-control" id="validationTooltip01"
                                                            placeholder="Nom " required name="id">
                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationTooltip01">Nom </label>
                                                        <input type="text" class="form-control" id="validationTooltip01"
                                                            placeholder="Nom " required name="nom">

                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label"
                                                            for="validationTooltip02">Prénom</label>
                                                        <input type="text" class="form-control" id="validationTooltip02"
                                                            placeholder="Prénom" name="prenom" required>

                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label"
                                                            for="validationTooltipUsername">Username</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                    id="validationTooltipUsernamePrepend">@</span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="validationTooltipUsername" placeholder="Username"
                                                                aria-describedby="validationTooltipUsernamePrepend"
                                                                name="username" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationTooltip03">Mot de
                                                            passe</label>
                                                        <input type="password" class="form-control" id="validationTooltip03"
                                                            placeholder="Mot de passe" required name="password">

                                                    </div>
                                                </div>
                                                <!-- End Col -->
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                        
                                                            <div class="col-md-12">
                                                                <label class="form-label" for="validationTooltip04">Role</label>

                                                                <select class="form-select" aria-label="Default select example" name="isAdmin">
                                                                    <option selected>Admin(Yes/No)</option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </div>

                                                    </div>
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Row-->

                                            <button class="btn btn-primary text-center" type="submit" name="ajout">Submit form</button>
                                        </form>
                                        <!-- End Form -->
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->


                        <!-- End Row -->

                    </div>
                    <!-- end page-content-wrapper-->

                </div>
                <!-- Container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © MyPress <span class="d-none d-sm-inline-block">
                        </div>

                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <hr class="" />
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.png" class="img-fluid img-thumbnail" alt="">
                </div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-2.png" class="img-fluid img-thumbnail" alt="">
                </div>

                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="assets/images/layouts/layout-3.png" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-5">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="assets/css/app-rtl.min.css" />
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

            </div>

        </div>
        <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Peity JS -->
    <script src="assets/libs/peity/jquery.peity.min.js"></script>

    <script src="assets/libs/morris.js/morris.min.js"></script>

    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init JS -->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>
