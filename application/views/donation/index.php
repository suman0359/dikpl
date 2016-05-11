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
            Donations 

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <!--<li><a href="<?php echo base_url() ?>donation"><i class="fa "></i> Report</a></li>-->
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area">


        <div class="col-md-12">


            <table class="table table-bordered table-hover ">

		<tr>
		    <th style="text-align: center">#</th>
		    <th style="text-align: center">প্রতিষ্ঠানের নাম</th>
		    <th style="text-align: center">শিক্ষকের নাম</th>
		    <th style="text-align: center">বিষয়ের নাম</th>
		    <th style="text-align: center">শ্রেনীর নাম</th>
		    <th>
			ছাত্র ছাত্রীর সংখ্যা</th>
		    <th style="text-align: center">সম্ভাব্য বই চলবে</th>
		    <th style="text-align: center">বইয়ের নাম</th>
		    <th style="text-align: center">টাকার পরিমান</th>
		    <th style="text-align: center">Action</th>
		</tr>

		<tbody>
		    <?php
		    $serialNo = 1;
		    foreach ($donation_list as $value) {
			?>
    		    <tr align="center">

    			<td><?php echo $serialNo; ?></td>
    			<td><?php echo $value['college_name']; ?></td>
    			<td><?php echo $value['teacher_name']; ?></td>
    			<td><?php echo $value['department_name']; ?></td>
    			<td><?php echo $value['class_name']; ?></td>
    			<td><?php echo $value['student_quantity']; ?></td>
    			<td><?php echo $value['possible_book']; ?></td>
    			<td><?php echo $value['book_name']; ?></td>
    			<td><?php echo $value['money_amount']; ?></td>
    			<td>
    			    <a href="<?php echo base_url(); ?>donation/edit/<?php echo $value['id'] ?>" class="btn btn-primary btn-flat"><i class="fa fa-pencil-square-o" ></i> Edit</a>
    			    <a href="<?php echo base_url(); ?>donation/delete/<?php echo $value['id'] ?>" onclick="return confirm('Are you sure want to delete');" class="btn btn-primary btn-flat"><i class="fa fa-pencil-square-o" ></i>Delete</a>
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