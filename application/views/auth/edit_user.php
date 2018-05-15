<?php
$this->load->view('layout/head');
?>

<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <?php
    $this->load->view('layout/sidebar');
    ?>
    <div class="main-content">

        <?php
        $this->load->view('layout/header');
        ?>

        <hr />
        <h1 class="margin-bottom">Cập nhật tài khoản người dùng</h1>

        <br />

        <form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="">

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary" data-collapsed="0">

                        <div class="panel-heading">
                            <div class="panel-title">
                                General Settings
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">First Name</label>

                                <div class="col-sm-5">
                                    <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo  $first_name['value']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Last Name</label>

                                <div class="col-sm-5">
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo  $last_name['value']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Company</label>

                                <div class="col-sm-5">
                                    <input type="text" name="company" class="form-control" id="company" value="<?php echo  $company['value']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-3" class="col-sm-3 control-label">Phone</label>

                                <div class="col-sm-5">
                                    <input type="text" name="phone"  class="form-control" id="phone" data-validate="required" value="<?php echo  $phone['value']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field-4" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-5">
                                    <input type="password" name="password" class="form-control" id="password" data-validate="required,email" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-4" class="col-sm-3 control-label">Confim password</label>

                                <div class="col-sm-5">
                                    <input type="password" name="password_confirm" class="form-control"  id="password_confirm" data-validate="required,email" value="">
                                </div>
                            </div>


                            <div class="form-group">

                                <?php if ($this->ion_auth->is_admin()): ?>

                                    <?php echo '<label for="field-4" class="col-sm-3 control-label">'.lang('edit_user_groups_heading').'</label>'; ?>
                                <div class="col-sm-5">
                                    <?php foreach ($groups as $group):?>
                                        <label class="checkbox">
                                            <?php
                                            $gID=$group['id'];
                                            $checked = null;
                                            $item = null;
                                            foreach($currentGroups as $grp) {
                                                if ($gID == $grp->id) {
                                                    $checked= ' checked="checked"';
                                                    break;
                                                }
                                            }
                                            ?>
                                            <?php echo '<label>'.$group['name']; ?>
                                            <input type="checkbox" class="form-control" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                            <?php echo '</label>'; ?>
                                        </label>
                                    <?php endforeach?>
                                </div>
                                <?php endif ?>

                                <?php echo form_hidden('id', $user->id);?>
                                <?php echo form_hidden($csrf); ?>

                            </div>


                        </div>

                    </div>

                </div>
            </div>

            <div class="form-group default-padding">
                <button type="submit" class="btn btn-success" name="submit">Save Changes</button>
                <button type="reset" class="btn">Reset Previous</button>
            </div>

        </form>
        <!-- Footer -->
        <?php
        $this->load->view('layout/footer');
        ?>


    <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

        <div class="chat-inner">


            <h2 class="chat-header">
                <a href="#" class="chat-close" data-animate="1"><i class="entypo-cancel"></i></a>

                <i class="entypo-users"></i>
                Chat
                <span class="badge badge-success is-hidden">0</span>
            </h2>


            <div class="chat-group" id="group-1">
                <strong>Favorites</strong>

                <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
            </div>


            <div class="chat-group" id="group-2">
                <strong>Work</strong>

                <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                <a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
            </div>


            <div class="chat-group" id="group-3">
                <strong>Social</strong>

                <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
                <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
            </div>

        </div>

        <!-- conversation template -->
        <div class="chat-conversation">

            <div class="conversation-header">
                <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

                <span class="user-status"></span>
                <span class="display-name"></span>
                <small></small>
            </div>

            <ul class="conversation-body">
            </ul>

            <div class="chat-textarea">
                <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
            </div>

        </div>

    </div>


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
