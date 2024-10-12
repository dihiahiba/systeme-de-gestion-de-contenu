<?php include_once ('import/head.php');

require_once("comment.php");

$c = new comments();
$c = $c->getAll();?>
<?php
        
        $db = mysqli_connect("localhost", "root", "", "pfs_cms");
    
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $user_count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM `users`"));
        $category_count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM `categories`"));
        $post_count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM `articles`"));
        $comment_count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM `commentaire`"));

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


                    <div class="dropdown d-none d-lg-inline-block align-self-center">
                       <a href="index.php">
                        <button class="btn btn-header waves-effect  " type="button"
                            >
                           Blog
                        </button>
                        </a>
                    </div>
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
        <?php include_once ('../side-bar.php');?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" style="background-color:#eff2f7;">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to MyPress</li>
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
                    </div>
                    <!-- end page title -->

                    <!-- Start page content-wrapper -->
                    <div class="page-content-wrapper" style="background-color:#eff2f7;">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary mini-stat position-relative">
                                    <div class="card-body">
                                        <div class="mini-stat-desc">
                                            <h5 class="text-uppercase verti-label font-size-16 text-white-50">Users
                                            </h5>
                                            <div class="text-white">
                                                <h5 class="text-uppercase font-size-16 text-white-50"><i
                                                        class="fa-solid fa-users"></i> Utilisateurs</h5>
                                                <h3 class="mb-3 text-white"> <?=$user_count[0];?></h3>
                                                <div class="">
                                                    <span class="badge ">
                                                        <div class="">
                                                            <span class="badge  "></span></div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary mini-stat position-relative">
                                    <div class="card-body">
                                        <div class="mini-stat-desc">
                                            <h5 class="text-uppercase verti-label font-size-16 text-white-50">Category
                                            </h5>
                                            <div class="text-white">
                                                <h5 class="text-uppercase font-size-16 text-white-50"><i
                                                        class="fa-solid fa-layer-group"></i> Catégorie</h5>
                                                <h3 class="mb-3 text-white"><?=$category_count[0];?></h3>
                                                <div class="">
                                                    <span class="badge ">
                                                        <div class="">
                                                            <span class="badge  "></span>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary mini-stat position-relative">
                                    <div class="card-body">
                                        <div class="mini-stat-desc">
                                            <h5 class="text-uppercase verti-label font-size-16 text-white-50"> Article
                                            </h5>
                                            <div class="text-white">
                                                <h5 class="text-uppercase font-size-16 text-white-50"><i
                                                        class="fa-solid fa-newspaper"></i> Article
                                                </h5>
                                                <h3 class="mb-3 text-white"><?=$post_count[0];?></h3>
                                                <div class="">
                                                    <span class="badge ">
                                                        <div class="">
                                                            <span class="badge  "></span>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary mini-stat position-relative">
                                    <div class="card-body">
                                        <div class="mini-stat-desc">
                                            <h5 class="text-uppercase verti-label font-size-16 text-white-50">Comments
                                            </h5>
                                            <div class="text-white " style="margin">
                                                <h5 class="text-uppercase font-size-16 text-white-50"><i
                                                        class="fa-solid fa-comments"></i> Commentaire
                                                </h5>
                                                <h3 class="mb-3  text-white"><?=$comment_count[0];?></h3>
                                                <div class="">
                                                    <span class="badge ">
                                                        <div class="">
                                                            <span class="badge  "></span>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->


                        <!-- end row -->

                        <div class="row" style="background-color:#eff2f7;">




                        </div>
                        <!-- end row -->

                        <div class="row" style="background-color:#eff2f7;">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Liste des commentaires</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">(#) Id</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Commentaire</th>
                                                        <th scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($c as $a)  {

                                                        echo"   
                                                        <tr>
                                                            <th scope='row'>" . $a->id_comment ."</th>
                                                            <td>
                                                                <div>
                                                                <i class='fas fa-user avatar-md rounded-circle '></i>
                                                                     " . $a->name ."
                                                                </div>
                                                            </td>
                                                            <td>" . $a->date ." </td>
                                                            <td>" . $a->commentaire ."</td>
                                                            <td><a href='delete_comment.php/?id=" . $a->id_comment . "' class='btn edit' style='color:#f16c69;'><i class='fa-solid fa-trash'></i></a>
                                                            </td>

                                                            </tr> ";
                                                        }
                                                        
                                                    ?>




                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Cardbody -->
                                </div>
                                <!-- End card -->
                            </div>
                            <!-- End Col -->


                        </div>

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