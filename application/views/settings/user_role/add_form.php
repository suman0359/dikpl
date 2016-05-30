<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('settings/common/sidebar');
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
            <li class="active"><a href="<?php echo base_url() ?>settings/user_role">District</a></li>
            <li class="active"><a href="<?php echo base_url() ?>settings/user_role/add">Add District</a></li>
        </ol>
    </section>
    <br/>

    <!-- Start Working area --> 
    <div class="col-md-9 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>
        <h2> Add New Role</h2>


        <?php
        echo form_open('');
        ?>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    
                    <?php
                    echo form_label('Role Name', 'role_name');
                    $form_input = array(
                        'name' => 'role_name',
                        'class' => 'form-control ',
                        'value' => $role_name,
                        'required' => 'required',
                        'placeholder' => 'Role Name',
                        'size' => '50'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>



            <div class="col-md-6">
                <div class="form-group">
                    
                    <?php
                    echo form_label('Name', 'name');
                    $form_input = array(
                        'name' => 'name',
                        'class' => 'form-control ',
                        'value' => $name,
                        'required' => 'required',
                        'placeholder' => 'Name',
                        'size' => '50'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    
                    <?php
                    echo form_label('Role Value', 'role_value');
                    $form_input = array(
                        'name' => 'value',
                        'class' => 'form-control ',
                        'value' => $value,
                        'required' => 'required',
                        'placeholder' => 'Role Value',
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
                        'class' => 'btn btn-lg btn-success ',
                        'value' => $submit
                    );

                    echo form_submit($form_input);
                    echo form_close()
                    ?> 

                </div> 
            </div>
        </div>

        <!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>

