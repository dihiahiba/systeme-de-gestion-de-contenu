<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div class="user-details">
            <div class="d-flex">
                <div class="me-2">
                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info w-100">
                    <div class="dropdown">
                       <ul>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i
                                        class="mdi mdi-power text-muted me-2"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>

                    <p class="text-white-50 m-0">Administrator</p>
                </div>
            </div>
        </div>


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="../article/dash.php" class="waves-effect">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>

                    </a>
                </li>
                <?php


                // Inclure le fichier user.php
                include('users/user.php');

                if(isset($_SESSION['user_id'])) {
                    // Récupérer l'ID de l'utilisateur depuis la session
                    $user_id = $_SESSION['user_id'];

                    // Instancier la classe User
                    $user1q = new users();

                    // Définir l'ID de l'utilisateur pour récupérer ses informations
                    $user1q->setId($user_id);

                    // Récupérer les informations de l'utilisateur depuis la base de données
                    $userInfo = $user1q->getOne();

                    // Vérifier si l'utilisateur est un administrateur
                    if($userInfo->isAdmin == 'Yes') {
                        // Afficher la partie <li> seulement si l'utilisateur est un administrateur
                    
                            echo '
                            <li>
                                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="fa fa-edit"></i><span>Utilisateurs</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="../users/user_affichage.php">Utilisateurs Actives</a></li>
                                            <li><a href="../users/user_archive_affichage.php" >Utilisateurs Archivés</a>
                                                
                                            </li>
                                        </ul>
                                    </li>';
                    }
                }
                ?>

                <li>
                    <a href="../categorie/affichage_categorie.php" class="waves-effect">
                        <i class="fa fa-layer-group"></i>
                        <span>Catégories</span>
                    </a>

                </li>
                <?php
                if($userInfo->isAdmin == 'Yes') {
                    echo '
                    <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fa fa-edit"></i><span>Articles</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="../article/affichage_article.php">Articles publié</a></li>
                                    <li><a href="../article/pending_article.php" >Articles en attente</a>
                                        
                                    </li>
                                    <li><a href="../article/affichage_archive_article.php" >Articles archivés</a>
                                        
                                    </li>
                                </ul>
                            </li>';
                }else{
                    echo '
                    <li>
                        <a href="../article/user_affichage_article.php" class=" waves-effect">
                            <i class="fa fa-edit"></i>
                            <span>Articles</span>
                        </a>

                    </li>';
                }
                ?>
                <li>
                    <a href="../page_builder/index.html" class="waves-effect">
                        <i class="fa fa-p"></i>

                        <span>Page Builder</span>
                    </a>

                </li>

            </ul>



        </div>
        <!-- Sidebar -->
    </div>
</div>