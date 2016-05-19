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
            </ol>
        </section>
    <br/>

    
    


<!-- Start Working area --> 
<div class="col-md-9 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
   
    <div class="searchbar " >
    <div class="col-md-8"  >
    </div>
        
        <div class="pull-right"> 
          <a href="<?php echo base_url()?>department/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Department</a> <br><br>
        </div>
        <div class="clearfix"></div>
   </div> 
    
    <div>
        
    <table class="table table-bordered table-hover ">
        <tr>
            <th id="action_btn_align">SL</th>
            <th id="action_btn_align">Department Name</th>
            <th id="action_btn_align">Class Name</th>
            <th id="action_btn_align">Action</th>
           
         </tr>
   
    
                     
         
         <?php 
	 $serialNo = 1;
       		//  var_dump($company_list) ; 
         	foreach ($content_list as $content){
            $department_id =$content['id'];
            
            $class_list = $this->join_model->get_all_class_where_department_info($department_id);
            
         ?>
         
         
      <tr id="action_btn_align">
          <td> <?php echo $serialNo;?></td>
          <td> <?php echo $content['name'] ?></td>
          <td> 
            <?php if ($class_list) {
                            foreach ($class_list as $value) {
                                // print_r($value);
                                echo "<div style=\"background: #9E9E9E; padding: 3px; margin-bottom: 3px;\">".$value->class_name."</div>" ;
                            }
                            
                        } ?>
          </td>
          <td>     
                <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>department/edit/<?php echo $content['id'] ?>">
                <i class="fa fa-pencil-square-o" ></i> Edit </a>
                <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url(); ?>department/delete/<?php echo $content['id'] ?>">
                <i class="fa fa-pencil-square-o" ></i> Delete </a>
          </td>     
       </tr>
      <?php $serialNo++;} ?>
            
     </table> 
</div>

<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>