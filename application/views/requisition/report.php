  

<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top:-10px!important;">
	<h1>
	    Requisition 
	    <small>All Requisition </small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
	    <li class="active"><a href="#">Reports  </a></li>
	</ol>
    </section>
    <br/>



    <div class="col-md-12 home-page">
	<div class="col-md-3 col-sm-4 home-icon" > 
	    <a class=" btn-primary   btn-lg btn-block text-center " href="<?php echo base_url(); ?>report/requisition"> 
		<i class="fa fa-user fa-3x"></i>  <br/>
		Book Requisition Request  </a>
	</div>


	
	<div class="col-md-3 col-sm-4 home-icon" > 
	    <a class=" btn-primary   btn-lg btn-block text-center " href="<?php echo base_url(); ?>report/donation_requisition"> 
		<i class="fa fa-user fa-3x"></i>  <br/>
		Donation Requisition Request</a>
	</div>
	


    </div>


    <?php
    $this->load->view('common/footer');
    ?>








