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
            <li class="active"><a href="<?php echo base_url() ?>settings/permission_content">District</a></li>
            <li class="active"><a href="<?php echo base_url() ?>settings/permission_content/add">Add District</a></li>
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
                    echo form_label('Permission Module Name', 'module_title');
                    $form_input = array(
                        'name' => 'module_title',
                        'class' => 'form-control ',
                        'value' => $module_title,
                        'required' => 'required',
                        'placeholder' => 'Module Title',
                        'size' => '50'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>



            <div class="col-md-6">
                <div class="form-group">
                    
                    <?php
                    echo form_label('Module Name', 'module_name');
                    $form_input = array(
                        'name' => 'module',
                        'class' => 'form-control ',
                        'value' => $module,
                        'required' => 'required',
                        'placeholder' => 'Module Name',
                        'size' => '50'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    
                    <?php
                    echo form_label('Module Action', 'module_action');
                    $form_input = array(
                        'name' => 'm_action',
                        'class' => 'form-control ',
                        'value' => $m_action,
                        'required' => 'required',
                        'placeholder' => 'Module Action',
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

