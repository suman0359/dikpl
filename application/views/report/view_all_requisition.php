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
            Donations 

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <!--<li><a href="<?php echo base_url() ?>donation"><i class="fa "></i> Report</a></li>-->
        </ol>
    </section>
    <br/>
    <?php echo form_open(); ?>
    <div class="col-md-12 main-mid-area">

	<div class="col-md-3">
	    <label> 
		প্রতিষ্ঠানের নাম 
		<div class="form-group">
		    <input disabled="" type="text"  class="form-control" value="<?php echo $college_id; ?>" />
		</div>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		শিক্ষকের নাম 
		<div class="form-group">
		    <input disabled="" type="text"  class="form-control" value="<?php echo $teacher_id; ?>" />
		</div>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		বিষয়ের নাম 
		<div class="form-group">
		    <input disabled="" type="text" class="form-control" value="<?php echo $department_id; ?>" />
		</div>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		শ্রেনীর নাম 
		<div class="form-group">
		    <input disabled="" type="text" class="form-control" value="<?php echo $class_id; ?>" />
		</div>
	    </label>
	</div>

    </div>

    <div class="col-md-12 main-mid-area"><br><br>

	<div class="col-md-3">
	    <label>ছাত্র ছাত্রীর সংখ্যা</label>
	    <input type="number" class="form-control col-md-1" value="<?php echo $student_quantity; ?>" id="student_quantity" name="student_quantity" required />
	</div>
	<div class="col-md-3">
	    <label>সম্ভাব্য বই চলবে </label>
	    <input  type="number" class="form-control col-md-1" id="possible_book" value="<?php echo $possible_book; ?>" name="possible_book" required />
	</div>
	<div class="col-md-3">
	    <label> 
		বইয়ের নাম 
		<div class="form-group">
		    <input disabled="" type="text" class="form-control" value="<?php echo $book_id; ?>" />
		</div>
	    </label>
	</div>
	<div class="col-md-3">
	    <label>টাকার পরিমান </label>
	    <input type="number" class="form-control col-md-1" id="money_amount" name="money_amount" value="<?php echo $money_amount; ?>" required />
	</div>

    </div>
    <div class="col-md-12 main-mid-area">
	<div class="form-group">
	    <label for="comment">Comment</label>
	    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
	</div>
    </div>

    <div class="col-md-12">
	<div class="col-md-6">
	    <label class="radio-inline">
		<input type="radio" name="optradio">  Pending
	    </label>
	    <label class="radio-inline">
		<input type="radio" name="optradio"> Accepted
	    </label>
	    <label class="radio-inline">
		<input type="radio" name="optradio"> Decline
	    </label>
	</div>

	<br>
	<input type="submit" name="btn" class="btn btn-success pull-right" value="Submit Distribution" />
    </div>

    <?php echo form_close(); ?>

    <?php $this->load->view('common/footer') ?>