<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"/>
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>FOOD</title>
</head>
<body>
    <!--========== HEADER ==========-->
    
    <?php include("header.php"); ?>

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">Tasty food</h1>
                    <h2 class="home__subtitle">Try the best food of <br> the week.</h2>
                    <a href="#menu" class="button">View Menu</a>
                </div>
                
                <img src="assets/img/home.png" alt="" class="home__img">
            </div>
        </section>
        <!--========== MENU ==========-->
        <section class="menu section bd-container" id="menu">
            <span class="section-subtitle">Special</span>
            <h2 class="section-title">Menu of the week</h2>

            <div class="menu__container bd-grid">
                <?php include("product.php"); ?>
                   <!--  <div class="menu__content">
                        <img src="assets/img/plate1.png" alt="" class="menu__img">
                        <h3 class="menu__name">Barbecue salad</h3>
                        <span class="menu__detail">Delicious dish</span>
                        <span class="menu__preci">$22.00</span>
                        <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                    </div> -->

                </div>
            </section>
            <!-- <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item active"><a href="?per_page=6&page=1" class="page-link">1</a></li>
                <li class="page-item"><a href="?per_page=6&page=2" class="page-link">2</a></li>
                <li class="page-item"><a href="?per_page=6&page=3" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul> -->
            <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <?php include("pagination.php"); ?>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>

            <!--========== ABOUT ==========-->
            <section class="about section bd-container" id="about">
                <div class="about__container  bd-grid">
                    <div class="about__data">
                        <span class="section-subtitle about__initial">About us</span>
                        <h2 class="section-title about__initial">We cook the best <br> tasty food</h2>
                        <p class="about__description">We cook the best food in the entire city, with excellent customer service, the best meals and at the best price, visit us.</p>
                        <a href="#" class="button">Explore history</a>
                    </div>

                    <img src="assets/img/about.jpg" alt="" class="about__img">
                </div>
            </section>

            <!--========== SERVICES ==========-->
            <section class="services section bd-container" id="services">
                <span class="section-subtitle">Offering</span>
                <h2 class="section-title">Our amazing services</h2>

                <div class="services__container  bd-grid">
                    <div class="services__content">
                        <svg class="services__img" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="./assets/img/sprite.svg#excellent_food"></use>
                        </svg>
                        <h3 class="services__title">Excellent food</h3>
                        <p class="services__description">We offer our clients excellent quality services for many years, with the best and delicious food in the city.</p>
                    </div>

                    <div class="services__content">
                        <svg class="services__img" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <use xlink:href="./assets/img/sprite.svg#fast_food"></use>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="64" height="64" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3 class="services__title">Fast food</h3>
                        <p class="services__description">We offer our clients excellent quality services for many years, with the best and delicious food in the city.</p>
                    </div>

                    <div class="services__content">
                        <svg class="services__img" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <use xlink:href="./assets/img/sprite.svg#delivery"></use>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="64" height="64" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                        <h3 class="services__title">Delivery</h3>
                        <p class="services__description">We offer our clients excellent quality services for many years, with the best and delicious food in the city.</p>
                    </div>
                </div>
            </section>
            <!--===== APP =======-->
            <section class="app section bd-container">
                <div class="app__container bd-grid">
                    <div class="app__data">
                        <span class="section-subtitle app__initial">App</span>
                        <h2 class="section-title app__initial">App is aviable</h2>
                        <p class="app__description">Find our application and download it, you can make reservations, food orders, see your deliveries on the way and much more.</p>
                        <div class="app__stores">
                            <a href="#"><img src="assets/img/app1.png" alt="" class="app__store"></a>
                            <a href="#"><img src="assets/img/app2.png" alt="" class="app__store"></a>
                        </div>
                    </div>

                    <img src="assets/img/movil-app.png" alt="" class="app__img">
                </div>
            </section>

            <!--========== CONTACT US ==========-->
            <section class="contact section bd-container" id="contact">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <span class="section-subtitle contact__initial">Let's talk</span>
                        <h2 class="section-title contact__initial">Contact us</h2>
                        <p class="contact__description">If you want to reserve a table in our restaurant, contact us and we will attend you quickly, with our 24/7 chat service.</p>
                    </div>

                    <div class="contact__button">
                        <a href="#" class="button">Contact us now</a>
                    </div>
                </div>
            </section>
        </main>

        <!--========== FOOTER ==========-->
        <?php include("footer.php"); ?>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
    </html>