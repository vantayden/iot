<div class="row">
<div class="col-md-12">

    <div class="panel panel-primary" data-collapsed="0">
    <div class="panel-title text-center">
                Nhiệt độ hiện tại : <?php echo $t; ?>
                <br> Độ ẩm hiện tại : <?php echo $h; ?>
            </div>
        <div class="panel-heading">
            <div class="panel-title text-center">
                Cài đặt thiết bị 01 
            </div>

            <div class="panel-options">
                <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
            </div>
        </div>

        <div class="panel-body">
        <?php foreach($list_device_setup as $key => $value): ?>
            <form role="form" class="form-horizontal" method="post" action  = "">
                <div class="form-group">
                <div class="text-center">
                    <h3>Tên: <?php echo $value['name'] ?></h3>
                </div>
                <div class="col-sm-offset-2 col-sm-4">
                            <input type="text" name ="device_name_id"  value = "<?php echo $key ?>" hidden>
                        <div class="radio radio-replace color-green">
                            <input type="radio" id="rd-1" name="devicestatus" value = "0" <?php echo $value['status'] == 0 ? 'checked' : ''  ?>>
                            <label>Mặc định</label>
                        </div>
                        <div class="radio radio-replace color-green">
                            <input type="radio" id="rd-1" name="devicestatus" value = "1" <?php echo $value['status'] == 1 ? 'checked' : ''  ?>>
                            <label>Mở khi nhiệt độ </label>
                            <input type="text" name = "temperature" value = "<?php echo $value['t'] ?: 0 ?>">
                        </div>

                        <div class="radio radio-replace color-green">
                            <input type="radio" id="rd-2" name="devicestatus" value = "2" <?php echo $value['status'] == 2 ? 'checked' : ''  ?>>
                            <label>Mở khi độ ẩm</label>
                            <input type="text" name = "humidity" value = "<?php echo $value['h'] ?: 0 ?>">
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="radio radio-replace color-green">
                            <input type="radio" id="rd-1" name="devicestatus" value = "3" <?php echo $value['status'] == 3 ? 'checked' : ''  ?>>
                            <label><?php echo ($list_device_status[$key] == 1) ? 'Tắt' : 'Mở'; ?> sau&emsp;       </label>
                            <input type="text" name = "timer" value = "<?php echo $value['timer'] ?: 0 ?>">
                            <label>Phút </label>
                        </div>

                        <div class="radio radio-replace color-green">
                            <input type="radio" id="rd-2" name="devicestatus" value = "4" <?php echo $value['status'] == 4 ? 'checked' : ''  ?>>
                            <label>Mở từ&emsp;&emsp;</label>
                            <input type="text" name = "day_timer_start" value = "<?php echo $value['day_timer_start'] ?: 0 ?>">
                            <br>
                            <label>&emsp;&emsp;Đến&emsp;&emsp;&emsp;</label> 
                            <input type="text" name = "day_timer_end" value = "<?php echo $value['day_timer_end'] ?: 0 ?>">
                        </div>
                    </div>

                    
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-green btn-icon">
                            Xác nhận
                            <i class="entypo-check"></i>
                    </button>
                </div>
            </form>
            <hr/>
            <?php endforeach; ?>    

        </div>

    </div>

</div>
</div>

