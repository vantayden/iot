
<!---->


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
        <?php 
        $this->load->view($inner_view);
        ;
        ?>
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
