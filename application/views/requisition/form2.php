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


   

        <!-- start  add the row --> 

       <!--  <script>

            $.noConflict();
            jQuery(document).ready(function () {
                //Teacher Select 
            
                $(".requisition").on('click', '.department_id', function(){
                    var department_id = $(this).val() ; 
                    // var id = $(this).parents().html();
                        // console.log(id);
                })

                $(".requisition").on('change', '.department_id', function(){
                        var department_id = $(this).val() ; 
                        var id = $('.requisition').attr('id');
                        console.log(department_id);
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
             });
                //-----------------------------------



        </script> -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="input_fields_wrap">
                        <button class="add_field_button btn btn-primary">Add More Fields</button>
                        <div><input type="text" name="mytext[]" class="form-control"></div>
                    </div>
                </div>
            </div>
        </div>

        

        <script type="text/javascript">
            $(document).ready(function() {
                var max_fields      = 10; //maximum input boxes allowed
                var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                var add_button      = $(".add_field_button"); //Add button ID
                
                var x = 1; //initlal text box count
                $(add_button).click(function(e){ //on add input button click
                    e.preventDefault();
                    if(x < max_fields){ //max input box allowed
                        x++; //text box increment
                        $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                    }
                });
                
                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').remove(); x--;
                })
            });
        </script>




        <?php $this->load->view('common/footer') ?>
        



