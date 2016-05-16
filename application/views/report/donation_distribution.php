<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');
?> 

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top:-10px!important;">
	<h1>
	    Reports : 
	    <small> Donation Distribution Report  </small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
	    <li><a href="<?php echo base_url() ?>report"><i class="fa "></i> Report</a></li>
	    <li class="active"><a href="#">Donation Distribution Report  </a></li>
	</ol>
    </section>
    <br/>


    <!--     Start Working area  -->


    <div class="col-md-12 main-mid-area">
	<?php $this->load->view('common/error_show') ?>
	
	<div class="row">
	    <?php echo form_open() ?>
	    <label class="col-md-3">Start Date
		<input type="text" class="datepicker form-control" id="sdate" name="sdate" placeholder="dd-mm-yyyy" value="" required="" />
	    </label>
	    <label class="col-md-3">End Date
		<input type="text" class="datepicker form-control" id="edate" name="edate" placeholder="dd-mm-yyyy" value="" required="" />
	    </label>
	    <label class="col-md-3">Division
		<select class="form-control" id="division_id" name="division_id" required="">
		    <option value="all">All Division</option>
		</select>
	    </label>
	    <label class="col-md-3">Jonal
		<select class="form-control" id="jonal_id" name="jonal_id" required="">
		    <option value="all">All Jonal</option>
		</select>
	    </label>
	    <label class="col-md-3">District
		<select class="form-control" id="district_id" name="district_id" required="">
		    <option value="all">All District</option>
		</select>
	    </label>
	    <label class="col-md-3">Thana
		<select class="form-control" id="thana_id" name="thana_id" required="">
		    <option value="all">All Thana</option>
		</select>
	    </label>
	    <label class="col-md-3">College
		<select class="form-control" id="college_id" name="college_id" required="">
		    <option value="all">All College</option>
		</select>
	    </label>
	    <label class="col-md-2">
		&nbsp;
		<input type="submit" name="sumbit" value="Search" class="btn btn-primary form-control" />
	    </label>
	    <br/>
	    <br/>
	    <?php echo form_close() ?>
	</div>
	<div class="text-center">
	    <h3> Chalan/Shipment Report </h3>
	    <div> From  to  </div>
	    <h4> Jonal :   </h4>
	</div>
	<div class="clearfix"></div>

	<br/> 
	<br/> 
	<br/> 
	<br/> 
	<div class="alert alert-danger text-center">
	    No data Found! 
	</div>
    </div>

    <!-- End  Working area -->




    <?php $this->load->view('common/footer') ?>