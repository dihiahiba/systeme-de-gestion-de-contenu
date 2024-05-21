<?php

require_once("article.php");

$c = new articles();
$c = $c->getPendingArticle();
$v= new articles(); 
$v= $v->getAll();


include "import/head.php"

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
                                <img src="../assets/images/LOGO2.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="../assets/images/Capture1.PNG" alt="" height="44">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm-light.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="44">
                            </span>
                        </a>
                    </div>

                    <!-- Menu Icon -->

                    <button type="button" class="btn px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>


                    <div class="d-none d-lg-inline-block align-self-center">
                        <a href="add_article.php">
                            <button class="btn btn-header waves-effect" type="button"><i class="mdi mdi-plus"></i>
                                Ajouter
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

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-primary" href=""><i
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
        <div class="vertical-menu">

            <div data-simplebar class="h-100">
                <div class="user-details">
                    <div class="d-flex">
                        <div class="me-2">
                            <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="user-info w-100">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Donald Johnson
                                    <i class="mdi mdi-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)" class="dropdown-item"><i
                                                class="mdi mdi-account-circle text-muted me-2"></i>
                                            Profile<div class="ripple-wrapper me-2"></div>
                                        </a></li>
                                    <li><a href="javascript:void(0)" class="dropdown-item"><i
                                                class="mdi mdi-cog text-muted me-2"></i>
                                            Settings</a>
                                    </li>

                                    <li><a href="javascript:void(0)" class="dropdown-item"><i
                                                class="mdi mdi-power text-muted me-2"></i>
                                            Logout</a></li>
                                </ul>
                            </div>

                            <p class="text-white-50 m-0">Administrator</p>
                        </div>
                    </div>
                </div>


                <!--- Sidemenu -->
                <?php include_once('../side-bar.php')?>
                <!-- Sidebar -->
            </div>
        </div>
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
                                    <h4 class="mb-0 font-size-18">Article</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Devnano</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Articles</a></li>
                                        <li class="breadcrumb-item active">Liste des Articles</li>
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
                                                    <strong>Success! </strong> L'article est publié dans le blog
                                                </div>
                                            ";
                                        } else if ($_GET['action'] == 'deny') {
                                            echo "
                                                <div class='alert alert-success' id='success-alert'>
                                                    <button type='button' class='close' data-dismiss='alert'>x</button>
                                                    <strong>Success! </strong> Votre commentaire a été envoyé avec succès 
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
                                    <th>Titre</th>
                                    <th>Image</th>
                                    <th>Utilisateur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="background-color:#fff; ">
                                <?php
                                            foreach($c as $a)  {
                                                $article_id = $a->id; 
                                                    echo "<tr>
                                                            <td>" . $a->id ."</td>
                                                            <td>" . $a->title . "</td>
                                                            <td> <img width='60px' height='60px' src ='".$a->image."'/></td>
                                                            
                                                            <td>" . $a->username . "</td>
                                                                
                                                            

                                                            <td>
                                                            <a  href=" . "preview_post.php/?id=" . $a->id . "  class='btn edit' style='color:black; ' title='Preview'><i class='fas fa-eye
                                                            '></i></a>

                                                            <a href=" . "valider_article.php/?id=" . $a->id . "  class='btn edit' style='color:green;'  title='Cliquez pour valider'><i class='fas fa-check'></i></a>
                                                            <a href='#' class='btn edit' data-toggle='modal' data-target='#staticBackdrop2' style='color:#007bff;'title='Ajouter des remarques' onclick='setArticleId(" . $a->id . ")'>
                                                            <i class='fas fa-comment-alt'></i> </a>
                                                        
                                                            <a href=" . "refuser_article.php/?id=" . $a->id . " class='btn edit refuse-badge'   style='color:red;' title='Refuser'>
                                                            <i class='fas fa-trash'></i> </a>
                                                            </td>
                                                            
                                                        </tr>";
                                            }
                                        ?>
                            </tbody>
                        </table>


                    </div>
                </div>


            </div>
        </div>
        <!-- Posts End -->
    </div>
    <!-- Main End -->
    </div>
    <!-- Main Section End -->
    <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Remarques</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="remarque_add.php" method="post">

                        <div class="form-group">
                            <label for="category-name1" class="col-form-label">
                                Remarque:
                            </label>
                            <textarea name="remarque" class="form-control" id="category-name1"></textarea>
                            <input type="hidden" id="articleIdInput" name="id_article" value="">
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-light" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Devnano <span class="d-none d-sm-inline-block"><i class="mdi mdi-heart text-danger"></i>
                        by
                        Naoual.</span>
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
    var articleId;

    function setArticleId(id) {
        articleId = id;
        var articleIdInput = document.getElementById("articleIdInput");
        articleIdInput.value = articleId;
        
    }
   </script>


</body>

</html>