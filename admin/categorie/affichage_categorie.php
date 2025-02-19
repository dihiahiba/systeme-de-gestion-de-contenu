<?php 
include_once ('import/head.php');
require_once("categorie.php");

$c = new categories();
$c = $c->getAll();?>

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


                    <div class="d-none d-lg-inline-block align-self-center">
                        <button class="btn btn-header waves-effect" type="button" id="createNewDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false" data-toggle="modal"
                            data-target="#staticBackdrop2"><i class="mdi mdi-plus"></i>
                            Ajouter
                        </button>

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
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title">
                                    <h4 class="mb-0 font-size-18">Categorie</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MyPress</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Categorie</a></li>
                                        <li class="breadcrumb-item active">Liste des catégories</li>
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

                    <!-- Start Page-content-Wrapper -->
                    <div class="col-md-12">
                        <!-- Posts -->

                        <?php
                        if (isset($_GET['action'])) {
                            if ($_GET['action'] == 'success') {
                                echo "
                                    <div class='alert alert-success' id='success-alert'>
                                        <button type='button' class='close' data-dismiss='alert'>x</button>
                                        <strong>Success! </strong> Changes have been saved.
                                    </div>
                                ";
                            } else if ($_GET['action'] == 'exists') {
                                echo "
                                    <div class='alert alert-danger' id='danger-alert'>
                                        <button type='button' class='close' data-dismiss='alert'>x</button>
                                        <strong>Error! </strong> Category already exists.
                                    </div>
                                ";
                            } else if ($_GET['action'] == 'empty') {
                                echo "
                                    <div class='alert alert-danger' id='danger-alert'>
                                        <button type='button' class='close' data-dismiss='alert'>x</button>
                                        <strong>Error! </strong> Category name cannot be empty.
                                    </div>
                                ";
                            }
                        }
                    ?>
                        <table class="table table-bordered table-hover inner-box">
                            <thead>
                                <tr style="background-color:#1b82ec; color:#fff;" class="text-center">
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                foreach($c as $a)  {
                                        echo "<tr>
                                                <td>" . $a->id ."</td>
                                                <td>" . $a->name . "</td>
                                                
                                                <td>
                                                <a href='#' class='btn edit update-categorie' data-toggle='modal'  style='color:#007bff;' title='Ajouter des remarques' data-id='" . $a->id . "' >
                                                <i class='fas fa-edit'></i> </a>                                                
                                                <a  href=" . "deletecateg.php/?id=" . $a->id . "  class='btn edit' style='color:#f16c69; '><i class='fa-solid fa-trash'></i></a>
                                            </tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Catégorie</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="add_categorie.php" method="post">

                                            <div class="form-group">
                                                <label for="category-name1" class="col-form-label">
                                                    Nom:
                                                </label>
                                                <input type="text" name="name" class="form-control" id="category-name1">
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-light" data-dismiss="modal">Cancel</a>
                                                <button type="submit" class="btn btn-primary"
                                                    name="ajout">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Catégorie</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="update_categorie.php" id="categorieForm" method="post">

                                            <div class="form-group">
                                                <label for="category-name1" class="col-form-label">
                                                    Nom:
                                                </label>
                                                <input type="text" name="name" class="form-control" value=""
                                                    id="remarquesContent">
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-light" data-dismiss="modal">Cancel</a>
                                                <button type="submit" class="btn btn-primary"
                                                    name="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Posts End -->
    </div>
    <!-- Main End -->
    </div>
    <!-- Main Section End -->








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

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script>
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('update-categorie')) {
                var articleId = e.target.getAttribute('data-id');

                $.ajax({
                    url: 'categorie_get.php',
                    type: 'POST',
                    data: {
                        articleId: articleId
                    },
                    success: function (response) {
                        // Mettez à jour le contenu des remarques dans la fenêtre modale
                        document.getElementById('remarquesContent').value = response;
                        // Afficher la fenêtre modale
                        var form = document.getElementById('categorieForm');
                        form.action = 'update_categorie.php?id=' + articleId;
                        $('#staticBackdrop3').modal('show');
                    },
                    error: function (xhr, status, error) {

                        console.error(error);
                    }
                });
            }
        });
    </script>

</body>

</html>