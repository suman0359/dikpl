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
	    <li class="active"><a href="<?php echo base_url() ?>donation">Donation</a></li>
            <li class="active"><a href="<?php echo base_url() ?>donation/add">Add Donation</a></li>
        </ol>
    </section>
    <br/>

    <div class="col-md-12 main-mid-area">
	<?php echo form_open(); ?>

	<div class="col-md-3">
	    <label> 
		প্রতিষ্ঠানের নাম 

		<select class="form-control col-md-1" id="college_id" name="college_id" required>
		    <option value="all"> সিলেক্ট প্রতিষ্ঠান   </option>
		    <?php foreach ($college_list as $value) { ?>
    		    <option <?php if ($college_id == $value['id']) echo "selected" ?> value="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?></option>
		    <?php } ?>
		</select>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		শিক্ষকের নাম 
		<select class="form-control col-md-1" id="teacher_id" name="teacher_id" required>
		    <option value="all"> সিলেক্ট শিক্ষক   </option>
		    <?php if ($teacher_id != "") { ?>
    		    <option selected="" value="<?php echo $teacher_id->id; ?>"><?php echo $teacher_id->name; ?></option>
		    <?php } ?>
		</select>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		বিষয়ের নাম 
		<select class="form-control col-md-1" id="department_id" name="department_id" required>
		    <option value="all"> সিলেক্ট বিষয়   </option>
		    <?php if ($department_id != "") { ?>
    		    <option selected="" value="<?php echo $department_id->id; ?>"><?php echo $department_id->name; ?></option>
		    <?php } ?>
		</select>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		শ্রেনীর নাম 
		<select class="form-control col-md-1" id="class_id" name="class_id" required>
		    <option value="all"> সিলেক্ট শ্রেণী  </option>
		    <?php foreach ($class_list as $value) { ?>
    		    <option <?php if ($class_id == $value['id']) echo 'selected' ?> value="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?></option>
		    <?php } ?>
		</select>
	    </label>
	</div>

    </div>

    <div class="col-md-12 main-mid-area"><br><br>

	<div class="col-md-3">
	    <label>ছাত্র ছাত্রীর সংখ্যা</label>
	    <input type="number" class="form-control col-md-1" value="<?php // echo $student_quantity;    ?>" id="student_quantity" name="student_quantity" required />
	</div>

	<div class="col-md-3">
	    <label>Transfer Student Q.</label>
	    <input type="number" class="form-control col-md-1" value="<?php // echo $student_quantity;    ?>" id="transfer_student_quantity" name="transfer_student_quantity" required />
	</div>
	<div class="col-md-3">
	    <label>সম্ভাব্য বই চলবে </label>
	    <input type="number" class="form-control col-md-1" id="possible_book" value="<?php //echo $possible_book;    ?>" name="possible_book" required />
	</div>
	<div class="col-md-3">
	    <label>Transfer Possible Book Q. </label>
	    <input type="number" class="form-control col-md-1" id="transfer_possible_book" value="<?php //echo $possible_book;    ?>" name="transfer_possible_book" required />
	</div>
    </div>

    <div class="col-md-12 main-mid-area"><br><br>
	<div class="col-md-4">
	    <label> 
		বইয়ের নাম 
		<select class="form-control col-md-1" id="book_id" name="book_id" required>
		    <option value="all"> সিলেক্ট বই  </option>
		    <?php if ($book_id != "") { ?>
    		    <option selected="" value="<?php echo $book_id->id; ?>"><?php echo $book_id->book_name; ?></option>
		    <?php } ?>
		</select>
	    </label>
	</div>
	<div class="col-md-4">
	    <label>টাকার পরিমান </label>
	    <input type="number" class="form-control col-md-1" id="money_amount" name="money_amount" value="<?php //echo $money_amount;    ?>" required />
	</div>
	<div class="col-md-4">
	    <label>Transfer Money Amount</label>
	    <input type="number" class="form-control col-md-1" id="transfer_money_amount" name="transfer_money_amount" value="<?php //echo $money_amount;    ?>" required />
	</div>

	<div class="col-md-12">
	    <br>
	    
	    <input type="submit" name="btn" class="btn btn-success pull-right" value="Transfer Donation" />
	   
	</div>
	<?php echo form_close(); ?>
    </div>

    <?php $this->load->view('common/footer') ?>