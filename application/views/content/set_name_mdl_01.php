
            <div class="row">
              
                <div class="col-md-12">

                    <div class="panel panel-primary" data-collapsed="0">

                        <div class="panel-heading">
                            <div class="panel-title">
                                Default Form Inputs
                            </div>

                            <div class="panel-options">
                                <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                                <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                            </div>
                        </div>

                        <div class="panel-body">

                            <form role="form" class="form-horizontal form-groups-bordered" method = "post" action ="">
                            <?php foreach($list_device_name as $id => $name): ?>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label"><b><?php echo $name ?>     <i class="entypo-right-bold"></i></b></label>

                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="field-1" name ="<?php echo $id;?>" value ="<?php echo $name;?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>   
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <button type="submit" class="btn btn-default">Cập nhật</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
