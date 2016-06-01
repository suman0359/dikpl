<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');
?>
<?php $companyname = $this->session->userdata('companyname'); ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top:-10px!important;">
        <h1 id="company_info">
            Dashboard
            <small ><?php if (!empty($companyname)) echo $companyname; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url() ?>purchase">Purchase</a></li>
            <li class="active"><a href="<?php echo base_url() ?>purchase/add">Add Purchase</a></li>
        </ol>
    </section>
    <br/>


    <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>
        <h2> Book Requisition  </h2>

        <!-- ************************************************* -->
        <?php echo form_open(); ?>
        <div id="type_container">
            <div class="row" id="edit-0">
                
                <div class="col-md-2">
                    
                    <div class="form-group">
                        <label for="book_name">Department Name</label>
                        <select name="department_id[]" id="department_id" class="form-control">
                            <option value="">Select Department Name</option>
                            <?php 
                            foreach ($dep_list as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                </div>

                <div class="col-md-2">
                   
                    <div class="form-group">
                        <label for="book_group">Clsas Name</label>
                        <select name="class_id[]" id="class_id" class="form-control">
                            <option value="">Select Class Name</option>
                           <!--  <?php 
                            foreach ($class_list as $value) { ?>
                                
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option> 
                            <?php } ?> -->
                        </select>
                    </div>
                    
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Book Type</label>
                        <select name="book_type" id="book_type_id" class="form-control">
                            <option value="">Select Book Type..</option>
                            <option value="2">Guid Book</option>
                            <option value="1">Text Book</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="book_name">Book Name</label>
                        <select name="book_name[]" id="book_name" class="form-control">
                            <option value="">Select Book Name</option>
                            <?php 
                            foreach ($pro_list as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['book_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                </div>


                <div class="col-md-2">
                   
                    <div class="form-group">
                        <label for="book_name">Book Quantity</label>
                        <input type="number" maxlength ='5' min="1" class="form-control input-sm" name="book_quantity[]" value="1"/>
                    </div>
                    
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label for="">&nbsp;</label>
                        <a class="btn btn-primary add-type form-control " href="javascript: void(0)" tiitle="Click to add more"><i class="glyphicon glyphicon-plus-sign" style="margin-right: 8px"></i> Add New Row</a>
                    </div>
                </div>

            </div>

        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" class="form-control" id="comment" cols="10" rows="3"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Requisition Submit" name="Submit">
        <?php echo form_close(); ?>

        <!-- ********************************************************************** -->
        
        <div id="type_container" class="hide ">
            <div class="row  form-group type-row" id="">
                
                 <div class="col-md-2">
                    
                    <div class="form-group">
                        <!-- <label for="book_name">Department Name</label> -->
                        <select name="department_id[]" class="form-control department_id">
                            <!-- <option value="">Select Department Name</option> -->
                            <?php 
                            foreach ($dep_list as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                </div>
                

                <div class="col-md-2">
                   
                    <div class="form-group">
                        <!-- <label for="book_name">Class Name</label> -->
                        <select name="class_id[]" id="class_id" class="form-control">
                            <option value="">Select Class Name</option>
                            
                        </select>
                    </div>
                    
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <!-- <label for="">Book Type</label> -->
                        <select name="book_type" id="book_type_id" class="form-control">
                            <option value="">Select Book Type..</option>
                            <option value="2">Guid Book</option>
                            <option value="1">Text Book</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <!-- <label for="book_name">Book Name</label> -->
                        <select name="book_name[]" id="book_name" class="form-control">
                            <option value="">Select Book Name</option>
                            <?php 
                            foreach ($pro_list as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['book_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                </div>

              
                <div class="col-md-2">
                   
                    <div class="form-group">
                        <!-- <label for="book_name">Book Quantity</label> -->
                        <input type="number" maxlength ='5' min="1" class="form-control input-sm" name="book_quantity[]" value="1"/>
                    </div>
                    
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <!-- <label for="">&nbsp;</label> -->
                        <a class="btn btn-primary remove-type pull-right form-control " targetDiv="" data-id="0" href="javascript: void(0)"><i class="glyphicon glyphicon-trash" style="margin-right: 8px"></i>Remvoe This Row</a>
                    </div>
                </div>

                

            </div>

        </div>


        <!-- ********************************************************************** -->
        



            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/plugins/jquery-1.8.2.min.js"></script> 

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->

            <!-- ************************************************* -->

            <script>
                jQuery(document).ready(function () {
                    var doc = $(document);
                    jQuery('a.add-type').die('click').live('click', function (e) {
                        e.preventDefault();
                        var content = jQuery('.requisition .type-row'),
                                element = null;
                        for (var i = 0; i < 1; i++) {
                            element = content.clone();
                            var type_div = 'teams_' + jQuery.now();
                            var id = 'class_id' + jQuery.now();
                            element.attr('id', type_div);
                            $(this)
                            element.find('.remove-type').attr('targetDiv', type_div);
                            element.appendTo('.requisition');

                        }
                    });

                    jQuery(".remove-type").die('click').live('click', function (e) {
                        var didConfirm = confirm("Are you sure You want to delete");
                        if (didConfirm == true) {
                            var id = jQuery(this).attr('data-id');
                            var targetDiv = jQuery(this).attr('targetDiv');
                            //if (id == 0) {
                            //var trID = jQuery(this).parents("tr").attr('id');
                            jQuery('#' + targetDiv).remove();
                            // }
                            return true;
                        } else {
                            return false;
                        }
                    });

                });
            </script>

            <!-- ************************************************* -->


                <?php echo form_close() ?>      

            </div>
        </div>
        <!-- End  Working area --> 

        <!-- start  add the row --> 

        <script>

            $.noConflict();
            jQuery(document).ready(function () {
                //Teacher Select 
            
            $("#type_container").on('click', '.department_id', function(){
                var department_id = $(this).val() ; 
                var id = $(this).parents().html();
                    console.log(id);
            })

            $("#type_container").on('change', '.department_id', function(){
                    var department_id = $(this).val() ; 
                    var id = $('.requisition').attr('id');
                    console.log(id);
                    $.ajax({
                      url: "<?php echo base_url() ?>index.php/home/getclass/"+department_id,

                      beforeSend: function( xhr ) {
                        xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                        $("#class_id").html("<option>Loading .... </option>") ; 
                      }
                    })
                  .done(function( data ) {
                     $("#class_id").html("<option value=''>Select a Class </option>"); 
                        data=JSON.parse(data);
                    $.each(data, function(key, val) {
                          $("#class_id").append("<option value='"+val.class_id+"'>"+val.class_name+"</option>");
                        });  
                        
                    }); 
             });
                //-----------------------------------

              




        </script>



        <?php $this->load->view('common/footer') ?>
        



