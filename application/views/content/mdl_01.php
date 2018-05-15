<div class="row">
<div class="col-md-12">
	
	<div class="panel panel-primary" data-collapsed="0">
	
		<div class="panel-heading">
			<div class="panel-title">
				<?php echo "Tên của modules" ?>
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

				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo "Bóng đèn" ?></label>
					
					<div class="col-sm-5">
					
					<div class="bs-example">
							<div class="make-switch switch-large has-switch" >
								<div class="switch-animate switch-on" onclick="myFunction.call(this)" id = "<?php ?>">
									<!-- <input type="checkbox"> -->
									<span class="switch-left switch-large">ON</span><label class="switch-large">&nbsp;</label><span class="switch-right switch-large">OFF</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			
		</div>
		
	</div>

</div>
</div>
<script>
var myFunction = function() {
	// var el = document.querySelector(this);
	alert(<?php echo "oke" ; ?>);
	// console.log(this);
	if($(this).hasClass("switch-on")){
		this.classList.remove('switch-on');
		this.classList.add('switch-off');
	}else{
		this.classList.remove('switch-off');
		this.classList.add('switch-on');
	}


}
</script>