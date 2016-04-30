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
                <li><a href="<?php echo base_url()?>home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active"><a href="<?php echo base_url()?>books">Books</a></li>
                <li class="active"><a href="<?php echo base_url()?>books/add">Add Books</a></li>
            </ol>
        </section>
    <br/>

    <!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
    <h2> Add New Books </h2>
    

    <?php 
    echo form_open('') ; 
    ?>

<div class="row">
	<div class="col-md-2">
		<div class="form-group">
		    <label> Books Name </label>
		    <?php 
		    $form_input = array(
		        'name' => 'name',
		        'class' =>'form-control ', 
		        'value' => $name, 
		        'required' => 'required',
		        'placeholder'=>'Book Name',
		        'size' => '50'
		    );
		    echo form_input($form_input); 
		    ?>
		</div>
	</div>

    <div class="col-md-2">
        <div class="form-group">
            <label>Comapany Name </label>
            
            <select name="company_id" class="form-group form-control" id="company_id">
                <option value="0" >select Company</option>
                <option <?php if($company_id==1) echo "selected"; ?> value="1">Text Book</option>
                <option <?php if($company_id==2) echo "selected"; ?>value="2">Guide Book</option>
            </select>
            
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="className">Class Name</label>
            <select name="class_id" id="class_id" class="form-group form-control">
                <option value="">Select Class </option>
                <?php 
                    foreach ($class_list as $value) { ?>
                        <option <?php if($class_id==$value['id']) echo "selected"; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="className">Subject Name</label>
            <select name="subject_id" id="subject_id" class="form-control">
                <option value="">Select subject </option>
                <?php 
                    foreach ($subject_list as $value) { ?>
                        <option <?php if($subject_id==$value['id']) echo "selected"; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="className">Department Name</label>
            <select name="department_id" id="department_id" class="form-control">
                <option value="">Select Department </option>
                <?php 
                    foreach ($department_list as $value) { ?>
                        <option <?php if($department_id==$value['id']) echo "selected"; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label> Book Rate </label>
            <?php 
            $form_input = array(
                'type' => 'number',
                'name' => 'rate',
                'class' =>'form-control ', 
                'value' => $book_rate, 
                'required' => 'required',
                'placeholder'=>'Book Rate',
                'size' => '50'
            );
            echo form_input($form_input); 
            ?>
        </div>
    </div>


		<div class="col-md-12"><br>
		<div class="pull-right"> 

    <?php 
    $form_input = array(
        'name' => 'submit',
        'class' =>'btn btn-lg btn-success ', 
        'value' => 'Add Books'
    );

    echo form_submit($form_input); 
    echo form_close() 
    ?> 

   </div> 
	</div>
</div>





<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>