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
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
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
        
        <div id="type-container" class="hide">
            <div class="row form-group type-row" id="">
                
                 <div class="col-md-2">
                    
                    <div class="form-group">
                        <!-- <label for="book_name">Department Name</label> -->
                        <select name="department_id[]" id="department_id" class="form-control">
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
        




        <!-- <div id="type_container">
            <div class="row form-group" id="edit-0">
                <div class="col-md-2 control-label">
                    <label for="bookname" class="control-label"> Book name :  </label>
                </div>
                <div class="col-md-3">
                    <select data-placeholder="Choose an Type..." class="form-control" name="">
                        <option disabled="disabled" selected="selected" value="0">Select</option>
                        <optgroup label="Swedish Cars">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                        </optgroup>
                        <optgroup label="German Cars">
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-2 control-label">
                    <label for="username" class="control-label">
                        Point :
                    </label>
                </div>
                <div class="col-md-5 clearfix">
                    <div class="row col-md-3">
                        <input type="text" maxlength ='5' class="form-control input-sm" name="" value="0"/>
                    </div>

                    <div class="col-md-3 control-label">

                        <a class="add-type pull-right" href="javascript: void(0)" tiitle="Click to add more"><i class="glyphicon glyphicon-plus-sign"></i></a>

                    </div>
                </div>
            </div> -->

            <!-- ************************************************* -->

            <!-- <div id="type-container" class="hide">
                <div class="row form-group type-row" id="">
                    <div class="col-md-2 control-label">
                        <label for="username" class="control-label">
                            Brand :
                        </label>
                    </div>
                    <div class="col-md-3">
                        <select data-placeholder="Choose an Type..." class="form-control" name="">
                            <option disabled="disabled" selected="selected" value="0">Select</option>
                            <optgroup label="Swedish Cars">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                            </optgroup>
                            <optgroup label="German Cars">
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-2 control-label">
                        <label for="username" class="control-label">
                            Point :
                        </label>
                    </div>
                    <div class="col-md-5 clearfix">
                        <div class="row col-md-3">
                            <input type="text" maxlength ='5' class="form-control input-sm" name="" value="0"/>
                        </div>
                        <div class="col-md-3 control-label"><a class="remove-type pull-right" targetDiv="" data-id="0" href="javascript: void(0)"><i class="glyphicon glyphicon-trash"></i></a></div>
                    </div>
                </div>
            </div> -->


            <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/plugins/jquery-1.8.2.min.js"></script> 

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> -->

            <!-- ************************************************* -->

            <script>
                jQuery(document).ready(function () {
                    var doc = $(document);
                    jQuery('a.add-type').die('click').live('click', function (e) {
                        e.preventDefault();
                        var content = jQuery('#type-container .type-row'),
                                element = null;
                        for (var i = 0; i < 1; i++) {
                            element = content.clone();
                            var type_div = 'teams_' + jQuery.now();
                            var id = 'class_id' + jQuery.now();
                            element.attr('id', type_div);
                            $(this)
                            element.find('.remove-type').attr('targetDiv', type_div);
                            element.appendTo('#type_container');

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


            <!-- <div class="col-md-12 margin_padding">

                <div class="col-md-9 ">
                    <div class=" ">
                        <input type="text" name="term" id="term" value="" class="form-control"  placeholder="Type Book name her and select from Dropdown saggatiom..."/>
                    </div>

                    <br/>
                    <?php
                    echo form_open_multipart('');
                    ?>
                    <table class="table tableproduct table-responsive table-bordered col-md-12" id="plateVolumes" >  
                        <tbody>
                            <tr class="alert alert-info">

                                <th></th>
                                <th>Book  Name</th>
                                <th>Book Code</th>
                                <th>Book Price</th>
                                <th>Quantity</th>

                            </tr>

                        </tbody>


                    </table>

                    <table class="table table-responsive table-bordered col-md-12 " id="" >  
                        <tr class="alert alert-danger">

                            <th>Total Quantity</th>
                            <th> </th>

                        </tr>
                        <tr>
                            <td>
                                <?php
                                $form_input = array(
                                    'name' => 't_qty',
                                    'class' => 'form-control t_qty',
                                    'value' => '',
                                    'readonly' => 'readonly'
                                );
                                echo form_input($form_input);
                                ?>
                            </td>
                        </tr>
                    </table>

                    <div class="text-center">
                        <input type="submit" name="submit" value="Add perchase"  class="btn btn-lg btn-success" onClick="return confirm('Are you sure want to Submite');"/>
                    </div>
                </div>


                <div class="clearfix"></div> -->

                <?php echo form_close() ?>      

            </div>
        </div>
        <!-- End  Working area --> 

        <!-- start  add the row --> 

        <script>

            $.noConflict();
            jQuery(document).ready(function () {
                //Teacher Select 
            
            $("#type_container").on('click', '#department_id', function(){
                var department_id = $(this).val() ; 

                    console.log(department_id);
            })

            $("#type_container").on('change', '#department_id', function(){
                    var department_id = $(this).val() ; 

                    console.log(department_id);
                    $.ajax({
                      url: "<?php echo base_url() ?>index.php/home/getclass/"+department_id,

                      beforeSend: function( xhr ) {
                        xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                        $("#class_id").html("<option>Loading .... </option>") ; 
                      }
                    })
                  .done(function( data ) {
                     $("#class_id").html(data); 
               });
             });
                //-----------------------------------

                $(".new_form").hide();


                $("#term").autocomplete({
                    source: '<?php echo base_url(); ?>index.php/requisition/suggation',
                    minLength: 1,
                    select: function (event, ui)
                    {
                        $("#item").val(ui.item.value.name);
                        additemrow(ui.item.value);

                    }
                });

                $("#term").focus(function () {
                    $("#term").val('');

                });


                $("#term").keypress(function (event) {
                    if (event.which == 13) {
                        var id = $(this).val();
                        additemrow(id);
                    } else
                    {
                        // auto complete 
                    }

                });




                /* $('#sandbox-container input').datepicker({
                 KeyboardNavigation: false,
                 todayHighlight: true,
                 format: 'dd-mm-yyyy',
                 autoclose: true
                 });*/

                $("#add").click(function () {
                    var row = "<tr class='frow'>" + $(".frow").html() + "</tr>";
                    $(".tableproduct tr:last-child").last().after(row);
                });


                $("#remove").click(function () {
                    $(".tableproduct tr:last-child").last().remove();
                    call_all();
                });



            });


            function additemrow(id)
            {
                var id = id;
                getproduct(id);

            }


            function getproduct(id)
            {

                var id = parseInt(id);

                var flag = true;

                $(".pid").each(function (index) {
                    // console.log( $( this ).val() );
                    var d = parseInt($(this).val());
                    // alert(id+"-"+d) ;
                    if (id == d)
                    {
                        var cv = parseInt($(".q_" + id).val());

                        $(".q_" + id).val(cv + 1);
                        call_all();
                        flag = false;
                    }
                });

                if (flag) {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url(); ?>requisition/getproduct/" + id,
                        dataType: "json",
                        success: function (books) {

                            if (books != "")
                            {

                                $('.tableproduct').append('<tr id="line_' + books.id + '" >\n\
                                                                  <td  ><i   class="remove_item glyphicon glyphicon-minus-sign btn btn-warning btn-xs "  itemid="' + books.id + '" ></i></td>\n\
                                                                  <td><input name="pid[]" class=" pid"  value="' + books.id + '" type="hidden" >' + books.book_name + '</td>\n\
                                                                  <td>' + books.book_code + ' </td>\n\
                                                                  <td><input name="price[]" class=" "  value="' + books.rate + '" type="hidden" > ' + books.rate + '</td>\n\
                                                                  <td> <input type="number" name="qty[]"   id="qty" min="1" value="1" class="q_' + books.id + ' qty form-control "  onChange="call_all()" /></td>\n\
                                                            </tr>');

                            } else
                            {
                                alert("Item Not Fount By This Id " + id);
                            }
                        }
                    });
                }
            }

            $(document.body).on('click', '.remove_item', function () {
                var id = $(this).attr("itemid");
                $("#line_" + id).remove();
                call_all();
            });


            $('.table').on("change", call_all);


            function toatalquantity() {
                var sum = 0;
                // or $( 'input[name^="ingredient"]' )
                $('input[name^="qty"]').each(function (i, e) {
                    var v = parseInt($(e).val());
                    if (!isNaN(v))
                        sum += v;
                });

                // alert(sum) ; 
                $(".t_qty").val(sum);
            }


            function toatalcost() {
                var sum = 0;
                // or $( 'input[name^="ingredient"]' )
                $('input[name^="total"]').each(function (i, e) {
                    var v = parseInt($(e).val());
                    if (!isNaN(v))
                        sum += v;
                });

                // alert(sum) ; 
                $(".t_price").val(sum);
            }




            function WO() {
                var table = document.getElementById("plateVolumes");



            }

            function call_all()
            {
                WO();
                toatalcost();
                toatalquantity();

            }

        </script>



        <?php $this->load->view('common/footer') ?>
        



