
<!--head-->
<?php
$this->load->view('layout/head');
?>

<!---->

<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <?php
    $this->load->view('layout/sidebar');
    ?>
    <div class="main-content">

        <?php
        $this->load->view('layout/header');
        ?>


        <h3>Trang quản trị người dùng</h3>

        <table class="table table-bordered table-striped datatable" id="table-2">
            <thead>
            <tr>
                <th>First Name</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Group</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>


            <?php foreach ($users as $user):?>



            <tr>
                <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                <td>
                    <?php foreach ($user->groups as $group):?>
                        <?php
                        if ($group->name == 'admin') {
                            echo '<span class="label label-success">'.anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) .'</span>';
                        }
                        else{
                            echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;
                        }


                        ?>

                    <?php endforeach?>
                </td>
                <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                <td>
                    <a href="<?php echo "auth/edit_user/".$user->id ?>" class="btn btn-default btn-sm btn-icon icon-left">
                        <i class="entypo-pencil"></i>
                        Edit
                    </a>

                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                        <i class="entypo-cancel"></i>
                        Delete
                    </a>

                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                        <i class="entypo-info"></i>
                        Profile
                    </a>
                </td>
            </tr>

            <?php endforeach;?>
            </tbody>
        </table>


        <script type="text/javascript">
            jQuery(window).load(function()
            {
                var $ = jQuery;

                $("#table-2").dataTable({
                    "sPaginationType": "bootstrap",
                    "sDom": "t<'row'<'col-xs-6 col-left'i><'col-xs-6 col-right'p>>",
                    "bStateSave": false,
                    "iDisplayLength": 8,
                    "aoColumns": [
                        { "bSortable": false },
                        null,
                        null,
                        null,
                        null
                    ]
                });

                $(".dataTables_wrapper select").select2({
                    minimumResultsForSearch: -1
                });

                // Highlighted rows
                $("#table-2 tbody input[type=checkbox]").each(function(i, el)
                {
                    var $this = $(el),
                        $p = $this.closest('tr');

                    $(el).on('change', function()
                    {
                        var is_checked = $this.is(':checked');

                        $p[is_checked ? 'addClass' : 'removeClass']('highlight');
                    });
                });

                // Replace Checboxes
                $(".pagination a").click(function(ev)
                {
                    replaceCheckboxes();
                });
            });

        </script>


        <br /><!-- Footer -->
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



<link rel="stylesheet" href="<?php echo base_url(); ?>js/datatables/responsive/css/datatables.responsive.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>js/select2/select2.css">

<!-- Bottom Scripts -->
<script src="<?php echo base_url(); ?>js/gsap/main-gsap.js"></script>
<script src="<?php echo base_url(); ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/joinable.js"></script>
<script src="<?php echo base_url(); ?>js/resizeable.js"></script>
<script src="<?php echo base_url(); ?>js/neon-api.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>js/datatables/TableTools.min.js"></script>
<script src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url(); ?>js/datatables/lodash.min.js"></script>
<script src="<?php echo base_url(); ?>js/datatables/responsive/js/datatables.responsive.js"></script>
<script src="<?php echo base_url(); ?>js/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>js/neon-chat.js"></script>
<script src="<?php echo base_url(); ?>js/neon-custom.js"></script>
<script src="<?php echo base_url(); ?>js/neon-demo.js"></script>

</body>
</html>