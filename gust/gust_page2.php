<?php
$sql55="SELECT * FROM `school_start` WHERE 1;";
$result55= mysqli_query($conn,$sql55);
$found= mysqli_num_rows($result55);
if($found){

$sql535="SELECT * FROM `school_dore` WHERE 1;";
$result535= mysqli_query($conn,$sql535);
$found= mysqli_num_rows($result535);
if($found){
?>

<!DOCTYPE html>
<html>
<?php 
      $row=mysqli_fetch_assoc($result55); ?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	

    <title><?= $row['school_name1'].$row['school_name2'] ?></title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--
    
TemplateMo 557 Grad School

https://templatemo.com/tm-557-grad-school

-->
  </head>

<body style="text-align: right; font-family:vazir">

   
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em><?= $row['school_name1'] ?></em> <?= $row['school_name2'] ?></a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
		<li><a type="button" class="text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
       ورود
	 </a></li>
		<li><a href="#section6">ارتباط با ما</a></li>
		<li><a href="#section4">مقالات</a></li>
		<li class="has-submenu"><a href="#section2">درباره ما</a>
          <ul class="sub-menu">
            <li><a href="#section2">ما کی هستیم؟</a></li>
            <li><a href="#section3">فعالیت های مدرسه</a></li>
            <li><a href="#section3">نحوه کار مدرسه</a></li>
            <li><a href="https://templatemo.com/about" rel="sponsored" class="external">ifaGroup</a></li>
          </ul>
        </li>
        <li><a href="#section1">خانه</a></li>
        
        
        
      </ul>
    </nav>
  </header>

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/course-video.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="caption">
              <h6><?= $row['school_big_name'] ?></h6>
              <h2><em><?= $row['school_name1'] ?></em> <?= $row['school_name2'] ?></h2>
              <div class="main-button">
                  <div class="scroll-to-section"><a href="#section2">اطلاعات بیشتر</a></div>
              </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->


  <section class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-pencil"></i>مزایای مدرسه</h4>
              </div>
              <div class="content-hide">
                <p><?= $row['tozih_mazaya'] ?></p>
				<p class="hidden-sm"><?= $row['tozih_mazaya'] ?></p>
                <div class="scroll-to-section"><a href="#section2">اطلاعات بیشتر</a></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-graduation-cap"></i>کلاس های مجازی</h4>
              </div>
              <div class="content-hide">
                <p><?= $row['tozih_online_class'] ?></p>
                <p class="hidden-sm"><?= $row['tozih_online_class'] ?></p>
                <div class="scroll-to-section"><a href="#section3">ثبت نام</a></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-book"></i>دوره ها</h4>
              </div>
              <div class="content-hide">
                <p><?= $row['tozih_dore'] ?></p>
                <p class="hidden-sm"><?= $row['tozih_dore'] ?></p>
                <div class="scroll-to-section"><a href="#section4">ثبت نام</a></div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section why-us" data-section="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>چرا باید مدرسه ما را انتخاب کنید؟</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div id='tabs'>
            <ul>
              <li><a href='#tabs-1'><?= $row['mazaya_madrese1'] ?></a></li>
              <li><a href='#tabs-2'><?= $row['mazaya_madrese2'] ?></a></li>
              <li><a href='#tabs-3'><?= $row['mazaya_madrese3'] ?></a></li>
            </ul>
            <section class='tabs-content'>
              <article id='tabs-1'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="<?= $row['mazaya_madrese_aks1'] ?>" alt="">
                  </div>
                  <div style="text-align: right" class="col-md-6">
                    <h4><?= $row['mazaya_madrese1'] ?></h4>
                    
					 <?= $row['mazaya_madrese_tozih1']; ?>
					 
					  
                  </div>
                </div>
              </article>
              <article id='tabs-2'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="<?= $row['mazaya_madrese_aks2'] ?>" alt="">
                  </div>
                  <div style="text-align: right" class="col-md-6">
                    <h4><?= $row['mazaya_madrese2'] ?></h4>
					  
                        <?= $row['mazaya_madrese_tozih2'] ?>
					  
                  </div>
                </div>
              </article>
              <article id='tabs-3'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="<?= $row['mazaya_madrese_aks3'] ?>" alt="">
                  </div>
                  <div style="text-align: right" class="col-md-6">
                    <h4><?= $row['mazaya_madrese3'] ?></h4>
                   
					  <?= $row['mazaya_madrese_tozih2'] ?>
					  
                  </div>
                </div>
              </article>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <div>
              <h4>از این طریق می توانید در دوره <em>فیزیک نهایی </em>دکر صدیقی شرکت کنید</h4>
              <div dir="rtl" class="counter">

                <div class="days">
                  <div>00</div>
                  <span>سال</span>
                </div>

                <div class="hours">
                  <div>00</div>
                  <span>ماه</span>
                </div>

                <div class="minutes">
                  <div>00</div>
                  <span>روز</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
              <h6 dir="rtl">پس از کامل کردن و ارسال اطلاعات خود، منتظر تماس ما باشید.</h6>
            </div>
            <form id="contact" action="" method="get">
              <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    <input style="text-align: right" name="name" type="text" class="form-control" id="name" placeholder="نام" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input style="text-align: right" name="family" type="text" class="form-control" id="family" placeholder="نام خانوادگی" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input style="text-align: right" name="phone-number" type="text" class="form-control" id="phone-number" placeholder="شماره موبایل" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button">ثبت نام</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section courses" data-section="section4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>در دوره مد نطر خود شرکت کنید</h2>
          </div>
        </div>
        <div class="owl-carousel owl-theme">

<?php 
      while($row=mysqli_fetch_assoc($result535)){ ?>
          <div class="item">
            <img src="<?= $row['dore_image'] ?>" alt="Course #2">
            <div class="down-content">
              <h4><?= $row['dore_name'] ?></h4>
              <p><?= $row['dore_lid'] ?></p>
              <div align="left" class="author-image">
                <img src="<?= $row['teacher_image'] ?>" alt="Author 2">
              </div>
              <div class="text-button-free">
                <a class="btn btn-outline-dark" href="?dore_name=<?= $row['dore_name'] ?>&register_dore=ok" target="_blank">شرکت <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
		<?php }};?>
        </div>
      </div>
    </div>
  </section>
  

  <section class="section video" data-section="section5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <div class="left-content">
            <span>اعتبار ما رضایت شماست.</span>
            <h4>برای کسب اطلاعات بیشتر <em>ویدیو را اتماشا کنید</em></h4>
            <p>این مدرسه بسیار عالی استاین مدرسه بسیار عالی است  این مدرسه بسیار عالی است  این مدرسه بسیار عالی است  این مدرسه بسیار عالی است  این مدرسه بسیار عالی است  این مدرسه بسیار عالی است  این مدرسه بسیار عالی است    <a rel="nofollow" href="https://templatemo.com/contact" target="_parent">این مدرسه بسیار عالی است  </a>این مدرسه بسیار عالی است  این مدرسه بسیار عالی است  این مدرسه بسیار عالی است  </p>
            <div class="main-button"></div>
          </div>
        </div>
        <div class="col-md-6">
          <article class="video-item">
            <div class="video-caption">
              <h4 style="text-align: center">دبیرستان شهید بهشتی</h4>
            </div>
            <figure>
              <a href="https://hw20.asset.aparat.com/aparat-video/687df87306b79e2da08bc0d5092389bb33287847-480p.mp4?wmsAuthSign=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0b2tlbiI6ImEyNGQ5OWM2NmRiODE4NGUzZDE1MzQ5OGNkNGM4MjFmIiwiZXhwIjoxNzA4NTk3NDU5LCJpc3MiOiJTYWJhIElkZWEgR1NJRyJ9.9mVmxOHmBgJ6PTt1bhmkzB3Syi7e7vNKRnYTCX_iY4Q" class="play"><img src="assets/images/main-thumb.png"></a>
            </figure>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="section contact" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>ارتباط با ما</h2>
          </div>
        </div>
        <div class="col-md-6">
        
        <!-- Do you need a working HTML contact-form script?
                	
                    Please visit https://templatemo.com/contact page -->
                    
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-md-6">
                  <fieldset>
                    <input style="text-align: right" name="name" type="text" class="form-control" id="name" placeholder="نام شما" required="">
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                    <input style="text-align: right" name="email" type="text" class="form-control" id="email" placeholder="ایمیل شما" required="">
                  </fieldset>
                </div>
              <div class="col-md-12">
                <fieldset>
                  <textarea style="text-align: right" name="message" rows="6" class="form-control" id="message" placeholder="پیام شما..." required=""></textarea>
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="button">ارسال</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1213.3252849279427!2d51.59938344776857!3d30.667699435680685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fb0bb580e6f8ebd%3A0xb19aa6f77d1d052b!2sShaheed%20Beheshti%20High%20School!5e0!3m2!1sen!2s!4v1708578859323!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> تمام حقوق مادی و معنوی این سایت مطعلق به مدرسه شهید بهشتی یاسوج می باشد
          
           | طراحی سایت: <a href="https://templatemo.com" rel="sponsored" target="_parent">ایلیا حسینی</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
          if($(e.target).hasClass('external')) {
            return;
          }
          e.preventDefault();
          $('#menu').removeClass('active');
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>
</html>

<?php }else{
echo '
     <div style="text-align: center">
     <h2 class="alert-warning">اطلاعات سایت را کامل کنید</h2>
     <br>
	 <a type="button" class="btn btn-outline-dark"" data-bs-toggle="modal" data-bs-target="#exampleModal">
       ورود
	 </a>
	 </div>';
}
?>
