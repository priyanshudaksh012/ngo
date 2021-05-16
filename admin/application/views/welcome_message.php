<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login(Adhyay Dynamic Websites)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= base_url('assets/login/images/icons/favicon.ico'); ?>"/>

<?= link_tag("assets/login/vendor/bootstrap/css/bootstrap.min.css"); ?>
<?= link_tag("assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css"); ?>
<?= link_tag("assets/login/fonts/iconic/css/material-design-iconic-font.min.css"); ?>

<?= link_tag("assets/login/vendor/animate/animate.css"); ?>
<?= link_tag("assets/login/vendor/css-hamburgers/hamburgers.min.css"); ?>


<?= link_tag("assets/login/vendor/animsition/css/animsition.min.css"); ?>
<?= link_tag("assets/login/vendor/select2/select2.min.css"); ?>

<?= link_tag("assets/login/css/main.css"); ?>
<?= link_tag("assets/login/css/util.css"); ?>
<?= link_tag("assets/login/vendor/daterangepicker/daterangepicker.css"); ?>

</head>
<body>
    
    
    <div class="container-login100" style="background-image: url('<?= base_url('assets/login/images/bg-01.jpg'); ?>');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form action="<?= base_url('index.php/LoginC'); ?>" class="login100-form validate-form" method="POST">
                <span class="login100-form-title p-b-37">
                    Sign In
                </span>
                <?php
                   if($this->session->has_userdata('success')){ ?>
        <h6 class='text-danger' style='margin-bottom:2rem;'><?= $this->session->success ?>
            <?php $this->session->unset_userdata('success'); ?>
        </h6>                 


              <?php
               }
                 ?>
 

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                    <input class="input100" type="text" name="email" placeholder="username or email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                    <input class="input100" type="password" name="password" placeholder="password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign In
                    </button>
                </div>


               
            </form>

    <div class="text-center" style="margin-top:5rem;">
                    <a href="https://adhyay.co.in" target="_blank" class="txt2 hov1" style='text-decoration: none;'>
                        Developed By Adhyay
                    </a>
                </div>

            
        </div>
    </div>
    
    

    <div id="dropDownSelect1"></div>
    
    <script src="<?= base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/login/vendor/animsition/js/animsition.min.js') ?>"></script>

<script src="<?= base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
    <script src="<?= base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
<script src="<? base_url('assets/login/vendor/daterangepicker/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/login/vendor/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/login/vendor/countdowntime/countdowntime.js') ?>"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>

</body>
</html>