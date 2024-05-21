<?php
$db = mysqli_connect("localhost", "root", "", "pfs_cms");
    
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$page = "home";

$query = mysqli_query($db, "SELECT `articles`.`id` AS `id`, `title`, `content`, `date`, `image`, `name`, `username`
                            FROM `articles` 
                            INNER JOIN `categories` ON `categories`.`id` = `articles`.`category` 
                            INNER JOIN `users` ON `users`.`id` = `articles`.`id_user`
                            WHERE `articles`.`isValidate` = 1 AND archive=0
                            ORDER BY `date` DESC");



$s = mysqli_query($db, "SELECT `articles`.`id` AS `id`, `title`, `content`, `date`, `image`, `name`, `username`
                            FROM `articles` 
                            INNER JOIN `categories` ON `categories`.`id` = `articles`.`category` 
                            INNER JOIN `users` ON `users`.`id` = `articles`.`id_user`
                            WHERE `articles`.`isValidate` = 1 AND archive=0
                            ORDER BY `date` ASC");





$categorie = mysqli_query($db, "SELECT * FROM `categories` ");

?>








<!DOCTYPE html>
<html lang="en">

<head>
  <title>Devnano | Home</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Poppins:400,600,700%7CRoboto:400,400i,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/style.css" />




  <!-- Lazyload -->
  <script src="js/lazysizes.min.js"></script>

</head>

<body class="bg-darker">

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


      </ul>
    </nav>

    <div class="socials sidenav__socials ">
      <a class="social-facebook" href="https://www.facebook.com/devosoftma" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social-linkedin"
        href="https://www.linkedin.com/company/devosoftma/?trk=public_profile_experience-item_profile-section-card_image-click&originalSubdomain=fr"
        target="_blank" aria-label="linkedin">
        <i class="ui-linkedin"></i>
      </a>
      <a class="social-instagram" href="https://www.instagram.com/devosoft_agency" target="_blank"
        aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end mobile sidenav -->

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
            <img class="logo__img" src="img/logo_dev.png" style="height:20px; " alt="logo">
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
              <a class="social-linkedin"
                href="https://www.linkedin.com/company/devosoftma/?trk=public_profile_experience-item_profile-section-card_image-click&originalSubdomain=fr"
                target="_blank">
                <i class="ui-linkedin"></i>
              </a>
              <a class="social-youtube" href="#" target="_blank">
                <i class="ui-youtube"></i>
              </a>
            </div>

            <div class="nav__right-item">
              <a href="../../login.php" class="nav__subscribe">Login</a>
            </div>

            <!-- Search -->
            <div class="nav__right-item nav__search">
              <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                <i class="ui-search nav__search-trigger-icon"></i>
              </a>
              <div class="nav__search-box" id="nav__search-box">
                <form class="nav__search-form" method="POST">
                  <input type="text" placeholder="Search an article" class="nav__search-input" name="motcle">
                  <button type="submit" class="nav__search-button btn btn-md btn-color btn-button" name="btsubmit">
                    <i class="ui-search nav__search-icon"></i>
                  </button>
                </form>
              </div>

            </div>
            <!-- end nav right -->

          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
  </header> <!-- end navigation -->

  <main class="main-container" id="main-container">

    <!-- Hero Slider -->
    <section class="hero">
      <div id="flickity-hero" class="carousel-main">

        <div class="carousel-cell hero__slide">
          <article class="hero__slide-entry entry">
            <div class="hero__slide-thumb-bg-holder"
              style="background-image: url(img/blog/hero_slider/featured_img_1.jpg)">
              <div class="bottom-gradient"></div>
            </div>

            <div class="hero__slide-thumb-text-holder">
              <div class="container">
                <a href="categories.html" class="entry__meta-category entry__meta-category--label">Devnano</a>
                <h2 class="entry__title entry__title--white"
                  style="font-size: 36px; margin-top: 10px; max-width: 700px;">
                  <a>Uncovering and explaining how our digital world is changing — and changing us.</a>

                </h2>
              </div>
            </div>
          </article>
        </div>






      </div> <!-- end flickity -->


    </section> <!-- end hero slider -->

    <!-- Content -->
    <div class="content container">
      <div class="row">

        <!-- Blog Content -->
        <div class="col-md-8 blog__content mb-30">





          <!-- Don't Miss -->
          <section class="section-dont-miss">
            <div class="section-title-wrap">
              <h3 class="section-title">Don't Miss</h3>
            </div>

            <article class="entry post-list">
              <?php
                   while ($row = mysqli_fetch_array($query)) {
               ?>
              <div class="entry__img-holder post-list__img-holder">
                <a href="single_post.php?id=<?=$row['id']?>" class="entry__img post-list__img">

                  <div class="thumb-container">
                    <img src="<?=$row['image'];?>" class="entry__img lazyload" alt="" />
                  </div>
                </a>
              </div>

              <div class="entry__body post-list__body">
                <div class="entry__header">
                  <a href="categories.html" class="entry__meta-category"><?=$row['name'];?></a>
                  <h2 class="entry__title">
                    <a href="single_post.php?id=<?=$row['id']?>"><?=$row['title'];?></a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-date">
                      <?=date("Y-m-d", strtotime($row['date']));?>
                    </li>
                    <li class="entry__meta-author">
                      by <a href="#"><?=$row['username'];?></a>
                    </li>
                  </ul>
                </div>
                <div class="entry__excerpt" style="
                  display: -webkit-box;
                  text-overflow: ellipsis;
                  overflow: hidden;
                  -webkit-line-clamp: 2;
                  -webkit-box-orient: vertical;
                  margin-bottom: 20px;
                  text-align: justify;">
                  <p><?=htmlspecialchars_decode($row['content']);?></p>
                </div>
              </div> <br>

              <?php
                }
             ?>
            </article>


          </section> <!-- end don't miss -->

        </div> <!-- end blog content -->

        <!-- Sidebar -->
        <aside class="col-md-4 sidebar sidebar--right">
                <br><br>

           <!-- Widget socials -->
           <div class="widget widget-socials">
            <h4 class="widget-title">Keep up with Devnano</h4>
            <ul class="socials">
              <?php
                   
                   while ($row = mysqli_fetch_array($categorie)) {
                        ?>
              <li>
                <a class="social-facebook" href="article_par_categorie.php?id=<?=$row['id'];?>" target="_blank">

                  <span class="socials__text"><?=$row['name'];?></span>
                </a>
              </li>


              <?php
                   }
                   ?>
            </ul>
          </div> <!-- end widget socials -->
          <!-- Widget Popular Posts -->
          <div class="widget widget-popular-posts">
            <h4 class="widget-title">Popular Posts</h4>
            <ul class="widget-popular-posts__list"><?php
                   
              while ($row = mysqli_fetch_array($s)) {
                   ?>
              <li>
                <article class="clearfix">
                  <div class="widget-popular-posts__img-holder">
                    <span class="widget-popular-posts__number"><?=$row['id'];?></span>
                    <div class="thumb-container">
                      <a href="single-post.html">
                        <img src="<?=$row['image'];?>" alt="" class="lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="widget-popular-posts__entry">
                    <h3 class="widget-popular-posts__entry-title">
                      <a href="single_post.php?id=<?=$row['id']?>"><?=$row['title'];?></a>
                    </h3>
                  </div>

                </article>
              </li>
              <?php
                   }
                   ?>
            </ul>
          </div> <!-- end widget popular posts -->

          <!-- Widget Newsletter -->
          <!-- <div class="widget widget_mc4wp_form_widget">
            <h4 class="widget-title">Subscribe for Devnano news and receive daily updates</h4>
            <form id="mc4wp-form-1" class="mc4wp-form" method="post">
              <div class="mc4wp-form-fields">
                <p>
                  <i class="mc4wp-form-icon ui-email"></i>
                  <input type="email" name="EMAIL" placeholder="Your email" required="">
                </p>
                <p>
                  <input type="submit" class="btn btn-md btn-color" value="Subscribe">
                </p>
              </div>
            </form>
          </div>  -->
          <!-- end widget newsletter -->

         






        </aside> <!-- end sidebar -->

      </div> <!-- end row -->







    </div> <!-- end content -->

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer__widgets">
          <div class="row">

            <div class="col-lg-9 col-md-6" style="padding-left=350px;">
              <div class="widget">
                <img src="img/logo_dev.png" style="height:30px; " class="logo__img" alt="">
                <p class="mt-20">Technology is best when it brings people together.</p>

                <div class="socials mt-20">
                  <a href="https://www.facebook.com/devosoftma" class="social-facebook" aria-label="facebook"><i
                      class="ui-facebook"></i></a>
                  <a href="#" class="social-twitter" aria-label="twitter"><i class="ui-twitter"></i></a>
                  <a href="https://www.linkedin.com/company/devosoftma/?trk=public_profile_experience-item_profile-section-card_image-click&originalSubdomain=fr"
                    class="social-linkedin" aria-label="linkedin"><i class="ui-linkedin"></i></a>
                  <a href="https://www.instagram.com/devosoft_agency" class="social-instagram" aria-label="instagram"><i
                      class="ui-instagram"></i></a>
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
            &copy; <script>
              document.querySelector(".copyright").innerHTML += new Date().getFullYear();
            </script> Devnano | Made by <a href="https://deothemes.com">Naoual</a>
          </span>
        </div>
      </div> <!-- end bottom footer -->
    </footer> <!-- end footer -->

  </main> <!-- end main container -->

  <div id="back-to-top">
    <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
  </div>

  <!-- jQuery Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/flickity.pkgd.min.js"></script>
  <script src="js/twitterFetcher_min.js"></script>
  <script src="js/modernizr.min.js"></script>
  <script src="js/scripts.js"></script>

</body>

</html>