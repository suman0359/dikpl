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
                <li class="active"><a href="<?php echo base_url()?>user">Subject</a></li>
            </ol>
        </section>
    <br/>

    
    


<!-- Start Working area --> 
<div class="col-md-8 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
   
    <div class="searchbar " >
    <div class="col-md-8"  >
    </div>
        
        <div class="pull-right"> 
          <a href="<?php echo base_url()?>subject/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add subject</a> 
        </div>
        <div class="clearfix"></div>
   </div> 
    
    <div>
        
    <table class="table table-bordered table-hover ">
        <tr>
            <th id="action_btn_align">SL</th>
            <th id="action_btn_align">Subject Name</th>
            <th id="action_btn_align">Department Name</th>
            <th id="action_btn_align">Subject Code</th>
            <th id="action_btn_align">Action</th>
           
         </tr>
   
    
                     
         
         <?php 
          //  var_dump($company_list) ; 
          foreach ($subject_list as $subject){
              $subject_id = $subject['id'];
              $this->load->model('join_model'); 
              $department_list = $this->join_model->get_all_department_where_subject_info( $subject_id);

              
         ?>
         
         
      <tr id="action_btn_align">
          <td> <?php echo $subject['id'] ?></td>
          <td> <?php echo $subject['name'] ?></td>
          <td> 
              <?php if ($department_list) {
                            foreach ($department_list as $value) {
                                // print_r($value);
                                echo "<div style=\"background: #9E9E9E; padding: 3px; margin-bottom: 3px;\">".$value->department_name."</div>" ;
                            }
                            
                        } ?>
          </td>
          <td> <?php echo $subject['subject_code'] ?></td>
         
          <td>     
                <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>subject/edit/<?php echo $subject['id'] ?>">
                <i class="fa fa-pencil-square-o" ></i> Edit </a>
                <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url(); ?>subject/delete/<?php echo $subject['id'] ?>">
                <i class="fa fa-pencil-square-o" ></i> Delete </a>
          </td>     
       </tr>
      <?php } ?>
            
     </table> 
</div>

<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>