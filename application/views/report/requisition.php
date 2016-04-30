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
            <small> Chalan/Shipment Report (Dsivision) </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url() ?>report"><i class="fa "></i> Report</a></li>
            <li class="active"><a href="#">Chalan Report  </a></li>
        </ol>
    </section>
    <br/>





    <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>

        <div class="searchbar " >

            <!--    <div class="col-md-12 no-print"  >
            <?php
            echo form_open();
            ?>
                    <label> Start Date 
                     <input type="text" id="sdate" class="dp  form-control col-md-1" name="sdate" value="<?php echo $sdate; ?>" placeholder="dd-mm-yyyy" required/>
                         </label>
                    <label> End Date 
                      <input type="text" id="edate" class="dp  form-control col-md-1" name="edate" value="<?php echo $edate; ?>" placeholder="DD-MM-YYY" required/>
                    </label>
                    <label> 
                        Division 
                    <select class="form-control col-md-1" id="chd" name="did">
                        <option value="all"> All </option>
                   
            <?php
            foreach ($div_list as $div) {
                ?>
                            <option value="<?php echo $div['id'] ?>" <?php if ($did == $div['id']) echo' selected="selected" ' ?>  > <?php echo $div['name'] ?>  </option>
            <?php } ?> 
                         </select>
                    </label>
                     <label> 
                        Jonal 
                        <select class="form-control col-md-1" id="jonal_id" name="jid" required>
                        <option value="all"> All Jonal  </option>
             
                         </select>
                    </label>
                    
                    <label>
                        &nbsp;
                        <input type="submit" name="sumbit" value="Search" class="btn btn-primary form-control col-md-1" />
                    </label>
                    <br/>
                    <br/>
            <?php echo form_close(); ?> 
                </div>-->

            <div class="col-md-12 no-print"  >
                <?php
                echo form_open();
                ?>
                <label> Start Date 
                    <input type="text" id="sdate" class="dp  form-control col-md-1" name="start_date" value="<?php echo $sdate; ?>" placeholder="dd-mm-yyyy" required/>
                </label>
                <label> End Date 
                    <input type="text" id="edate" class="dp  form-control col-md-1" name="end_date" value="<?php echo $edate; ?>" placeholder="DD-MM-YYY" required/>
                </label>
                
                <label> Division
                    <select name="division_id" class="form-control col-md-1" id="division_id">
                        <option value="">Select Division...</option>
                        <?php foreach ($division_list as $val){?>
                        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                        <?php }?>
                    </select>
                </label>
                
                <label> Rezone
                    <select name="rezone_id" class="form-control col-md-1" id="rezone_id">
                        <option value="">Select Rezone...</option>
                        <?php foreach ($rezone_list as $val){?>
                        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                        <?php }?>
                    </select>
                </label>
                
                <label> District
                    <select name="district_id" class="form-control col-md-1" id="district_id">
                        <option value="">Select District...</option>
                        <?php foreach ($district_list as $val){?>
                        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                        <?php }?>
                    </select>
                </label>
                
                <label> Thana
                    <select name="thana_id" class="form-control col-md-1" id="thana_id">
                        <option value="">Select Thana...</option>
                        <?php foreach ($thana_list as $val){?>
                        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                        <?php }?>
                    </select>
                </label>

                <label> MPO 
                    <select name="mpo_id" class="form-control col-md-1" id="mpo_id">
                        <option value="">Select MPO...</option>
                        
                    </select>
                </label>
                

                <label>
                    &nbsp;
                    <input type="submit" name="sumbit" value="Search" class="btn btn-primary form-control col-md-1" />
                </label>
                <br/>
                <br/>
                <?php echo form_close(); ?> 
            </div>

            <!--  ************************************************************************************ -->
            <div class="text-center">
                <h3> Book Requisition  Report </h3>
                <div> From <?php echo date('d-m-Y', strtotime($sdate)) ?> to <?php echo date('d-m-Y', strtotime($edate)) ?>   </div>
                <?php if (!empty($jonal_info)) { ?>
                    <h4> <?php echo $jonal_info->name ?>   </h4>

                <?php } ?> 

                <div class="clearfix"></div>
            </div> 


            <!-- ************************************************************** -->
            <?php if (!empty($report_details)) { ?> 

                <div class="clearfix"></div>
            </div> 

            <div>

                <table class="table table-bordered table-hover" >
                    <tr>
                        <th >SL</th>
                        <th>Invoice No</th>
                        <th >Date </th>

                        <th >Requistion Status </th>
                        <th >Total Amount </th>
                        <th > Total Quantity</th>
                        <th > Comment </th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($report_details as $content) {
                        ?> 

                        <tr>
                            <td> <?php echo $content->id; ?>  </td>

                            <td> <?php echo $content->invoice_no; ?>  </td>
                            <td> <?php echo $content->date; ?>  </td>
                            <td> <?php echo $content->requisition_status; ?>  </td>
                            <td> <?php echo $content->total_amount; ?>  </td>
                            <td> <?php echo $content->total_quantity; ?>  </td>
                            <td> <?php echo $content->comment; ?>  </td>
                            <td> <div class="no-print"> <a href="<?php echo site_url() ?>/requisition/view/<?php echo $content->id; ?>" class="btn btn-link"> view </a> </div> </td>
                        </tr>

                    <?php } ?> 


                </table> 
            </div>

        <?php } else { ?>
            <br/> 
            <br/> 
            <br/> 
            <br/> 
            <div class="alert alert-danger text-center">
                No data Found! 
            </div>

        <?php } ?>
        <!-- ************************************************************** -->

        <script>

            $(document).ready(function() {

                $('.dp').datepicker({
                    KeyboardNavigation: false,
                    todayHighlight: true,
                    format: 'yyyy-mm-dd',
                    autoclose: true
                });

                //start getRezone_list 
                $(".no-print").on('change', '#division_id', function() {

                    var div_id = $(this).val();
                    console.log(div_id);
                    $.ajax({
                        url: "<?php echo base_url() ?>index.php/home/getjonal/" + div_id,
                        beforeSend: function(xhr) {
                            xhr.overrideMimeType("text/plain; charset=x-user-defined");
                            $("#rezone_id").html("<option>Loading .... </option>");

                        }
                    })
                            .done(function(data) {
                                /* if ( console && console.log ) {
                                 console.log( "Sample of data:", data.slice( 0, 100 ) );
                                 }*/

                                $("#rezone_id").html("<option value=''>Select a Jonal </option>");
                                data = JSON.parse(data);
                                $.each(data, function(key, val) {
                                    $("#rezone_id").append("<option value='" + val.id + "'>" + val.name + "</option>");

                                });


                            });
                });
                //End getRezone_list
                
                //start getDistrict_list
                $(".no-print").on('change', '#rezone_id', function() {

                    var rezone_id = $(this).val();
                    console.log(rezone_id);
                    $.ajax({
                        url: "<?php echo base_url() ?>index.php/home/getdistrict/" + rezone_id,
                        beforeSend: function(xhr) {
                            xhr.overrideMimeType("text/plain; charset=x-user-defined");
                            $("#district_id").html("<option>Loading .... </option>");

                        }
                    })
                            .done(function(data) {
                                /* if ( console && console.log ) {
                                 console.log( "Sample of data:", data.slice( 0, 100 ) );
                                 }*/

                                $("#district_id").html("<option value=''>Select a Jonal </option>");
                                data = JSON.parse(data);
                                $.each(data, function(key, val) {
                                    $("#district_id").append("<option value='" + val.id + "'>" + val.name + "</option>");

                                });


                            });
                });
                //End getDistrict_list
                
                //start getThana_list
                $(".no-print").on('change', '#district_id', function() {

                    var district_id = $(this).val();
                    console.log(district_id);
                    $.ajax({
                        url: "<?php echo base_url() ?>index.php/home/getthana/" + district_id,
                        beforeSend: function(xhr) {
                            xhr.overrideMimeType("text/plain; charset=x-user-defined");
                            $("#thana_id").html("<option>Loading .... </option>");

                        }
                    })
                            .done(function(data) {
                                /* if ( console && console.log ) {
                                 console.log( "Sample of data:", data.slice( 0, 100 ) );
                                 }*/
                                   $("#thana_id").html(data);

//                                $("#thana_id").html("<option value=''>Select a Jonal </option>");
//                                data = JSON.parse(data);
//                                $.each(data, function(key, val) {
//                                    $("#thana_id").append("<option value='" + val.id + "'>" + val.name + "</option>");
//
//                                });


                            });
                });
                //End getThana_list
                
                //start getMpo_list
                $(".no-print").on('change', '#thana_id', function() {

                    var thana_id = $(this).val();
                    console.log(thana_id);
                    $.ajax({
                        url: "<?php echo base_url() ?>index.php/home/getmpo/" + thana_id,
                        beforeSend: function(xhr) {
                            xhr.overrideMimeType("text/plain; charset=x-user-defined");
                            $("#mpo_id").html("<option>Loading .... </option>");

                        }
                    })
                            .done(function(data) {
                                /* if ( console && console.log ) {
                                 console.log( "Sample of data:", data.slice( 0, 100 ) );
                                 }*/

                                $("#mpo_id").html("<option value=''>Select a Jonal </option>");
                                data = JSON.parse(data);
                                $.each(data, function(key, val) {
                                    $("#mpo_id").append("<option value='" + val.id + "'>" + val.name + "</option>");

                                });


                            });
                });
                //End getMpo_list

            });
        </script>

        <!-- End  Working area --> 
        <?php $this->load->view('common/footer') ?>