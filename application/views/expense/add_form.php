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
	    Dashboard
	    <small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
	    <li class="active"><a href="<?php echo base_url() ?>expense/add_expense">Expense</a></li>
	</ol>
    </section>
    <br/>

    <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 
	<?php $this->load->view('common/error_show') ?>
	<h2> Add New Expense </h2><hr>


	<?php
	echo form_open('');
	?>
	
	
	<div class="row">
	    <div class="col-md-12">
		<div class="pull-right">
		<div class="form-group">
		    <label>Expense Type</label>
		    <select class="form-control" id="expense_type_id" name="expense_type_id" >
			<option value="all">Select One Option</option>
			<option value="First">First Option</option>
			<option value="Second">Second Option</option>
			<option value="Third">Third Option</option>
		    </select>
		</div>
		</div>
	    </div>
	</div>
	
	
	<div class="row">
	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label> যাতায়াত  খরচ </label>
		    <?php
		    $form_input = array(
			'name' => 'journey_cost',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'যাতায়াত  খরচ'
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div>

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">মোবাইল খরচ</label>
		    <?php
		    $form_input = array(
			'name' => 'mobile_cost',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'মোবাইল খরচ'
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">আপ্যয়ন খরচ </label>
		    <?php
		    $form_input = array(
			'name' => 'entertainment_cost',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'আপ্যয়ন খরচ '
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">প্যাকেট উত্তোলন </label>
		    <?php
		    $form_input = array(
			'name' => 'packet_lift',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'প্যাকেট উত্তোলন ',
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">অন্যান্য খরচ </label>
		    <?php
		    $form_input = array(
			'name' => 'other_cost',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'অন্যান্য খরচ '
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div>

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">মোট</label>
		    <?php
		    $form_input = array(
			'name' => 'total',
			'class' => 'form-control ',
//                'value' => $name, 
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div>
	</div>

	<div class="row">

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label>  যাত্রা শুরুর কি: মি: </label>
		    <?php
		    $form_input = array(
			'name' => 'start_journey',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => ' যাত্রা শুরু কি: মি:'
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div>

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">যাত্রা শেষের কি: মি: </label>
		    <?php
		    $form_input = array(
			'name' => 'end_journey',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'যাত্রা শেষের কি: মি: '
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">মোট ব্যবহত কি: মি: </label>
		    <?php
		    $form_input = array(
			'name' => 'total_journey_time',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'মোট ব্যবহত কি: মি: '
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">ব্যক্তিগত ব্যবহার</label>
		    <?php
		    $form_input = array(
			'name' => 'personal_use',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'ব্যক্তিগত ব্যবহার',
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">অফিস  কাজে ব্যবহার</label>
		    <?php
		    $form_input = array(
			'name' => 'office_work',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'অফিসের কাজে ব্যবহার'
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div>

	    <div class="col-md-2 col-sm-3">
		<div class="form-group">
		    <label for="">কি: মি: রেট </label>
		    <?php
		    $form_input = array(
			'name' => 'kilomitter_rate',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'কি: মি: রেট '
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div>

	</div>

	<div class="row">

	    <div class="col-md-3 col-sm-4">
		<div class="form-group">

		    <label for="">তারিখ </label>
		    <?php
		    $form_input = array(
			'name' => 'date',
			'type' => 'text',
			'class' => 'datepicker form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'yyyy-mm-dd'
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-3 col-sm-4">
		<div class="form-group">
		    <label for="">ব্যবহত কি: মি: </label>
		    <?php
		    $form_input = array(
			'name' => 'use_kilomitter',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'ব্যবহত কি: মি: '
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 

	    <div class="col-md-3 col-sm-4">
		<div class="form-group">
		    <label for="">যাতায়াত  খরচ </label>
		    <?php
		    $form_input = array(
			'name' => 'journey_cost',
			'class' => 'form-control ',
//                'value' => $name, 
			'required' => 'required',
			'placeholder' => 'যাতায়াত  খরচ ',
		    );
		    echo form_input($form_input);
		    ?>
		</div>
	    </div> 
	</div>


	<div class="col-md-12"><br>
	    <div class="pull-right"> 

		<?php
		$form_input = array(
		    'name' => 'submit',
		    'class' => 'btn btn-lg btn-success ',
		    'value' => 'Add Expense'
		);

		echo form_submit($form_input);
		echo form_close()
		?> 

	    </div> 
	</div>
    </div>

    <!-- End  Working area  -->

    <script>


        $(document).ready(function () {
            $('.datepicker').datepicker({
                KeyboardNavigation: false,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                autoclose: true

            });
        })
    </script>
    <?php $this->load->view('common/footer') ?>

