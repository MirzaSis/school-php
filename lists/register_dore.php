<?php require_once('reciver.php') ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Kool Form Pack | Register or Create an account</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/tooplate-kool-form-pack.css" rel="stylesheet">
<!--

Tooplate 2136 Kool Form Pack

https://www.tooplate.com/view/2136-kool-form-pack

Bootstrap 5 Form Pack Template

-->
    </head>
    
    <body>

        <main>

            <header class="site-header">
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="col-lg-12 col-12 d-flex">
                           

                            <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
                                <span class="text-white me-4 d-none d-lg-block">Shaheed Beheshti High School</span>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>
                            </ul>

                             <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="index.html">
                                <i class="bi-box"></i>

                                <span>
                                    دبیرستان شهید بهشتی
                                </span>
                            </a>

                            <a class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu"></a>

                        </div>

                    </div>
                </div>
            </header>


            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mx-auto">
                            <form class="custom-form" role="form">
                                <h2 class="hero-title text-center mb-4 pb-2">ثبت نام در دوره <?= $_REQUEST['dore_name'] ?></h2>

                                <div class="row">																		
									<input hidden="" name="dore_name" value="<?= $_REQUEST['dore_name'] ?>">
									    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating mb-4 p-0">
                                            <input style="text-align: center"  type="number" name="number_dore" id="email"  class="form-control" required="">

                                            <label for="email">شماره موبایل</label>
                                        </div>
                                    </div>
									
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div style="text-align: right" class="form-floating">
                                            <input style="text-align: center" type="text" name="ful_name" id="full-name" class="form-control"  required="">
                                            
                                            <label for="floatingInput">نام و نام خانوادگی</label>
                                        </div>
                                    </div>
									
                             <div class="col-lg-12 col-12">
                                       
						     <textarea placeholder="توضیحات بیشتر" style="text-align: right" class="form-control"></textarea>
                                    </div>
                                        <div  class="col-lg-12 col-12 ms-auto">
                                            <input  name="submit_dore" value="ثبت نام" type="submit" class="form-control">
                                        </div>                                                                        
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="videos/video.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
