<?php
$this->load->view('layout/head');

?>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">
<div id="infoMessage"><?php echo $message;?></div>

<!-- This is needed when you send requests via Ajax --><script type="text/javascript">
    var baseurl = '';
</script>

<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="index.html" class="logo">
                <img src="<?php echo base_url(); ?>images/logo@2x.png" width="120" alt="" />
            </a>

            <p class="description">Create an account, it's free and takes few moments only!</p>

            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>logging in...</span>
            </div>
        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form">

        <div class="login-content">
            <div id="infoMessage"><?php echo $message;?></div>

            <form method="post" role="form" id="form_register">

                <div class="form-register-success">
                    <i class="entypo-check"></i>
                    <h3>You have been successfully registered.</h3>
                    <p>We have emailed you the confirmation link for your account.</p>
                </div>

                <div class="form-steps">

                    <div class="step current" id="step-1">

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>

                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-phone"></i>
                                </div>

                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" data-mask="phone" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-calendar"></i>
                                </div>

                                <input type="text" class="form-control" name="company" id="company" placeholder="Company"  autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-right-open-mini"></i>
                                Next Step
                            </button>
                        </div>

                        <div class="form-group">
                            Step 1 of 2
                        </div>

                    </div>

                    <div class="step" id="step-2">

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>

                                <input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user-add"></i>
                                </div>

                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" data-mask="[a-zA-Z0-1\.]+" data-is-regex="true" autocomplete="off" />
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-lock"></i>
                                </div>

                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confim Password" autocomplete="off" />
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btn-login">
                                <i class="entypo-right-open-mini"></i>
                                Complete Registration
                            </button>
                        </div>

                        <div class="form-group">
                            Step 2 of 2
                        </div>

                    </div>

                </div>

            </form>


            <div class="login-bottom-links">

                <a href="extra-login.html" class="link">
                    <i class="entypo-lock"></i>
                    Return to Login Page
                </a>

                <br />

                <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>

            </div>

        </div>

    </div>

</div>


<!-- Bottom Scripts -->
<script src="<?php echo base_url(); ?>js/gsap/main-gsap.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/joinable.js"></script>
<script src="<?php echo base_url(); ?>js/resizeable.js"></script>
<script src="<?php echo base_url(); ?>js/neon-api.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>js/neon-register.js"></script>
<!--<script src="<?php echo base_url(); ?>js/jquery.inputmask.bundle.min.js"></script>-->
<script src="<?php echo base_url(); ?>js/neon-custom.js"></script>
<script src="<?php echo base_url(); ?>js/neon-demo.js"></script>

</body>
</html>