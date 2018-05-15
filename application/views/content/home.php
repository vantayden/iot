
        <h3>Quản lý thiết bị của bạn</h3>
        
                    <table class="table table-bordered table-striped datatable" id="table-2">
                        <thead>
                            <tr>
                                <th>Id thiết bị</th>
                                <th>Tên thiết bị</th>
                                <th>Điều khiển</th>
                            </tr>
                        </thead>
                                <tbody>
                            <?php
 foreach($list_info_devices as $device): ?>
                            <tr>
                                <td><?php echo $device['m_id']?></td>
                                <td><?php echo $device['m_name']?></td>
                                <td>
                                    <a href="<?php echo "{$device['prefix']}/setup/{$device['m_id']}" ?>" class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i> Cài đặt
                                    </a>
        
                                    <a href="<?php echo "{$device['prefix']}/control/{$device['m_id']}" ?>" class="btn btn-info btn-sm btn-icon icon-left">
                                        <i class="entypo-info"></i> Điều khiển
                                    </a>

                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        <i class="entypo-cancel"></i> Vô hiệu hóa
                                    </a>
        
                                </td>
                            </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
        </div>
