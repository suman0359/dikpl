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
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url() ?>expense/add_expense">Expense</a></li>
        </ol>
    </section>
    <br/>

    <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>
        <h2> Add New Expense </h2><hr>


        <?php
        echo form_open('');
        ?>


        <div class="row" id="without_motorbike">
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label> যাতায়াত  খরচ </label>
                    <?php
                    $form_input = array(
                        'name' => 'journey_cost',
                        'id' => 'journey_cost',
                        'class' => 'form-control',
                        'value' => $journey_cost,
                        'required' => 'required',
                        'placeholder' => 'যাতায়াত  খরচ'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label for="">মোবাইল খরচ</label>
                    <?php
                    $form_input = array(
                        'name' => 'mobile_cost',
                        'id' => 'mobile_cost',
                        'class' => 'form-control ',
                        'value' => $mobile_cost,
                        'required' => 'required',
                        'placeholder' => 'মোবাইল খরচ'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label for="">আপ্যয়ন খরচ </label>
                    <?php
                    $form_input = array(
                        'name' => 'entertainment_cost',
                        'id' => 'entertainment_cost',
                        'class' => 'form-control ',
                        'value' => $entertainment_cost,
                        'required' => 'required',
                        'placeholder' => 'আপ্যয়ন খরচ '
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label for="">প্যাকেট উত্তোলন </label>
                    <?php
                    $form_input = array(
                        'name' => 'packet_lift',
                        'id' => 'packet_lift',
                        'class' => 'form-control ',
                        'value' => $packet_lift,
                        'required' => 'required',
                        'placeholder' => 'প্যাকেট উত্তোলন ',
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-4 col-sm-3">
                <div class="form-group">
                    <label for="">অন্যান্য খরচ </label>
                    <?php
                    $form_input = array(
                        'name' => 'others_cost',
                        'id' => 'others_cost',
                        'class' => 'form-control ',
                        'value' => $others_cost,
                        'required' => 'required',
                        'placeholder' => 'অন্যান্য খরচ '
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>

            <div class="col-md-4 col-sm-3">
                <div class="form-group">
                    <label for="">মোট</label>
                    <?php
                    $form_input = array(
                        'name' => 'total_cost',
                        'id' => 'total_cost',
                        'class' => 'form-control ',
                        'value' => $total_cost,
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Expense Type</label>
                    <select class="form-control" id="expense_type" name="expense_type" >
                        <option value="1">মোটর সাইকেল ছাড়া </option>
                        <option value="2">কোম্পানির মোটর সাইকেল </option>
                        <option value="3">নিজের মোটর সাইকেল </option>
                    </select>
                </div>
            </div>

        </div><hr>

        <div class="row display_none" id="company_motorbike">

            <div class="col-md-2 col-sm-3">
                <div class="form-group">
                    <label>  যাত্রা শুরুর কি: মি: </label>
                    <?php
                    $form_input = array(
                        'name' => 'start_journey_km',
                        'id' => 'start_journey_km',
                        'class' => 'form-control ',
                        'value' => $start_journey_km,
                        'placeholder' => ' যাত্রা শুরু কি: মি:'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>

            <div class="col-md-2 col-sm-3">
                <div class="form-group">
                    <label for="">যাত্রা শেষের কি: মি: </label>
                    <?php
                    $form_input = array(
                        'name' => 'end_journey_km',
                        'id' => 'end_journey_km',
                        'class' => 'form-control ',
                        'value' => $end_journey_km,
                        'placeholder' => 'যাত্রা শেষের কি: মি: '
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-2 col-sm-3">
                <div class="form-group">
                    <label for="">মোট ব্যবহত কি: মি: </label>
                    <?php
                    $form_input = array(
                        'name' => 'total_journey_km',
                        'id' => 'total_journey_km',
                        'class' => 'form-control ',
                        'value' => $total_journey_km,
                        'placeholder' => 'মোট ব্যবহত কি: মি: '
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-2 col-sm-3">
                <div class="form-group">
                    <label for="">ব্যক্তিগত ব্যবহার</label>
                    <?php
                    $form_input = array(
                        'name' => 'personal_use_km',
                        'id' => 'personal_use_km',
                        'class' => 'form-control ',
                        'value' => $personal_use_km,
                        'placeholder' => 'ব্যক্তিগত ব্যবহার',
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-2 col-sm-3">
                <div class="form-group">
                    <label for="">অফিস  কাজে ব্যবহার</label>
                    <?php
                    $form_input = array(
                        'name' => 'office_use_km',
                        'id' => 'office_use_km',
                        'class' => 'form-control ',
                        'value' => $office_use_km,
                        'placeholder' => 'অফিসের কাজে ব্যবহার'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>

            <div class="col-md-2 col-sm-3">
                <div class="form-group">
                    <label for="">কি: মি: রেট </label>
                    <?php
                    $form_input = array(
                        'name' => 'kilomitter_rate',
                        'id' => 'kilomitter_rate',
                        'class' => 'form-control ',
                        'value' => $kilomitter_rate,
                        'placeholder' => 'কি: মি: রেট '
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div>

        </div>

        <div class="row display_none" id="personal_motorbike">

            <div class="col-md-3 col-sm-4">
                <div class="form-group">

                    <label for="">তারিখ </label>
                    <?php
                    $form_input = array(
                        'name' => 'journey_date',
                        'id' => 'journey_date',
                        'type' => 'text',
                        'class' => 'datepicker form-control ',
                        'value' => $journey_date,
                        'placeholder' => 'yyyy-mm-dd'
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-3 col-sm-4">
                <div class="form-group">
                    <label for="">ব্যবহত কি: মি: </label>
                    <?php
                    $form_input = array(
                        'name' => 'total_journey_km',
                        'id' => 'total_journey_km',
                        'class' => 'form-control ',
                        'value' => $total_journey_km,
                        'placeholder' => 'ব্যবহত কি: মি: '
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 

            <div class="col-md-3 col-sm-4">
                <div class="form-group">
                    <label for="">যাতায়াত  খরচ </label>
                    <?php
                    $form_input = array(
                        'name' => 'journey_cost2',
                        'id' => 'journey_cost2',
                        'class' => 'form-control ',
                        'value' => $journey_cost2,
                        'placeholder' => 'যাতায়াত  খরচ ',
                    );
                    echo form_input($form_input);
                    ?>
                </div>
            </div> 
        </div>


        <div class="col-md-12"><br>
            <div class="pull-right"> 

                <?php
                $form_input = array(
                    'name' => 'submit',
                    'class' => 'btn btn-lg btn-success ',
                    'value' => 'Add Expense'
                );

                echo form_submit($form_input);
                echo form_close()
                ?> 

            </div> 
        </div>
    </div>

    <!-- End  Working area  -->

    <script>


        $(document).ready(function () {
            $('.datepicker').datepicker({
                KeyboardNavigation: false,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
                autoclose: true

            });

            $(".main-mid-area").on('change', '#expense_type', function () {
                var x = document.getElementById("expense_type").value;
                var x = parseInt(x);
                console.log(x);
                if (x == 1) {//x = without_motorbike
                    $("#company_motorbike").removeClass("display_block");
                    $("#personal_motorbike").removeClass("display_block");
                    $("#company_motorbike").addClass("display_none");
                    $("#personal_motorbike").addClass("display_none");
                } else if (x == 2) {// x = company_motorbike
                    $("#company_motorbike").addClass("display_block");
                    $("#company_motorbike").removeClass("display_none");
                    $("#personal_motorbike").addClass("display_none");
                    $("#personal_motorbike").removeClass("display_block");
                } else if (x == 3) {//x = personal_motorbike
                    $("#personal_motorbike").addClass("display_block");
                    $("#company_motorbike").addClass("display_none");
                    $("#company_motorbike").removeClass("display_block");
                    $("#personal_motorbike").removeClass("display_none");

                }
            });

            //Without Motor Bike Calcalation 
            $("form").bind('keyup change', '#without_motorbike', function () {
                var expense_type = $("#expense_type").val();
                expense_type = parseInt(expense_type);

                // if(expense_type==1){
                var journey_cost = $("#journey_cost").val().replace(/\D/g, '');
                journey_cost = parseInt(journey_cost) || 0;
                $("#journey_cost").val(journey_cost);

                var mobile_cost = $("#mobile_cost").val().replace(/\D/g, '');
                mobile_cost = parseInt(mobile_cost) || 0;
                $("#mobile_cost").val(mobile_cost);

                var entertainment_cost = $("#entertainment_cost").val().replace(/\D/g, '');
                entertainment_cost = parseInt(entertainment_cost) || 0;
                $("#entertainment_cost").val(entertainment_cost);

                var packet_lift = $("#packet_lift").val().replace(/\D/g, '');
                packet_lift = parseInt(packet_lift) || 0;
                $("#packet_lift").val(packet_lift);

                var others_cost = $("#others_cost").val().replace(/\D/g, '');
                others_cost = parseInt(others_cost) || 0;
                $("#others_cost").val(others_cost);

                total_expense = journey_cost + mobile_cost + entertainment_cost + packet_lift + others_cost;
                // $("#total_cost").val("total_cost");
                $("#total_cost").val(total_expense);
                // }	
                /* ----------------------------------------------------------------- */
                // if(expense_type==2){
                var start_journey_km = $("#start_journey_km").val().replace(/\D/g, '');
                start_journey_km = parseInt(start_journey_km) || 0;
                $("#start_journey_km").val(start_journey_km);

                var end_journey_km = $("#end_journey_km").val().replace(/\D/g, '');
                end_journey_km = parseInt(end_journey_km) || 0;
                $("#end_journey_km").val(end_journey_km);

                var personal_use_km = $("#personal_use_km").val().replace(/\D/g, '');
                personal_use_km = parseInt(personal_use_km) || 0;
                $("#personal_use_km").val(personal_use_km);

                var office_use_km = $("#office_use_km").val().replace(/\D/g, '');
                office_use_km = parseInt(office_use_km) || 0;
                $("#office_use_km").val(office_use_km);

                var kilomitter_rate = $("#kilomitter_rate").val().replace(/\D/g, '');
                kilomitter_rate = parseInt(kilomitter_rate) || 0;
                $("#kilomitter_rate").val(kilomitter_rate);

                var journey_km = end_journey_km - start_journey_km;
                $("#total_journey_km").val(journey_km);
                // }

            });
        })

    </script>
    <?php $this->load->view('common/footer') ?>

