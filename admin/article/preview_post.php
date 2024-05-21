<?php

$db = mysqli_connect("localhost", "root", "", "pfs_cms");
    
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_GET["id"])) {
    $join = mysqli_query($db, "SELECT * FROM `articles` 
                                INNER JOIN `categories` 
                                ON `categories`.`id` = `articles`.`category` 
                                WHERE `articles`.`id` = '" . $_GET["id"] . "'");

    if ($join -> num_rows == 1) {
        $row = mysqli_fetch_array($join);
        $page = "article-" . $row['name'] . "-" . $row['title'];}
}
$q = mysqli_query($db, "SELECT `articles`.`id` AS `id`, `title`, `content`, `date`, `image`, `name`,username
                            FROM `articles` INNER JOIN `categories` 
                            ON `categories`.`id` = `articles`.`category` INNER JOIN users on users.id=articles.id_user
                            ORDER BY `date` ASC WHERE ");





$s = mysqli_query($db, "SELECT `articles`.`id` AS `id`, `title`, `content`, `date`, `image`, `name`,username
                            FROM `articles` INNER JOIN `categories` 
                            ON `categories`.`id` = `articles`.`category` INNER JOIN users on users.id=articles.id_user
                            ORDER BY `date` ASC LIMIT 3");




require_once ('article.php');

$cnt = new articles;


$cnt->setid($_GET['id']);

$cnt= $cnt->getOne();

$c = mysqli_query($db, "SELECT * FROM commentaire  where id = $cnt->id ");



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Devnano | Single Post</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Poppins:400,600,700%7CRoboto:400,400i,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/font-icons.css" />
  <link rel="stylesheet" href="../css/style.css" />


  <!-- Lazyload -->
  <script type="text/javascript" src="../js/lazysizes.min.js"></script>

</head>

<body class="single-post">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>
  
  <!-- Bg Overlay -->
  <div class="content-overlay"></div>

  

  <!-- Mobile Sidenav -->    
  <header class="sidenav" id="sidenav">
    <!-- Search -->
    <div class="sidenav__search-mobile">
      <form method="get" class="sidenav__search-mobile-form">
        <input type="search" class="sidenav__search-mobile-input" placeholder="Search..." aria-label="Search input">
        <button type="submit" class="sidenav__search-mobile-submit" aria-label="Submit search">
          <i class="ui-search"></i>
        </button>
      </form>
    </div>

    <nav>
      <ul class="sidenav__menu" role="menubar">
        <li>
          <a href="index.html" class="sidenav__menu-link">Home</a>
         
        </li>
      
        <li>
          <a href="#" class="sidenav__menu-link">About</a>
          
        </li>

        <li>
          <a href="#" class="sidenav__menu-link">Contact</a>
          
        </li>
        
        
      </ul>
    </nav>

    <div class="socials sidenav__socials "> 
      <a class="social-facebook" href="https://www.facebook.com/devosoftma" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social-linkedin" href="https://www.linkedin.com/company/devosoftma/?trk=public_profile_experience-item_profile-section-card_image-click&originalSubdomain=fr" target="_blank" aria-label="linkedin">
        <i class="ui-linkedin"></i>
      </a>
      <a class="social-instagram" href="https://www.instagram.com/devosoft_agency" target="_blank" aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end mobile sidenav -->


  <main class="main oh" id="main">

    <!-- Navigation -->
    <header class="nav">

      <div class="nav__holder nav--sticky">
        <div class="container relative">

          <div class="flex-parent">

            <!-- Mobile Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open mobile menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> <!-- end mobile menu button -->

            <!-- Logo -->
            <a href="index.html" class="logo">
            <img class="logo__img" src="img/logo_dev.png" style="height:20px; "  alt="logo">
            </a>

             <!-- Nav-wrap -->
             <nav class="flex-child nav__wrap d-none d-lg-block">              
            <ul class="nav__menu">

              <li class=" active">
                <a href="index.php">Home</a>
                
              </li>

              <li class="">
                <a href="about.html">About</a>
                
              </li>

              <li class="">
                <a href="contact.html">Contact</a>
                
              </li>
              

            </ul> <!-- end menu -->
          </nav> <!-- end nav-wrap -->

          <!-- Nav Right -->
          <div class="nav__right nav--align-right d-none d-lg-flex">

            <!-- Socials -->
            <div class="nav__right-item socials socials--nobase nav__socials "> 
              <a class="social-facebook" href="https://www.facebook.com/devosoftma" target="_blank">
                <i class="ui-facebook"></i>
              </a>
              <a class="social-linkedin" href="https://www.linkedin.com/company/devosoftma/?trk=public_profile_experience-item_profile-section-card_image-click&originalSubdomain=fr" target="_blank">
                <i class="ui-linkedin"></i>
              </a>
              <a class="social-youtube" href="#" target="_blank">
                <i class="ui-youtube"></i>
              </a>
            </div>

            <div class="nav__right-item">
              <a href="" class="nav__subscribe" data-toggle="modal" data-target="#subscribe-modal">Login</a>
            </div>

            <!-- Search -->
            <div class="nav__right-item nav__search">
              <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                <i class="ui-search nav__search-trigger-icon"></i>
              </a>
              <div class="nav__search-box" id="nav__search-box">
                <form class="nav__search-form">
                  <input type="text" placeholder="Search an article" class="nav__search-input">
                  <button type="submit" class="nav__search-button btn btn-md btn-color btn-button">
                    <i class="ui-search nav__search-icon"></i>
                  </button>
                </form>
              </div>
              
            </div>

          </div> <!-- end nav right -->  
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->

    <div class="main-container" id="main-container">

      <!-- Content -->
      <section class="section-wrap pt-60 pb-20">
        <div class="container">
          <div class="row">
            
            <!-- post content -->
            <div class="col-md-8 blog__content mb-30">

              <!-- standard post -->
              <article class="entry">
                
                <div class="single-post__entry-header  entry__header">
                  
                  <h1 class="single-post__entry-title">
                  <?=$row['title'];?></h1>
                  
                  <ul class="single-post__entry-meta entry__meta">
                    <li>
                      <div class="entry-author">
                        <a href="#" class="entry__author-url">
                          <span>by</span>
                          <span class="entry__author-name">Naoual</span>
                        </a>
                      </div>
                    </li>
                    <li class="entry__meta-date">
                      <?=date("Y-m-d", strtotime($row['date']));?>                   
                    </li>
                    <li>
                      <span>in</span>
                      <a href="categories.html" class="entry__meta-category"><?=$row['name'];?></a>
                    </li>
                  </ul>
                </div>

                <div class="entry__img-holder">
                  <figure>
                    <img src="../<?= $row['image']; ?>" alt="" class="entry__img">
                    <figcaption>A photo collection samples</figcaption>
                  </figure>
                </div>

                <div class="entry__article-holder">

                  <!-- Share -->
                  <div class="entry__share">
                    <div class="entry__share-inner">
                      <div class="socials">
                        <a href="#" class="social-facebook entry__share-social" aria-label="facebook"><i class="ui-facebook"></i></a>
                        <a href="#" class="social-twitter entry__share-social" aria-label="twitter"><i class="ui-twitter"></i></a>
                        <a href="#" class="social-google-plus entry__share-social" aria-label="google+"><i class="ui-google"></i></a>
                        <a href="#" class="social-instagram entry__share-social" aria-label="instagram"><i class="ui-instagram"></i></a>
                      </div>
                    </div>                    
                  </div> <!-- share -->

                  <div class="entry__article" style="  text-align: justify;">
                  <p><?=htmlspecialchars_decode($row['content']);?></p>
                   

                  </div> <!-- end entry article -->
                </div>

                

                <!-- Related Posts -->
                              

              </article> <!-- end standard post -->



              <!-- Comments -->
              <div class="entry-comments mt-30">
                <h5 class="entry-comments__title">Comments</h5>
                <?php
                   
                     while ($row = mysqli_fetch_array($c)) {
                     ?>
                <ul class="comment-list">
                 
                  
                  <li>
                    <div class="comment-body">
                    <div class="comment-avatar">
                        <img alt="" src="img/blog/comment_1.png">
                      </div>
                      <div class="comment-text">
                        <h6 class="comment-author"><?=$row['name'];?></h6>
                        <div class="comment-metadata">
                          <a href="#" class="comment-date"><?=date("Y-m-d", strtotime($row['date']));?></a>  
                        </div>                      
                        <p><?=$row['commentaire'];?></p>
                      
                      </div>
                    </div>
                  </li> <!-- end 3 comment -->

                </ul>    
                <?php } ?>     
              </div> <!-- end comments -->


              <!-- Comment Form -->
              <div id="respond" class="comment-respond">
                <h5 class="comment-respond__title">Post a comment</h5>
                <p class="comment-respond__subtitle">Your email address will not be published. Required fields are marked*</p>
                <form id="form" class="comment-form" method="post" action="add_comment.php">
                  <p class="comment-form-comment">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="commentaire" rows="5" required="required"></textarea>
                  </p>

                  <div class="row row-20">
                    <div class="col-lg-5">
                      <label for="name">Name*</label>
                      <input name="name" id="name" type="text">
                    </div>
                    <div class="col-lg-5">
                      <label for="email">Email*</label>
                      <input name="email" id="email" type="email">
                    </div>
                    <div class="col-lg-2">
                      <input name="id" id="id" type="hidden" value=<?php echo $cnt->id?>>
                    </div>
                  </div>

                  <p class="comment-form-submit">
                    <input type="submit" class="btn btn-lg btn-color btn-button"  name="ajout">
                  </p>
                  
                </form>
              </div> <!-- end comment form -->

            </div> <!-- end col -->
            
            <!-- Sidebar -->
            <aside class="col-md-4 sidebar sidebar--right">
              
              <!-- Widget Popular Posts -->
              <div class="widget widget-popular-posts">
            
          </div> <!-- end widget popular posts -->

             

              <!-- Widget socials -->
              <div class="widget widget-socials">
                <h4 class="widget-title">Keep up with Devnano</h4>
                <ul class="socials">
                  <li>
                    <a class="social-facebook" href="#" title="facebook" target="_blank">
                      <i class="ui-facebook"></i>
                      <span class="socials__text">Facebook</span>
                    </a>
                  </li>
                  <li>
                    <a class="social-twitter" href="#" title="twitter" target="_blank">
                      <i class="ui-twitter"></i>
                      <span class="socials__text">Twitter</span>
                    </a>
                  </li>
                  <li>
                    <a class="social-google-plus" href="#" title="google" target="_blank">
                      <i class="ui-google"></i>
                      <span class="socials__text">Google+</span>
                    </a>
                  </li>
                  <li>
                    <a class="social-instagram" href="#" title="instagram" target="_blank">
                      <i class="ui-instagram"></i>
                      <span class="socials__text">Instagram</span>
                    </a>
                  </li>
                </ul>
              </div> <!-- end widget socials -->

              

              

              

            </aside> <!-- end sidebar -->
      
          </div> <!-- end row -->
        </div> <!-- end container -->
      </section> <!-- end content -->

      <!-- Footer -->
      <footer class="footer">
      <div class="container">
        <div class="footer__widgets">
          <div class="row">

            <div class="col-lg-9 col-md-6" style="padding-left=350px;">
              <div class="widget">
                <img src="img/logo_dev.png" style="height:30px; "  class="logo__img" alt="">
                <p class="mt-20">Technology is best when it brings people together.</p>

                <div class="socials mt-20">
                  <a href="https://www.facebook.com/devosoftma" class="social-facebook" aria-label="facebook"><i class="ui-facebook"></i></a>
                  <a href="#" class="social-twitter" aria-label="twitter"><i class="ui-twitter"></i></a>
                  <a href="https://www.linkedin.com/company/devosoftma/?trk=public_profile_experience-item_profile-section-card_image-click&originalSubdomain=fr" class="social-linkedin" aria-label="linkedin"><i class="ui-linkedin"></i></a>
                  <a href="https://www.instagram.com/devosoft_agency" class="social-instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
                </div>
              </div>
            </div>

            
            

            <div class="col-lg-3 col-md-6">
              <div class="widget widget_nav_menu">
                <h4 class="widget-title white">Useful Links</h4>
                <ul>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Posts</a></li>
                 
                </ul>
              </div>
            </div> 

            

          </div>
        </div>    
      </div> <!-- end container -->

      <div class="footer__bottom">
        <div class="container text-center">
          <span class="copyright">
            &copy; <script>document.querySelector(".copyright").innerHTML += new Date().getFullYear();</script> Devnano  |  Made by <a href="https://deothemes.com">Naoual</a>
          </span>
        </div>
      </div> <!-- end bottom footer -->
    </footer> <!-- end footer -->

    </div> <!-- end main container -->

    <div id="back-to-top">
      <a href="#top"><i class="ui-arrow-up"></i></a>
    </div>

  </main> <!-- end main-wrapper -->

  
  <!-- jQuery Scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/easing.min.js"></script>
  <script src="../js/flickity.pkgd.min.js"></script>
  <script src="../js/twitterFetcher_min.js"></script>
  <script src="../js/modernizr.min.js"></script>
  <script src="../js/scripts.js"></script>



</body>
</html>