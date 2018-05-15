<div class="sidebar-menu">
<header class="logo-env">
    <!-- logo -->
    <div class="logo">
        <a href="index.html">
            <img src="assets/images/logo@2x.png" width="120" alt="" />
        </a>
    </div>

    <!-- logo collapse icon -->
    <div class="sidebar-collapse">
        <a href="#" class="sidebar-collapse-icon with-animation">
            <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
            <i class="entypo-menu"></i>
        </a>
    </div>

    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
    <div class="sidebar-mobile-menu visible-xs">
        <a href="#" class="with-animation">
            <!-- add class "with-animation" to support animation -->
            <i class="entypo-menu"></i>
        </a>
    </div>
</header>
<?php if(!$this->ion_auth->is_admin()): ?>
    <ul id="main-menu" class="">
        <li class="<?php echo ($ctrler == "home" ? "active opened" : "")?>">
            <a href="index.html">
                <i class="entypo-gauge"></i>
                <span>Quản lý thiết bị</span>
            </a>
            <ul>
                <li class="active">
                    <a href="index.html">
                        <span>Danh sách thiết bị</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard-2.html">
                        <span>Các cảm biến</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($ctrler == "controldevice" ? "active opened" : "")?>">
            <a href="index.html">
                <i class="entypo-gauge"></i>
                <span>Điều khiển thiết bị</span>
            </a>
            <ul>
            <?php if($ctrler != "controldevice") $module_info['id'] = -1;?>
            <?php foreach($list_info_devices as $device): ?>
            
                <li class = "<?php echo ($device['m_id'] == $module_info['id'] ? "active opened" : ""); ?> ">
                    <a href="<?php echo base_url();?><?php echo $device['prefix']?>/control/<?php echo $device['m_id']?>">
                        <span><?php echo $device['m_name'] ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </li>
    </ul>
<?php endif; ?>
</div>