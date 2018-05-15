
<!---->

<?php

var_dump($User);


?>

<!--head-->
<?php
$this->load->view('layout/head');
?>

<!---->

<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <!---->

    <!--    sidebar-menu-->
    <?php
    $this->load->view('layout/sidebar');
    ?>
    <!---->

    <div class="main-content">
        <!---->
        <!--        menu-profi-->
        <!--        header-->
        <!---->
        <?php
        $this->load->view('layout/header');
        ?>

        <hr />


        <div class="row">
            <form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="panel panel-primary" data-collapsed="0">

                            <div class="panel-heading">
                                <div class="panel-title col-md-4 col-md-offset-5">
                                    Thêm người dùng
                                </div>
                            </div>

                            <div class="panel-body">



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

                                    <div class="form-group col-md-3 col-md-offset-5">
                                        <button type="submit" class="btn btn-success btn-login">
                                            <i class="entypo-right-open-mini"></i>
                                            Hoàn thành đăng kí
                                        </button>
                                    </div>
                                </div>

                            </div>

                            </div>

                        </div>

                    </div>
                </div>

            </form>





            <!---->

            <!-- Footer -->

            <!---->
            <?php
            $this->load->view('layout/footer');
            ?>


            <!-- Chat Histories -->
            <ul class="chat-history" id="sample_history">
                <li>
                    <span class="user">Art Ramadani</span>
                    <p>Are you here?</p>
                    <span class="time">09:00</span>
                </li>

                <li class="opponent">
                    <span class="user">Catherine J. Watkins</span>
                    <p>This message is pre-queued.</p>
                    <span class="time">09:25</span>
                </li>

                <li class="opponent">
                    <span class="user">Catherine J. Watkins</span>
                    <p>Whohoo!</p>
                    <span class="time">09:26</span>
                </li>

                <li class="opponent unread">
                    <span class="user">Catherine J. Watkins</span>
                    <p>Do you like it?</p>
                    <span class="time">09:27</span>
                </li>
            </ul>




            <!-- Chat Histories -->
            <ul class="chat-history" id="sample_history_2">
                <li class="opponent unread">
                    <span class="user">Daniel A. Pena</span>
                    <p>I am going out.</p>
                    <span class="time">08:21</span>
                </li>

                <li class="opponent unread">
                    <span class="user">Daniel A. Pena</span>
                    <p>Call me when you see this message.</p>
                    <span class="time">08:27</span>
                </li>
            </ul>
        </div>



        <?php
        $this->load->view('layout/foot');
        ?>
