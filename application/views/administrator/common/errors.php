<?php
	if($this->session->flashdata('errors') || $this->session->userdata('errors')){
		$err_msg = $this->session->flashdata('errors') ? $this->session->flashdata('errors') : $this->session->userdata('errors');
?>
	<div class="col-md-12">
		<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert" id="myDiv">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
			<i class="mdi mdi-alert-circle-outline"></i>
				<?php echo $err_msg; ?>
		</div>
	</div>
<?php 
		$this->session->unset_userdata('errors');
	} 
	elseif($this->session->flashdata('success') || $this->session->userdata('success')) {
		$succ_msg = $this->session->flashdata('success') ? $this->session->flashdata('success') : $this->session->userdata('success');
?>
	<div class="col-md-12">
		<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert" id="myDiv">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
			<i class="mdi mdi-check-all"></i>
				<?php echo $succ_msg; ?>
		</div>
	</div>
<?php 
		$this->session->unset_userdata('success');
	}
	elseif($this->session->flashdata('img_err') || $this->session->userdata('img_err')) {
		$img_msg = $this->session->flashdata('img_err') ? $this->session->flashdata('img_err') : $this->session->userdata('img_err');
?>
	<div class="col-md-12">
		<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert" id="myDiv">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
			<i class="mdi mdi-alert-circle-outline"></i>
				<?php echo $img_msg; ?>
		</div>
	</div>
<?php 
		$this->session->unset_userdata('img_err');
	}
?>
<script type="text/javascript">
    setTimeout(function(){
        $('#myDiv').fadeOut(500);
    }, 5000);
</script>