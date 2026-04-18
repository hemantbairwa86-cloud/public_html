<?php
	if($this->session->flashdata('errors')){
?>
	<div class="alert alert-danger" role="alert">
                  <?php echo  $this->session->flashdata('errors'); ?>
                </div>
<?php 
	} 
	if($this->session->flashdata('success')){
?>
	<div class="alert alert-success" role="alert">
                  <?php echo  $this->session->flashdata('success'); ?>
    </div>
<?php 
	} 
?>
<script type="text/javascript">
    setTimeout(function(){
        $('#myDiv').fadeOut(500);
    }, 5000);
</script>