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
	    Reports : 
	    <small> Expense Report</small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
	    <li><a href="<?php echo base_url() ?>report"><i class="fa "></i> Report</a></li>
	    <li class="active"><a href="#">Expense Report</a></li>
	</ol>
    </section>
    <br/>


    <!--     Start Working area  -->


    <div class="col-md-12 main-mid-area">
	<?php $this->load->view('common/error_show') ?>

	<div class="row">
	    <?php echo form_open() ?>
	    <div class="col-md-3 col-sm-3 col-xs-4">
		<div class="form-group">
		    <label for="Start Date" class="control-label">Start Date</label>
		    <input type="text" class="datepicker form-control" id="sdate" name="sdate" placeholder="dd-mm-yyyy"   />
		</div>
	    </div>

	    <div class="col-md-3 col-sm-3 col-xs-4">
		<div class="form-group">
		    <label for="End Date" class="control-label">End Date</label>
		    <input type="text" class="datepicker form-control" id="edate" name="edate" placeholder="dd-mm-yyyy"  />
		</div>
	    </div>

	    <div class="col-md-3 col-sm-3 col-xs-4">
		<div class="form-group">
		    <label for="Division" class="control-label">Division</label>
		    <select class="form-control" id="division_id" name="division_id" required="">
			<option value="all">All Division</option>
			<?php foreach ($division_list as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?></option>>
			<?php } ?>
		    </select>
		</div>
	    </div>

	    <div class="col-md-3 col-sm-3 col-xs-4">
		<div class="form-group">
		    <label for="Jonal" class="control-label">Jonal</label>
		    <select class="form-control" id="jonal_id" name="jonal_id" >
			<option value="all">All Jonal</option>
		    </select>
		</div>
	    </div>

	    <div class="col-md-3 col-sm-3 col-xs-4">
		<div class="form-group">
		    <label for="District" class="control-label">District</label>
		    <select class="form-control" id="district_id" name="district_id" >
			<option value="all">All District</option>
		    </select>
		</div>
	    </div>

	    <div class="col-md-3 col-sm-3 col-xs-4">
		<div class="form-group">
		    <label for="Thana" class="control-label">Thana</label>
		    <select class="form-control college_id" id="thana_id" name="thana_id" >
			<option value="all">All Thana</option>
		    </select>
		</div>
	    </div>

	    <div class="col-md-3 col-sm-3 col-xs-4">
		<div class="form-group">
		    <label for="College" class="control-label">College</label>
		    <select class="form-control" id="college_id" name="college_id" >
			<option value="all">All College</option>
		    </select>
		</div>   
	    </div>




	    <!-- Select Plugin Call for College -->
	    <script type="text/javascript">
		$(document).ready(function () {
		    $("#division_id").select2();
		    $("#jonal_id").select2();
		    $("#district_id").select2();
		    $("#thana_id").select2();
		    $("#college_id").select2();
		});
	    </script>

	    <!-- ******************************** -->


	    <label class="col-md-2">
		&nbsp;
		<input type="submit" name="sumbit" value="Search" class="btn btn-primary form-control" />
	    </label>
	    <br/>
	    <br/>
	    <?php echo form_close() ?>
	</div>
<!--	<div class="text-center">
	    <h3> Expense Daily Report</h3>
	    <div> From <?php echo date('d-m-y', strtotime($sdate)) ?>  to <?php echo date('d-m-y', strtotime($edate)) ?>  </div>
	    <?php if (!empty($division_info)) { ?>
    	    <h4> Division :  <?php echo $division_info->name ?>  </h4>
	    <?php } else echo "<div> All Division </div>"; ?> 
	    <?php if (!empty($jonal_info)) { ?>
    	    <h4> Jonal :  <?php //echo $jonal_info->name ?>  </h4>
	    <?php } else echo "<div> All Jonal </div>"; ?> 
	</div>-->
	<?php if (!empty($content_list)) { ?> 
    	<div class="clearfix"></div>
    	<br><br>

    	<table class="table table-bordered table-hover ">

                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">তারিখ </th>
                    <?php if ($user_role == 1) { ?>
                        <th style="text-align: center">এমপিও এর নাম</th>
                    <?php } ?>
                    <th style="text-align: center">যাতায়াত খরচ</th>
                    <th style="text-align: center">মোবাইল খরচ</th>
                    <th style="text-align: center">আপ্যয়ন খরচ</th>
                    <th style="text-align: center">প্যাকেট উত্তোলন</th>
                    <th style="text-align: center">অন্যান্য খরচ</th>
                    
                    <th style="text-align: center;">Expense Type</th>
                    <th  style="background: #ccc;" style="text-align: center">যাত্রা শুরুর কি: মি:</th>
                    <th  style="background: #ccc;" style="text-align: center;">যাত্রা শেষের কি: মি:</th>
                    <th  style="background: #ccc;" style="text-align: center;">মোট ব্যবহত কি: মি:</th>
                    <th  style="background: #ccc;" style="text-align: center;">ব্যক্তিগত ব্যবহার</th>
                    <th  style="background: #ccc;" style="text-align: center;">অফিস কাজে ব্যবহার</th>
                    <th  style="background: #ccc;" style="text-align: center;">কি: মি: রেট</th>
                    <th style="text-align: center;">মোট</th>
                </tr>

                <tbody>
                    <?php
                    $serialNo = 1;
                    foreach ($content_list as $value) {
                        ?>
                        <tr align="center">
                            <td><?php echo $serialNo; ?></td>
                            <td><?php echo $value['date']; ?></td>
                            <?php if ($user_role == 1) { ?>
                                <td><?php echo $value['name']; ?></td>
                            <?php } ?>
                            <td><?php echo $value['journey_cost']; ?></td>
                            <td><?php echo $value['mobile_cost']; ?></td>
                            <td><?php echo $value['entertainment_cost']; ?></td>
                            <td><?php echo $value['packet_lift']; ?></td>
                            <td><?php echo $value['others_cost']; ?></td>
                            
                            <td <?php if($value['expense_type']==1) echo "style='background: #ccc;'"; ?> ><?php if($value['expense_type']==1) echo 'মোটর সাইকেল ছাড়া'; if($value['expense_type']==2) echo 'কোম্পানির মোটর সাইকেল'; if($value['expense_type']==3) echo 'নিজের মোটর সাইকেল'; ?></td>
                            <td style="background: #ccc;"><?php echo $value['start_journey_km']; ?></td>
                            <td style="background: #ccc;"><?php echo $value['end_journey_km']; ?></td>
                            <td style="background: #ccc;"><?php echo $value['total_journey_km']; ?></td>
                            <td style="background: #ccc;"><?php echo $value['personal_use_km']; ?></td>
                            <td style="background: #ccc;"><?php echo $value['office_use_km']; ?></td>
                            <td style="background: #ccc;"><?php echo $value['kilomitter_rate']; ?></td>
                            <td><?php echo $value['total_cost']; ?></td>
                        </tr>
                        <?php
                        $serialNo++;
                    }
                    ?>
                </tbody>
            </table> 

    	
	<?php } else { ?>
    	<br/> 
    	<br/> 
    	<br/> 
    	<br/> 
    	<div class="alert alert-danger text-center">
    	    No data Found! 
    	</div>
	<?php } ?>
    </div>

    <!-- End  Working area -->

    <script>


        $(document).ready(function () {
            $('.datepicker').datepicker({
                KeyboardNavigation: false,
                todayHighlight: true,
                format: 'dd-mm-yyyy',
                autoclose: true

            });
        })

        $(document).ready(function () {
            $(".main-mid-area").on('change', '#division_id', function () {
                var division_id = $(this).val();
//                console.log(division_id);
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/home/getjonal/" + division_id,
                    beforSend: function (xhr) {
                        xhr.overrideMimeType("Text/plain; charset=x-user-defined");
                        $("#jonal_id").html("<optoin>Loading...</option>");
                    }
                })
                        .done(function (data) {
                            $("#jonal_id").html("<option value=''>Select Jonal Name..</option>");
                            data = JSON.parse(data);
                            $.each(data, function (key, val) {
                                $("#jonal_id").append("<option value='" + val.id + "'>" + val.name + "</option>");
                            })
                        })
            })
        })

        $(document).ready(function () {
            $(".main-mid-area").on('change', '#jonal_id', function () {
                var jonal_id = $(this).val();
//                console.log(jonal_id);
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/home/getdistrict/" + jonal_id,
                    beforSend: function (xhr) {
                        xhr.overrideMimeType("Text/plain; charset=x-user-defined");
                        $("#district_id").html("<option>Loading...</option>");
                    }
                })
                        .done(function (data) {
                            $("#district_id").html("<option value=''>Select District Name..</option>");
                            data = JSON.parse(data);
                            $.each(data, function (key, val) {
                                $("#district_id").append("<option value='" + val.id + "'>" + val.name + "</option>");
                            })
                        })
            })
        })

        $(document).ready(function () {

            $(".main-mid-area").on('change', '#district_id', function () {
                var district_id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url() ?>index.php/home/getthana/" + district_id,
                    beforSend: function (xhr) {
                        xhr.overrideMimeType("Text/plain; charset=x-user-defined");
                        $("#thana_id").html("<option>Loading...</option>");
                    }
                })
                        .done(function (data) {
                            $("#thana_id").html(data);
                        })
            })

        })

        $(document).ready(function () {
            $(".main-mid-area").on('change', '#thana_id', function () {
                var thana_id = $(this).val();

                $.ajax({
                    url: "<?php echo base_url() ?>index.php/home/getcollege/" + thana_id,
                    beforSend: function (xhr) {
                        xhr.overrideMimeType("Text/plain; charset=x-user-defined");
                        $("#college_id").html("<option>Loading...</option>");
                    }
                })
                        .done(function (data) {
                            $("#college_id").html("<option value=''>Select College Name..</option>");
                            data = JSON.parse(data);
                            $.each(data, function (key, val) {
                                $("#college_id").append("<option value='" + val.id + "'>" + val.name + "</option>");
                            })
                        })
            })
        })
    </script>


    <?php $this->load->view('common/footer') ?>
