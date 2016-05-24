<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
?> 

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top:-10px!important;">
        <h1>
            Distribution Reports 

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
	    <li><a href="<?php echo base_url() ?>report/search_distribution_report/"><i class="fa fa-home"></i> Distribution Report</a></li>
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area">
	<form action="<?php echo base_url() . "report/search_distribution_report/"; ?>" method="POST" >
	    <div class="col-md-8">
		<div class="search_bar">
		    <div class="form-group">
			<input type="search" name="search" placeholder="Search MPO name" class="form-control">
		    </div>
		</div>
	    </div>

	    <div class="col-md-4">
		<div class="form-group">
		    <input type="submit" value="Search" class="btn btn-primary">
<!--		    <div class="pull-right"> 
			<a href="<?php echo base_url() ?>report/requisition_report" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> View All</a> 
		    </div>-->
		    <div class="clearfix"></div>
		</div>
	    </div>

	</form>

        <div class="col-md-12">


            <table class="table table-bordered table-hover ">

		<tr>
		    <th style="text-align: center;">#</th>
		    <th style="text-align: center;">তারিখ </th>
		    <?php if ($user_role == 1) { ?>
    		    <th style="text-align: center">এমপিও এর নাম </th>
    		    <th style="text-align: center">Distributor Name</th>
		    <?php } ?>
		    <th style="text-align: center">প্রতিষ্ঠানের নাম</th>
		    <th style="text-align: center">শিক্ষকের নাম</th>
		    <th style="text-align: center">বিষয়ের নাম</th>
		    <th style="text-align: center">শ্রেনীর নাম</th>
		    <th style="text-align: center;">
			ছাত্র ছাত্রীর সংখ্যা</th>
		    <th style="text-align: center;">সম্ভাব্য বই চলবে</th>
		    <th style="text-align: center">বইয়ের নাম</th>
		    <th style="text-align: center;">টাকার পরিমান</th>
		    <th style="text-align: center;">Comment</th>
		    <th style="text-align: center;">Requistion Status</th>
		</tr>

		<tbody>
		    <?php
		    $serialNo = 1;
		    foreach ($distribution_list as $value) {
			?>
    		    <tr align="center">
    			<td><?php echo $serialNo; ?></td>
    			<td><?php echo $value['date']; ?></td>
    <?php if ($user_role == 1) { ?>
				<td><?php echo $value['requisition_name']; ?></td>
				<td><?php echo $value['distributor_name']; ?></td>
    <?php } ?>
    			<td><?php echo $value['college_name']; ?></td>
    			<td><?php echo $value['teacher_name']; ?></td>
    			<td><?php echo $value['department_name']; ?></td>
    			<td><?php echo $value['class_name']; ?></td>
    			<td><?php echo $value['student_quantity']; ?></td>
    			<td><?php echo $value['possible_book']; ?></td>
    			<td><?php echo $value['book_name']; ?></td>
    			<td><?php echo $value['money_amount']; ?></td>
    			<td><?php echo $value['comment']; ?></td>
    			<td>
				<?php
				if ($value['requisition_status'] == 0)
				    echo 'Pending';
				if ($value['requisition_status'] == 1)
				    echo 'Accepted';
				if ($value['requisition_status'] == 2)
				    echo 'Decline';
				?>
    			</td>
    		    </tr>
			<?php
			$serialNo++;
		    }
		    ?>
		</tbody>
            </table> 
        </div>

    </div>      

    <!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>