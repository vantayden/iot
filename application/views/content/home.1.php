
<!---->
<?php
    echo $action;
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
        <h3>Table without DataTable Header</h3>
        
                    <table class="table table-bordered table-striped datatable" id="table-2">
                        <thead>
                            <tr>
                                <th>Id thiết bị</th>
                                <th>Tên thiết bị</th>
                                <th>Điều khiển</th>
                            </tr>
                        </thead>
        
                        <tbody>

                            <tr>
                                <td>01</td>
                                <td>Điều khiển phòng khách</td>
                                <td>
                                    <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i> Cài đặt
                                    </a>
        
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        <i class="entypo-info"></i> Điều khiển
                                    </a>

                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        <i class="entypo-cancel"></i> Vô hiệu hóa
                                    </a>
        
                                </td>
                            </tr>
       
                        </tbody>
                    </table>
        </div>
        <!---->

        <!-- Footer -->

        <!---->
<?php
        $this->load->view('layout/footer');
?>

</div>


    <?php
            $this->load->view('layout/foot');
    ?>
