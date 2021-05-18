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
$W=$sgi->WasteManagement();
?>    
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    POPUPS      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    
    <div class="popup" id="popup11">
        <div class="popup__header">
            <h5 class="heading--5 container__heading">
                Act towards
                <strong>OUR INITIATIVE</strong>
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

    <div class="popup" id="popup1">
        <div class="popup__header">
            <h5 class="heading--5 container__heading">
                What do we want?
                <strong>POPUP 1</strong>
            </h5>
            <a href="#causes" class="popup__close">X</a>
        </div>
        <form action="#" class="popup__form">
            <input type="hidden" name="cause" value="1">
            <p class="paragraph--4 popup__paragraph">Payment type:</p>
            <div class="popup__box">
                <input required type="radio" name="payment" class="popup__radio" value="OTP"><span class="paragraph--4 popup__pargraph">One Time Payment</span>
                <input required type="radio" name="payment" class="popup__radio" value="REC"><span class="paragraph--4 popup__pargraph">Recurring</span>
            </div>
            <p class="paragraph--4 popup__paragraph">Amount(you need to pay)*</p>
            <div class="popup__box">
                <input required type="text" name="amount" class="popup__text text">
                <p class="paragraph--4 popup__paragraph">U.S.D</p>
                <p class="paragraph--4 popup__paragraph">* Payment Gateway Fee Extra</p>
            </div>
            <p class="paragraph--4 popup__paragraph">Email</p>
            <div class="popup__box">
                <input required type="email" name="email" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Name</p>
            <div class="popup__box">
                <input required type="text" name="name" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Phone</p>
            <div class="popup__box">
                <input required type="number" name="phone" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Message</p>
            <div class="popup__box">
                <textarea name="message" class="textarea popup__textarea"></textarea>
            </div>
            <button type="submit" class="button popup__button">Submit</button>
        </form>
    </div>
    <div class="popup" id="popup2">
        <div class="popup__header">
            <h5 class="heading--5 container__heading">
                What do we want?
                <strong>POPUP 2</strong>
            </h5>
            <a href="#causes" class="popup__close">X</a>
        </div>
        <form action="#" class="popup__form">
            <input type="hidden" name="cause" value="2">
            <p class="paragraph--4 popup__paragraph">Payment type:</p>
            <div class="popup__box">
                <input required type="radio" name="payment" class="popup__radio" value="OTP"><span class="paragraph--4 popup__pargraph">One Time Payment</span>
                <input required type="radio" name="payment" class="popup__radio" value="REC"><span class="paragraph--4 popup__pargraph">Recurring</span>
            </div>
            <p class="paragraph--4 popup__paragraph">Amount(you need to pay)*</p>
            <div class="popup__box">
                <input required type="text" name="amount" class="popup__text text">
                <p class="paragraph--4 popup__paragraph">U.S.D</p>
                <p class="paragraph--4 popup__paragraph">* Payment Gateway Fee Extra</p>
            </div>
            <p class="paragraph--4 popup__paragraph">Email</p>
            <div class="popup__box">
                <input required type="email" name="email" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Name</p>
            <div class="popup__box">
                <input required type="text" name="name" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Phone</p>
            <div class="popup__box">
                <input required type="number" name="phone" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Message</p>
            <div class="popup__box">
                <textarea name="message" class="textarea popup__textarea"></textarea>
            </div>
            <button type="submit" class="button popup__button">Submit</button>
        </form>
    </div>
    <div class="popup" id="popup3">
        <div class="popup__header">
            <h5 class="heading--5 container__heading">
                What do we want?
                <strong>POPUP 3</strong>
            </h5>
            <a href="#causes" class="popup__close">X</a>
        </div>
        <form action="#" class="popup__form">
            <input type="hidden" name="cause" value="3">
            <p class="paragraph--4 popup__paragraph">Payment type:</p>
            <div class="popup__box">
                <input required type="radio" name="payment" class="popup__radio" value="OTP"><span class="paragraph--4 popup__pargraph">One Time Payment</span>
                <input required type="radio" name="payment" class="popup__radio" value="REC"><span class="paragraph--4 popup__pargraph">Recurring</span>
            </div>
            <p class="paragraph--4 popup__paragraph">Amount(you need to pay)*</p>
            <div class="popup__box">
                <input required type="text" name="amount" class="popup__text text">
                <p class="paragraph--4 popup__paragraph">U.S.D</p>
                <p class="paragraph--4 popup__paragraph">* Payment Gateway Fee Extra</p>
            </div>
            <p class="paragraph--4 popup__paragraph">Email</p>
            <div class="popup__box">
                <input required type="email" name="email" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Name</p>
            <div class="popup__box">
                <input required type="text" name="name" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Phone</p>
            <div class="popup__box">
                <input required type="number" name="phone" class="popup__text text">
            </div>
            <p class="paragraph--4 popup__paragraph">Message</p>
            <div class="popup__box">
                <textarea name="message" class="textarea popup__textarea"></textarea>
            </div>
            <button type="submit" class="button popup__button">Submit</button>
        </form>
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
            <a href="index.php" class="navigation__menu--link paragraph--5">home</a>
            <a href="about.php" class="navigation__menu--link paragraph--5">Our Story</a>
            <div class="navigation__menu--link selected  paragraph--5 navigation__dropdown" style="cursor: pointer;">Our Cause</div>
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
        <a href="recycle.php" class="dropdown__link selected  paragraph--5">Waste Management</a>
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
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    BANNER      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="banner">
        <h5 class="heading--5 banner__heading" style="display: none;">
            Help Us In Shaping a Hygienic Future
        </h5>
    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    CHARITY      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="charities">
        <div class="charities__left">
            <div class="charity">
                <p class="paragraph--3 charity__heading">
                    Recycling plastic waste and management
                </p>
                <div class="charity__box">
                    <img src="admin/assets/ngo/<?= $W[0]['path'] ?>" alt="" class="charity__image">
                    <p class="paragraph--4 charity__progressValue" style="display:none;">61.94%</p>
                    <div class="charity__progress" style="display:none;">
                        <div class="charity__progressBar"></div>
                    </div>
                </div>
                <p class="paragraph--4 charity__donation" >
                    Donation: ₹78,354.00 / <span>₹1,26,500.00</span>
                </p>
                <p class="paragraph--5 charity__tertiaryDescription" style="padding-top:2rem;">
                  <?= $W[0]['paragraph1'] ?>
                </p>
                <a href="#popup11" class="button2 charity__button">Make a Contribution</a>
            </div>
            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['paragraph2'] ?>

            </p>

            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['paragraph3'] ?>

            </p>
            <p class="paragraph--5 charity__tertiaryDescription">
                      <?= $W[0]['paragraph4'] ?>

            </p>
            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['paragraph5'] ?>

            </p>
            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['paragraph6'] ?>

            </p>
            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['paragraph7'] ?>

            </p>
            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['paragraph8'] ?>
 
            </p>
            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['paragraph9'] ?>

            </p>
            <p class="paragraph--5 charity__tertiaryDescription">
                  <?= $W[0]['heading'] ?>

            </p>
            <ul class="charity__list">
                <li class="paragraph--5 charity__listItem">          <?= $W[0]['headinga'] ?>
                </li>

                <li class="paragraph--5 charity__listItem">
             <?= $W[0]['headingb'] ?>

                </li>
                <li class="paragraph--5 charity__listItem">
            <?= $W[0]['headingc'] ?>

                </li>
                <li class="paragraph--5 charity__listItem">
              <?= $W[0]['headingd'] ?>   </li>
            </ul>
                        
            <div class="charity__steps" style="display: none;">
                <h5 class="heading--5 container__heading">
                    Find out about our 
                    <strong>Financials</strong>
                </h5>           
                 <div class="charity__steps">   
                <div class="charity__steps--grid">
                    <div class="charity__step">
                        <h6 class="heading--2 charity__step--index">2019-20</h6>
                        <p class="paragraph--5 charity__step--title">Equipment and Machinery</p>
                        <p class="paragraph--5 charity__step--paragraph">₹16,63,366</p>
                    </div>
                    <div class="charity__step">
                        <h6 class="heading--2 charity__step--index">2019-20</h6>
                        <p class="paragraph--5 charity__step--title">Manpower</p>
                        <p class="paragraph--5 charity__step--paragraph">₹2,47,699</p>
                    </div>
                    <div class="charity__step">
                        <h6 class="heading--2 charity__step--index">2019-20</h6>
                        <p class="paragraph--5 charity__step--title">Purchase of Waste Plastic</p>
                        <p class="paragraph--5 charity__step--paragraph">₹5,32,900</p>
                    </div> 
                     <div class="charity__step">
                        <h6 class="heading--2 charity__step--index">2019-20</h6>
                        <p class="paragraph--5 charity__step--title">Other Expenses</p>
                        <p class="paragraph--5 charity__step--paragraph">₹5,51,019</p>
                    </div>
                </div>  
            </div>
        </div>
            
            <div class="charity__box" style="display: none;">
                    <img src="images/recycle2.jpg" alt="" class="charity__image">
                </div>
            
        
             <a href="#popup11" class="button charity__button2">Make a Contribution</a>
            
             <p class="paragraph--5 charity__secondaryDescription">
         <?= $W[0]['heading2'] ?>
            </p>
            <p class="paragraph--5 charity__tertiaryDescription2">
            <?= $W[0]['paragraph10'] ?>
            </p>
            
            <div class="charity__causes" style="display: none;">
                <div class="charity">
                    <p class="paragraph--3 charity__heading">
                        Better living environment
                    </p>
                    <div class="charity__box" style="height: 20rem;">
                        <img src="images/cause1.jpg" alt="" class="charity__image">
                        <p class="paragraph--4 charity__progressValue">61.94%</p>
                        <div class="charity__progress">
                            <div class="charity__progressBar"></div>
                        </div>
                    </div>
                    <p class="paragraph--4 charity__donation">
                        Donation: ₹78,354.00 / <span>₹1,26,500.00</span>
                    </p>
                    <p class="paragraph--5 charity__paragraph">
                        To strive for the quality of our living environment through active awareness of sustainable growth to the people of India, is the agenda from our organization.
                    </p>
                    <a href="#popup11" class="button2 charity__button">Make a Contribution</a>
                </div>
                <div class="charity">
                    <p class="paragraph--3 charity__heading">
                        Better living environment
                    </p>
                    <div class="charity__box" style="height: 20rem;">
                        <img src="images/cause2.jpg" alt="" class="charity__image">
                        <p class="paragraph--4 charity__progressValue">61.94%</p>
                        <div class="charity__progress">
                            <div class="charity__progressBar"></div>
                        </div>
                    </div>
                    <p class="paragraph--4 charity__donation">
                        Donation: ₹78,354.00 / <span>₹1,26,500.00</span>
                    </p>
                    <p class="paragraph--5 charity__paragraph">
                        To strive for the quality of our living environment through active awareness of sustainable growth to the people of India, is the agenda from our organization.
                    </p>
                    <a href="#popup11" class="button2 charity__button">Make a Contribution</a>
                </div>
            </div>
        </div>
        
      <?= require('recent_activites.php'); ?>
    </div>
    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    FOOTER      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <footer class="footer">
        <div class="footer__grid">
            <div class="footer__left">
                <img src="images/logo.png" alt="" class="footer__logo">
                <p class="paragraph--4 footer__paragraph" style="display: none;">
                    To strive for the quality of our living environment through active awareness of sustainable growth to the people of India, is the agenda of Sustainable Green Initiative (SGI).							
                </p>
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
        
         <p class="footer__copyrights" style="color: white";>
            © Copyright 2019, All Rights Reserved by Sustainable Green Initiative (SGI). Technology partner @<a href="http://adhyay.co.in/" target="_blank" style="color:beige;">ADHYAY</a>
        </p>

    </footer>
    <script src="js/dropdown.js"></script>
</body>
</html>