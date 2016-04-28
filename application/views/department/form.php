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
                <li class="active"><a href="<?php echo base_url()?>department">Department</a></li>
                <li class="active"><a href="#">Add Department</a></li>
            </ol>
        </section>
    <br/>

    <!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
    <h2> Add New Department </h2>
    

    <?php 
    echo form_open('') ; 
    ?>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label> Department Name </label>
            <?php 
            $form_input = array(
                'name' => 'name',
                'class' =>'form-control ', 
                'value' => $name, 
                'required' => 'required',
                'placeholder'=>'Department Name',
                'size' => '50'
                
            );
            echo form_input($form_input); 
            ?>
        </div>
    </div>
<!-- 
    <div class="col-md-2">
        <div class="form-group">
            <label for="">Class Name</label>
            <select name="class_name" id="class_id" class="form-control">
                <option value="Select Class Name .."></option>
                <?php 
                foreach ($class_list as $value) { ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div> -->

    <div class="col-md-7">
         <!-- Start: Multi Select Start From Here  -->
            <div class="col-md-12">
                 
                <div class="row">
                    <div class="col-xs-5">
                        <label for="ClassName">Select Class Name FROM</label>
                        <select name="from[]" id="search" class="form-control" size="8" multiple="multiple">
                            <?php foreach ($class_list as $value) { ?>
                                <option value="<?php echo $value['id'] ?>">
                                <?php echo $value['name']; ?></option>
                            <?php } ?>
                            <!-- 
                            <option value="2">Item 5</option>
                            <option value="2">Item 2</option>
                            <option value="2">Item 4</option>
                            <option value="3">Item 3</option> -->
                        </select>
                    </div>
                    
                    <div class="col-xs-2">
                        <br><br><br>
                        <button type="button" id="search_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                        <button type="button" id="search_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        <button type="button" id="search_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                        <button type="button" id="search_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                    </div>
                   
                    <div class="col-xs-5">
                        <label for="ClassName">Select Class Name To</label>
                        <select name="class_list[]" id="search_to" class="form-control" size="8" multiple="multiple">
                            <?php foreach ($class_info as $value) { ?>
                             <option value="<?php echo $value->class_id; ?>"><?php echo $value->class_name; ?></option>
                            <?php } ?>
                            

                        </select>
                    </div>
                </div>
                

                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $('#search').multiselect({
                            search: {
                                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                            }
                        });
                    });
                </script>
                
            </div>
            <!-- end : MultiSelect Bos -->
    </div>

    
    
    <div class="col-md-2"><br>
        <div class="pull-right"> 

    <?php 
    $form_input = array(
        'name' => 'submit',
        'class' =>'btn btn-lg btn-success ', 
        'value' => 'Add Department'
       
    );

    echo form_submit($form_input); 
    echo form_close() 
    ?> 

   </div> 
    </div>
</div>

<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>

