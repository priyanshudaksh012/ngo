 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>SGI-Foundation</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<?php 
require('php/function.php');
$sgi=new SgiFunction();

$B=$sgi->Banner();
$C=$sgi->CurrentProject();
$N=$sgi->LatestNews();

?>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    POPUPS      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

    <div class="popup" id="popup1">
        <div class="popup__header">
            <h5 class="heading--5 container__heading">
                A generous act towards
                <strong>COVID Relief</strong>
            </h5>
            <a href="#causes" class="popup__close">X</a>
        </div>
        <div class="popup__container">
            <h5 class="heading--6 popup__heading">
                Bank details:
            </h5>
            <p class="paragraph--4 popup__paragraph">
                Bank Name: Corporation Bank
            </p>
            <p class="paragraph--4 popup__paragraph">
                Branch : Corpration Bank Jakhan Branch Dehradun Uttarakhand 
            </p>
            <p class="paragraph--4 popup__paragraph">
                Account number: 510101006547338
            </p>
            <p class="paragraph--4 popup__paragraph">
                IFSC: CORP0003280
            </p>
        </div>
    </div>
    <div class="popup" id="popup2">
        <div class="popup__header">
            <h5 class="heading--5 container__heading">
                A generous act towards
                <strong>Waste Management</strong>
            </h5>
            <a href="#causes" class="popup__close">X</a>
        </div>
        <div class="popup__container">
            <h5 class="heading--6 popup__heading">
                Bank details:
            </h5>
            <p class="paragraph--4 popup__paragraph">
                Bank Name: Corporation Bank
            </p>
            <p class="paragraph--4 popup__paragraph">
                Branch : Corpration Bank Jakhan Branch Dehradun Uttarakhand 
            </p>
            <p class="paragraph--4 popup__paragraph">
                Account number: 510101006547338
            </p>
            <p class="paragraph--4 popup__paragraph">
                IFSC: CORP0003280
            </p>
        </div>
    </div>
    <div class="popup" id="popup3">
        <div class="popup__header">
            <h5 class="heading--5 container__heading">
                A generous act towards
                <strong>Environment</strong>
            </h5>
            <a href="#causes" class="popup__close">X</a>
        </div>
        <div class="popup__container">
            <h5 class="heading--6 popup__heading">
                Bank details:
            </h5>
            <p class="paragraph--4 popup__paragraph">
                Bank Name: Corporation Bank
            </p>
            <p class="paragraph--4 popup__paragraph">
                Branch : Corpration Bank Jakhan Branch Dehradun Uttarakhand 
            </p>
            <p class="paragraph--4 popup__paragraph">
                Account number: 510101006547338
            </p>
            <p class="paragraph--4 popup__paragraph">
                IFSC: CORP0003280
            </p>
        </div>
    </div>


    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    HEADER      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <header class="header">
        <a href="index.php" class="header__logo--link"><img src="images/logo.png" alt="" class="header__logo"></a>
        <div class="header__social">
            <a href="#" class="header__social--link">
                <svg class="header__social--icon">
                    <use href='images/socialSprite.svg#icon-facebook' ></use>
                </svg>
            </a>
            <a href="#" class="header__social--link">
                <svg class="header__social--icon">
                    <use href='images/socialSprite.svg#icon-linkedin'></use>
                </svg>
            </a>
        </div>
        <a href="contact.php" class="button header__subscribe paragraph--6">
            Volunteer
        </a>
    </header>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    NAVIGATION      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <nav class="navigation">
        <div class="navigation__menu">
            <a href="index.php" class="navigation__menu--link selected paragraph--5">home</a>
            <a href="about.php" class="navigation__menu--link paragraph--5">Our Story</a>
            <div class="navigation__menu--link paragraph--5 navigation__dropdown" style="cursor: pointer;">Our Cause</div>
            <!-- <a href="sustainable.php" class="navigation__menu--link paragraph--5">Our Cause</a>
            <a href="recycle.php" class="navigation__menu--link paragraph--5">Our Cause</a>
            <a href="plantation.php" class="navigation__menu--link paragraph--5">Our Cause</a> -->
            <a href="employment.php" class="navigation__menu--link paragraph--5">Employment</a>
            <a href="news.php" class="navigation__menu--link paragraph--5">Resources</a>
            <a href="contact.php" class="navigation__menu--link paragraph--5">contact us</a>
        </div>
    </nav>

    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!      DROPDOWN    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

    <div class="dropdown">
        <a href="sustainable.php" class="dropdown__link paragraph--5">Greening the Planet</a>
        <a href="recycle.php" class="dropdown__link paragraph--5">Waste Management</a>
    </div>

    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!      MOBILE MENU    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <input type="checkbox" class="mobmenu__checkbox" >

    <div class="mobmenu__background"></div>

    <div class="mobmenu__buttonContainer">
        <div class="mobmenu__line mobmenu__line--1"></div>
        <div class="mobmenu__line mobmenu__line--2"></div>
        <div class="mobmenu__line mobmenu__line--3"></div>
    </div>

     <div class="mobmenu">
        <div class="mobmenu__box">
            <a href="index.php" class="mobmenu__link paragraph--3">HOME</a>
        </div>
        <div class="mobmenu__box">
            <a href="about.php" class="mobmenu__link paragraph--3">Our Story</a>
        </div>
        <div class="mobmenu__box">
            <a href="sustainable.php" class="mobmenu__link paragraph--3">Greening the Planet</a>
        </div>
        <div class="mobmenu__box">
            <a href="recycle.php" class="mobmenu__link paragraph--3">Waste Management</a>
        </div>

        <div class="mobmenu__box">
            <a href="employment.php" class="mobmenu__link paragraph--3">Employment </a>
        </div>
        <div class="mobmenu__box">
            <a href="news.php" class="mobmenu__link paragraph--3">Resources</a>
        </div>
        <div class="mobmenu__box">
            <a href="contact.php" class="mobmenu__link paragraph--3">Contact Us</a>
        </div>
    </div>

    
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    SLIDESHOW      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="slideshow">
        <div class="slideshow__container">
            <div class="slide slide--1">
                <img src="admin/assets/ngo/<?= $B[0]['path'] ?>" alt="banner-2" style="z-index:0; position:absolute; top:0; left:0;"/>
                <div class="slide__contentbox" style="z-index:1;">
                    <p class="paragraph--6 slide__cause"><?= $B[0]['slide_cause'] ?></p>
                    <h4 class="heading--4 slide__heading"><?= $B[0]['slide_heading'] ?></h4>
                    <h5 class="heading--5 slide__title"><?= $B[0]['slide_title'] ?></h5>
                    <p class="paragraph--4 slide__paragraph"><?= $B[0]['slide_paragraph'] ?></p>
                    <a href="sustainable.php" class="button slide__button pargaraph--6"><?= $B[0]['slide_button'] ?></a>
                </div>
            </div>
            <div class="slide slide--2">
                <img src="admin/assets/ngo/<?= $B[1]['path'] ?>" alt="banner-3" style="z-index:0; position:absolute; top:0; left:0;"/>
                <div class="slide__contentbox" style="z-index:1;">
                    <p class="paragraph--6 slide__cause"><?= $B[1]['slide_cause'] ?></p>
                    <h4 class="heading--4 slide__heading"><?= $B[1]['slide_heading'] ?></h4>
                    <h5 class="heading--5 slide__title">
                        <?= $B[1]['slide_title'] ?>
                    </h5>
                    <p class="paragraph--4 slide__paragraph"><?= $B[1]['slide_paragraph'] ?></p>
                    <a href="sustainable.php" class="button slide__button pargaraph--6"><?= $B[1]['slide_button'] ?></a>
                </div>
            </div>
            <div class="slide slide--3">
                <img src="admin/assets/ngo/<?= $B[2]['path'] ?>" alt="banner-1" style="z-index:0; position:absolute; top:0; left:0;"/>

                <div class="slide__contentbox" style="z-index:1;">
                    <p class="paragraph--6 slide__cause"><?= $B[2]['slide_cause'] ?></p>
                    <h4 class="heading--4 slide__heading"><?= $B[2]['slide_heading'] ?></h4>
                    <h5 class="heading--5 slide__title"><?= $B[2]['slide_title'] ?></h5>
                    <p class="paragraph--4 slide__paragraph"><?= $B[2]['slide_paragraph'] ?></p>
                    <a href="recycle.php" class="button slide__button pargaraph--6"><?= $B[2]['slide_button'] ?></a>
                </div>
            </div>

            <div class="slide__dots">
                <div class="slide__dot selected dot"></div>
                <div class="slide__dot dot"></div>
                <div class="slide__dot dot"></div>
            </div>

        </div>
    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    CAUSES      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="container">
        <h5 class="heading--5 container__heading">
            Our current 
            Projects
        </h5>

        <div class="causes" id="causes">
            <div class="causes__container">
                <!--################################    CAUSE 1     ##############################-->
                <div class="cause">
                    <p class="paragraph--3 cause__heading">
                        <?= $C[0]['cause_heading'] ?>
                    </p>
                    <div class="cause__box">
                        <img src="admin/assets/ngo/<?= $C[0]['path'] ?>" alt="" class="cause__image">
                        <p class="paragraph--4 cause__progressValue" style="display: none;">75.38%</p>
                        <div class="cause__progress" style="display: none;">
                            <div class="cause__progressBar"></div>
                        </div>
                    </div>
                    <p class="paragraph--4 cause__donation">
                        Donation: ₹78,354.00 / <span>₹1,26,500.00</span>
                    </p>
                    <p class="paragraph--5 cause__paragraph">
                <?= $C[0]['cause_paragraph'] ?>
               
                        </p>
                    <a href="#popup1" class="button2 cause__button">  <?= $C[0]['cause_button'] ?>
               </a>
                </div>
                <!--################################    CAUSE 2     ##############################-->
                <div class="cause">
                    <p class="paragraph--3 cause__heading">
                       <?= $C[1]['cause_heading'] ?>
               
                    </p>
                    <div class="cause__box">
                        <img src="admin/assets/ngo/<?= $C[1]['path'] ?>" alt="" class="cause__image">
                        <p class="paragraph--4 cause__progressValue" style="display: none;">42.00%</p>
                        <div class="cause__progress" style="display: none;">
                            <div class="cause__progressBar"></div>
                        </div>
                    </div>
                    
                    <p class="paragraph--4 cause__donation">
                        Donation: ₹78,354.00 / <span>₹1,26,500.00</span>
                    </p>
                    <p class="paragraph--5 cause__paragraph">
                <?= $C[1]['cause_paragraph'] ?>
                  
                    </p>
                    <a href="#popup2" class="button2 cause__button">    <?= $C[1]['cause_button'] ?>
               </a>
                </div>
                <!--################################    CAUSE 3     ##############################-->
                <div class="cause">
                    <p class="paragraph--3 cause__heading">
    <?= $C[2]['cause_heading'] ?>
               
                    </p>
                    <div class="cause__box">
            <img src="admin/assets/ngo/<?= $C[2]['path'] ?>" alt="" class="cause__image">
                        <p class="paragraph--4 cause__progressValue" style="display: none;">33.33%</p>
                        <div class="cause__progress" style="display: none;">
                            <div class="cause__progressBar"></div>
                        </div>
                    </div>
                    <p class="paragraph--4 cause__donation">
                        Donation: ₹78,354.00 / <span>₹1,26,500.00</span>
                    </p>
                    <p class="paragraph--5 cause__paragraph">
                    <?= $C[2]['cause_paragraph'] ?>
                     </p>
                    <a href="#popup3" class="button2 cause__button">    <?= $C[2]['cause_button'] ?>
               
</a>
                </div>
            </div>
        </div>

    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    HELP      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="container" style="background-color: #fbfaf8;">
        <h5 class="heading--5 container__heading">
            What do we want?  
            <strong>Sustainable growth</strong>
        </h5>

        <div class="help">
            <div class="help__left">
                <div class="help__card">
                    <div class="help__box">
                    </div>
                    <div class="help__details">
                        <p class="paragraph--3 help__heading">Media</p>
                        <p class="paragraph--5 help__paragraph">
                            We have been recognized under section 12A of the Income tax Act and are in the process<br> of obtaining an 80G certificate.
                        </p>
                    </div>
                </div>
                <div class="help__card">
                    <div class="help__box2">
                    </div>
                    <div class="help__details">
                        <p class="paragraph--3 help__heading">Volunteer</p>
                        <p class="paragraph--5 help__paragraph">
                            Whether young or old, we are encouraging each of us to contribute towards environment<br> and create a passionate world for future generation.
                        </p>
                    </div>
                </div>
                <div class="help__card">
                    <div class="help__box3">
                    </div>
                    <div class="help__details">
                        <p class="paragraph--3 help__heading">Donate</p>
                        <p class="paragraph--5 help__paragraph">
                            We entreat our donors to contribute actively with energy and full heartedly as we believe through our actions we are giving back to the society.
                        </p>
                    </div>
                </div>

            </div>
            <div class="help__right">
                <iframe src="https://www.youtube.com/embed/JkaxUblCGz0?start=748" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </div>

    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    VOLUNTEER      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="volunteer">
        <div class="volunteer__content">
            <h3 class="heading--3 volunteer__heading">Become <strong>A Volunteer</strong></h3>
            <p class="paragraph--3 volunteer__pargraph">
                It is a vigorously approach to provide a platform for people to help the society become better, we are urge younger and older generation to step up and apply for our cause and give their contribution towards the betterment of the society and ultimately to a better world. 
            </p>
            <a href="contact.php" class="button pargraph--6 volunteer__button">
                Apply now
            </a>
        </div>
    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    NEWS      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="container">
        <h5 class="heading--5 container__heading">
            Latest News
        </h5>
        <div class="news__grid">
            <div class="news">
                <img src="admin/assets/ngo/<?= $N[0]['path']; ?>" alt="" class="news__image">
                <a href="#" class="paragraph--3 news__link">
                  <?= $N[0]['news_paragraph']; ?> 
                </a>
                <p class="paragraph--7 news__date">
             <?= $N[0]['news_dates']; ?> 
                </p>
            </div>
            <div class="news">
                <img src="admin/assets/ngo/<?=  $N[1]['path'] ?>" alt="" class="news__image">
                <a href="#" class="paragraph--3 news__link">
                  <?= $N[1]['news_paragraph']; ?> 
                </a>
                <p class="paragraph--7 news__date">
                  <?= $N[1]['news_dates']; ?> 
                </p>
            </div>
            <div class="news">
                <img src="admin/assets/ngo/<?= 
                $N[2]['path'] ?>" alt="" class="news__image">
                <a href="#" class="paragraph--3 news__link">
            <?= $N[2]['news_paragraph']; ?> 
                </a>
                <p class="paragraph--7 news__date">
                  <?= $N[2]['news_dates']; ?> 
                </p>
            </div>
        </div>
    </div>
 
    
        <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    WAYS      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="container" style="display: none;">
        <h5 class="heading--5 container__heading">
            How We Help in
            <strong>Several Ways</strong>
        </h5>
        <div class="ways">
            <div class="way">
                <img src="images/slide-1.jpg" alt="" class="way__image">
                <h6 class="heading--8 way__heading">
                    Providing healthy saplings
                </h6>
                <p class="paragraph--5 way__paragraph">
                    It is important to ensure the sapling to grow up healthy and strong, and the way to do it is to provide enough moisture and water, while providing ample covering of mulch around the base to protect it from the ultraviolet rays of the sun, keeping the roots appropriately hydrated. We care about the each plant and make all the efforts to help grow a healthy plant around the areas. 
                </p>
            </div>
            <div class="way">
                <img src="images/slide-2.jpg" alt="" class="way__image">
                <h6 class="heading--8 way__heading">
                    Yeilding better results
                </h6>
                <p class="paragraph--5 way__paragraph">
                    Pruning is a good method for the young tree to regularly ensure a healthy and even growth pattern. A proper method to help trees grow effectively is quite an important process, for even the tree’s leaf to stop getting too denser or avoid patches to appear in its canopy.
                </p>
            </div>
            <div class="way">
                <img src="images/slide-3.jpg" alt="" class="way__image">
                <h6 class="heading--8 way__heading">
                    Using natural fertilizers
                </h6>
                <p class="paragraph--5 way__paragraph">
                    Factors such as light water, and nutrients are the main agents that influence the growth and health of the plant. Other factors are- sunlight, rain and irrigation, and the nutrients available in the soil (the soil’s PH). When plants perform in a less optimum manner, the problems could be any of the above issues. Therefore, adding the natural fertilizers such as gobar will give a good boost to the plant’s health.
                </p>
            </div>
            <div class="way">
                <img src="images/slide-4.jpg" alt="" class="way__image">
                <h6 class="heading--8 way__heading">
                    Helping villagers with correct plantation
                </h6>
                <p class="paragraph--5 way__paragraph">
                    Originating in the Himalayan region of northern India, Sustainable Green Initiative (SGI), is educating the people specially in the rural areas to grow plants around their surroundings. This will not only help maintain a physical environment but also would inculcate knowledge about sustainable growth. We are reaching out to people and providing information about the specific plantation for the region that will allow the organic growth of our Green initiative in the country.
                </p>
            </div>
        </div>
    </div>
    
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    FOOTER      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <footer class="footer">
        <div class="footer__grid">
            <div class="footer__left">
                <img src="images/logo.png" alt="" class="footer__logo">
                <div class="footer__details">
                    <div class="footer__details--grid">
                        <div class="footer__icon footer__icon--1"></div>
                        <p class="paragraph--5 footer__paragraph">
                            Green Mount Landour Cantt Mussoorie, Dehradun, India
                        </p>
                    </div>
                    <div class="footer__details--grid">
                        <div class="footer__icon footer__icon--2"></div>
                        <p class="paragraph--5 footer__paragraph">
                            +91 97303 30053
                        </p>
                    </div>
                    <div class="footer__details--grid">
                        <div class="footer__icon footer__icon--3"></div>
                        <p class="paragraph--5 footer__paragraph">
                            info@sgi.foundation
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer__center">
                <p class="paragraph--2 footer__heading">
                    Newsletter Signup
                </p>
                <p class="paragraph--4 footer__paragraph">
                    Get latest updates from our initiative
                </p>
                <form action="#" class="footer__signup">
                    <input type="email" id="signupEmail" class="footer__textBox paragraph--7" placeholder="Enter Email">
                    <button type="submit" class="button footer__button">submit</button>
                </form>
            </div>
            <div class="footer__right">
                <p class="paragraph--2 footer__heading">
                    Follow Us
                </p>
                <div class="footer__socials">
                    <a href="#" class="footer__socialLink">
                        <svg class="footer__socialIcon">
                            <use href='images/socialSprite.svg#icon-facebook'></use>
                        </svg>
                    </a>
                    <a href="#" class="footer__socialLink">
                        <svg class="footer__socialIcon">
                            <use href='images/socialSprite.svg#icon-linkedin'></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <p class="footer__copyrights" style="color: white;">
            © Copyright 2019, All Rights Reserved by Sustainable Green Initiative (SGI). Technology partner @<a href="http://adhyay.co.in/" target="_blank" style="color:beige;">ADHYAY</a>
        </p>

    </footer>
    <script src="js/slide.js"></script>
    <script src="js/help.js"></script>
    <script src="js/testimonial.js"></script>
    <script src="js/dropdown.js"></script>



</body>
</html>