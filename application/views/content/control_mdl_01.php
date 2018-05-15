<!-- <?php echo $ctrler ?> -->
<div class="row">
<div class="col-md-12">
	
	<div class="panel panel-primary" data-collapsed="0">
	
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo $module_info["name"]; ?>
			</div>
			
			<div class="panel-options">
				<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
				<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
				<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
				<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
			</div>
		</div>
		
		<div class="panel-body">
			
			<form role="form" class="form-horizontal form-groups-bordered">

            <!-- get list -->
            <?php foreach ($list_devices as $key => $value) :  ?>
				<div class="form-group">
					<label class="col-sm-2 control-label"><?php echo $value['name'] ?></label>
					<div class="col-sm-6">
					    <div class="bs-example">
							<div class="make-switch switch-large has-switch" >
								<div class="switch-animate <?php echo $value['status'] == 0 ? "switch-off" : "switch-on"; ?>" onclick="changeStatus.call(this)" id = "<?php echo $key;?>">
									<!-- <input type="checkbox"> -->
									<span class="switch-left switch-large">ON</span><label class="switch-large">&nbsp;</label><span class="switch-right switch-large">OFF</span>
								</div>
							</div>
						</div>
					</div>
				</div>
            <?php endforeach; ?>
                


			</form>
			
		</div>
		
	</div>

</div>
</div>
<script>
var changeStatus = function() {
	// var el = document.querySelector(this);
    console.log($(this).context.id);
    $.ajax({
                    url : "<?php echo base_url(); ?>mdl_01/change_status",
                    type : "post",
					dataType:"text",
					context : this,
                    data : {
                         module_id : "<?php echo $module_info['id'] ?>",
                         device_name :  $(this).context.id,
                         device_status : $(this).hasClass("switch-on") ? 1 : 0,
                    },
                    success : function (result){
                        if(result == 1){
                            this.classList.remove('switch-off');
		                    this.classList.add('switch-on');
                        } else{
                            this.classList.remove('switch-on');
		                    this.classList.add('switch-off');
						}
						// alert(result);
                    }
                });
    // alert("<?php echo "oke"; ?>");
	// if($(this).hasClass("switch-on")){
	// 	this.classList.remove('switch-on');
	// 	this.classList.add('switch-off');
	// }else{
	// 	this.classList.remove('switch-off');
	// 	this.classList.add('switch-on');
	// }


}
</script>