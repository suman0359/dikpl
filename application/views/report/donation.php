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

    <div class="col-md-12 main-mid-area">
	<?php echo form_open();?>

	<div class="col-md-3">
	    <label> 
		প্রতিষ্ঠানের নাম 
		
		<select class="form-control col-md-1" id="college_id" name="college_id" required>
		    <option value="all"> সব প্রতিষ্ঠান   </option>
		    <?php foreach ($college_list as $value) {?>
		    <option value="<?php echo $value['id'];?>"> <?php echo $value['name'];?></option>
		    <?php }?>
		</select>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		শিক্ষকের নাম 
		<select class="form-control col-md-1" id="teacher_id" name="teacher_id" required>
		    <option value="all"> সব শিক্ষক   </option>
		    
		</select>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		বিষয়ের নাম 
		<select class="form-control col-md-1" id="department_id" name="department_id" required>
		    <option value="all"> সব বিষয়   </option>
		</select>
	    </label>
	</div>
	<div class="col-md-3">
	    <label> 
		শ্রেনীর নাম 
		<select class="form-control col-md-1" id="class_id" name="class_id" required>
		    <option value="all"> সব শ্রেণী  </option>
		</select>
	    </label>
	</div>
<?php echo form_close();?>
    </div>

    <div class="col-md-12 main-mid-area"><br><br>
<?php echo form_open();?>
	<div class="col-md-3">
	    <label>ছাত্র ছাত্রীর সংখ্যা</label>
	    <input type="number" class="form-control col-md-1" id="student_qunatity" name="student_qunatity" required />
	</div>
	<div class="col-md-3">
	    <label>সম্ভাব্য বই চলবে </label>
	    <input type="number" class="form-control col-md-1" id="possible_book" name="possible_book" required />
	</div>
	<div class="col-md-3">
	    <label> 
		 বইয়ের নাম 
		<select class="form-control col-md-1" id="book_id" name="book_id" required>
		    <option value="all"> সব বই  </option>
		    <?php foreach ($book_list as $value) {?>
		    <option value="<?php echo $value['id'];?>"> <?php echo $value['book_name'];?></option>
		 <?php }?>
		</select>
	    </label>
	</div>
	<div class="col-md-3">
	    <label>টাকার পরিমান </label>
	    <input type="number" class="form-control col-md-1" id="money_amount" name="money_amount" required />
	</div>
	<div class="col-md-12">
	    <br>
	    <input type="submit" name="btn" class="btn btn-success pull-right" value="Submit Donation" />
	</div>
<?php echo form_close();?>
    </div>


    <script>
	$(document).ready(function(){
        $(".main-mid-area").on('change', '#college_id', function(){
	    var college_id = $(this).val();
	   console.log(college_id);
	   $.ajax({
	       url: "<?php echo base_url(); ?>index.php/home/getteacher/" + college_id, 
	       beforSend: function(xhr){
		   xhr.overrideMimeType("Text/plain; charset=x-user-defined");
		   $("#teacher_id").html("<optoin>Loading...</option>");
	       }
	   })
		   .done(function(data){
		       $("#teacher_id").html("<option value=''>Select Teacher Name..</option>");
		       data=JSON.parse(data);
		       $.each(data, function(key, val){
			   $("#teacher_id").append("<option value='"+val.id+"'>"+ val.name +"</option>");
		       })
		   })
	})
    })
    
    
    $(document).ready(function(){
	$(".main-mid-area").on('change', '#teacher_id', function(){
	    var teacher_id = $(this).val();
	    console.log(teacher_id);
	    $.ajax({
		url: "<?php echo base_url();?>index.php/home/getdepartmentidbyid/" + teacher_id,
		beforeSend: function(xhr){
		    xhr.overrideMimeType("Text/plain; charset=x-user-defined");
		    $("#department_id").html("<option>Loading...</option>");
		}
	    })
		    .done(function(data){
			$("#department_id").html("<option value=''>Select Department Name..</option>");
			data=JSON.parse(data);
			$.each(data, function(key, val){
			    $("#department_id").append("<option value='"+val.id+"'>" + val.name +"</option>");
			    
			})
		    })
	})
    })
        
    </script>
    
    <?php $this->load->view('common/footer') ?>