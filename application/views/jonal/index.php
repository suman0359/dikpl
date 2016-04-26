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
        <h1>Dashboard<small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url() ?>jonal">Jonal</a></li>
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>



<form action="<?php echo base_url()."jonal/search/"; ?>" method="POST" >
   <div class="col-md-8">
     <div class="search_bar">
       <div class="form-group">
        
         <input type="search" name="search" placeholder="Search By Zonal Name" class="form-control">

       </div>
     </div>
   </div>

   <div class="col-md-4">
       <div class="form-group">
         <input type="submit" value="Search" class="btn btn-primary">

        <div class="pull-right"> 
          <a href="<?php echo base_url() ?>jonal/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Jonal</a> 
        </div>
        <div class="clearfix"></div>
       </div>

   </div>

</form>


        <div class="col-md-12 ">

            <table class="table table-bordered table-hover ">

                <tr>
                    <th id="action_btn_align">SL</th>
                    <th id="action_btn_align">Jone/Jonal Name</th>
                    <th id="action_btn_align">Jone/Jonal Head Name</th>
                    <th id="action_btn_align"> District Name </th>
                    <th id="action_btn_align">Division Name</th>
                    <th id="action_btn_align">Action</th>

                </tr>

                <?php

                foreach ($jonal_list as $jonal) {
                    $jonal_id = $jonal['jonal_id'];
                    $district_list = $this->join_model->get_all_district_where_zonal_info($jonal_id);
                    ?>

                    <tr id="action_btn_align">
                        <td> <?php echo $jonal['jonal_id'] ?></td>
                        <td> <?php echo $jonal['jonal_name'] ?></td>
                        <td> <?php echo $jonal['jonal_head_name'] ?> </td>
                        <td> <?php if ($district_list) {
                            foreach ($district_list as $value) {
                                // print_r($value);
                                echo "<div style=\"background: #9E9E9E; padding: 3px; margin-bottom: 3px;\">".$value->district_name."</div>" ;
                            }
                            
                        } ?></td>
                        <td> <?php echo $jonal['division_name']; ?></td>
                        <td>     
                            <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>jonal/edit/<?php echo $jonal['jonal_id'] ?>">
                                <i class="fa fa-pencil-square-o" ></i> Edit </a>
                            <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url(); ?>jonal/delete/<?php echo $jonal['jonal_id'] ?>">
                                <i class="fa fa-minus-circle"></i> Delete</a>
                            <a class="btn btn-warning btn-flat" href="<?php echo base_url(); ?>jonal/jonaluser/<?php echo $jonal['jonal_id'] ?>">
                                <i class="fa fa-user" ></i> See Jonal User  </a>

                        </td>     
                    </tr>
                <?php } ?>

            </table> 
        </div>

        <div>         
            <?php echo $this->pagination->create_links();
            ?>  
        </div>

        <!-- End  Working area --> 
        <?php $this->load->view('common/footer') ?>