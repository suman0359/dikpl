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
        <h1>Dashboard<small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>settings/permission_content"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url() ?>settings/permission_content">Permission</a></li>
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>

        <div class="searchbar " >
            <div class="col-md-8"  >
            </div>

            <div class="pull-right"> 
                <a href="<?php echo base_url() ?>settings/permission_content/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Permission Content</a> 
            </div>
            <div class="clearfix"></div>
        </div> 


        <div class="col-md-12">

            <table class="table table-bordered table-hover ">
                <tr>
                    <th id="action_btn_align">#</th>
                    <th id="action_btn_align">Module Title</th>
                    <th id="action_btn_align">Module name</th>
                    <th id="action_btn_align">Module Action </th>
                    
                    <th id="action_btn_align">Action</th>

                </tr>
                <?php 
                $serial = 1;
                foreach ($permission_content_list as $value){ ?>                    
                <tr>
                    <td><?php echo $serial; ?></td>
                    <td><?php echo $value->module_title; ?></td>
                    <td><?php echo $value->module; ?></td>
                    <td><?php echo $value->m_action; ?></td>
                    <td>     
                        <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>settings/permission_content/edit/<?php echo $value->id; ?>">
                        <i class="fa fa-pencil-square-o" ></i> Edit </a>
                        
                        <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url(); ?>settings/permission_content/delete/<?php echo $value->id;?>">
                        <i class="fa fa-pencil-square-o" ></i> Delete </a>
                    </td>   
                </tr>
                <?php $serial++; } ?>


            </table> 
        </div>

        <div>         
            <?php //echo $this->pagination->create_links();
            ?>  
        </div>

        <!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>