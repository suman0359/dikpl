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
            <li class="active"><a href="<?php echo base_url() ?>jonal">College</a></li>
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area"> 
	<?php $this->load->view('common/error_show') ?>

        <form action="<?php echo base_url() . "teachers/search/"; ?>" method="POST" >
	    <div class="col-md-8">
		<div class="search_bar">
		    <div class="form-group">

			<input type="search" name="search" placeholder="Search By Teachers Name" class="form-control">


		    </div>
		</div>
	    </div>

	    <div class="col-md-4">
		<div class="form-group">
		    <input type="submit" value="Search" class="btn btn-primary">

		    <div class="pull-right"> 
			<a href="<?php echo base_url() ?>teachers/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Teacher</a> 
		    </div>
		    <div class="clearfix"></div>
		</div>



	    </div>

	</form>


        <div class="col-md-12">

            <table class="table table-bordered table-hover ">
                <tr>
                    <th id="action_btn_align">SL</th>
                    <th id="action_btn_align">শিক্ষকের নাম </th>
                    <th id="action_btn_align">পদবি</th>
                    <th id="action_btn_align">মোবাইল</th>
                    <th id="action_btn_align">বিষয় / বিভাগ</th>
                    <th id="action_btn_align">কলেজের নাম  </th>
                    <th id="action_btn_align">Division Name </th>
                    <th id="action_btn_align">Thana Name</th>
                    <th id="action_btn_align">Action</th>

                </tr>



		<?php
		//var_dump($college_list) ; 
		$serialNo = $this->uri->segment(3);
		if($serialNo==FALSE)$serialNo = 1;
        else $serialNo +=1;
		
		foreach ($teachers_list as $teachers) {?>


    		<tr id="action_btn_align">
    		    <td> <?php echo $serialNo; ?></td>
    		    <td> <?php echo $teachers['teacher_name'] ?></td>
    		    <td> <?php echo $teachers['designation'] ?></td>
    		    <td> <?php echo $teachers['phone'] ?></td>
    		    <td> <?php echo $teachers['department_name']; ?></td>
    		    <td> <?php echo $teachers['college_name']; ?></td>
    		    <td> <?php echo $teachers['district_name']; ?></td>
    		    <td> <?php echo $teachers['thana_name']; ?></td>
    		    <td>     
    			<a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>teachers/edit/<?php echo $teachers['teacher_id'] ?>">
                                <i class="fa fa-pencil-square-o" ></i> Edit </a>
    			<a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url(); ?>teachers/delete/<?php echo $teachers['teacher_id'] ?>">
                                <i class="fa fa-pencil-square-o" ></i> Delete </a>
    		    </td>     
    		</tr>
		<?php $serialNo++;} ?>

            </table> 
        </div>

        <div>         
	    <?php echo $this->pagination->create_links();
	    ?>  
        </div>

        <!-- End  Working area --> 
	<?php $this->load->view('common/footer') ?>