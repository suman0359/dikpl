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

        <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>
        <h2> Book Requisition  </h2>

        <!-- ************************************************* -->
        <?php echo form_open(); ?>


<h1>Student Marks</h1>
<div id='container'>
<form id='Prescription' method='post' name='Prescription' action='index.php'>

<table class="table responsive" border="1" cellspacing="0">
  <tr>
    <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
    <th>S. No</th>
    <th>Department Name</th>
    <th>Class Name</th>
    <th>Tamil</th>
    <th>English</th>
    <th>Computer</th>
    <th>Total</th>
  </tr>
  <tr>
    <td><input type='checkbox' class='case'/></td>
    <td>1.</td>
    <td>
        <select name="department_id[]" class="form-control department_id">
            <option value="">Select Department Name</option>
            <?php 
            foreach ($dep_list as $value) { ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?>
        </select>
    </td>
    <td>
        <select name="class_id[]" id="class_id" class="form-control"><option value="">Select Class Name</option></select>
    </td>
    <td><input type='text' id='tamil' name='tamil[]'/></td>
    <td><input type='text' id='english' name='english[]'/> </td>
    <td><input type='text' id='computer' name='computer[]'/></td>
    <td><input type='text' id='total' name='total[]'/> </td>
  </tr>
</table>


<button type="button" class='btn btn-warning delete'>- Delete</button>
<button type="button" class='btn btn-primary addmore'>+ Add More</button>
<p>
    <input type='submit' name='submit' value='submit' class='btn btn-success but'/>
</p>
</form>

<div class="clearfix"></div>
<br/>



</div>



<script>
$(".delete").on('click', function() {
    $('.case:checkbox:checked').parents("tr").remove();

});
var i=2;
$(".addmore").on('click',function(){

    var data="<tr><td><input type='checkbox' class='case'/></td><td>"+i+".</td>";


    data +="<td><select name='department_id[]' id='department_id"+i+"' class='form-control'><?php foreach ($dep_list as $value) { ?><option value='<?php echo $value['id']; ?>'><?php echo $value['name']; ?></option><?php } ?></select></td> <td><select name='class_id[]' id='class_id"+i+"' class='form-control'><option value=''>Select Class Name</option></select></td><td><input type='text' id='tamil"+i+"' name='tamil[]'/></td><td><input type='text' id='english"+i+"' name='english[]'/></td><td><input type='text' id='computer"+i+"' name='computer[]'/></td><td><input type='text' id='total"+i+"' name='total[]'/></td></tr>";
    
    // data +="<td><input type='text' id='first_name"+i+"' name='first_name[]'/></td> <td><input type='text' id='last_name"+i+"' name='last_name[]'/></td><td><input type='text' id='tamil"+i+"' name='tamil[]'/></td><td><input type='text' id='english"+i+"' name='english[]'/></td><td><input type='text' id='computer"+i+"' name='computer[]'/></td><td><input type='text' id='total"+i+"' name='total[]'/></td></tr>";


    $('table').append(data);
    i++;
});

function select_all() {
    $('input[class=case]:checkbox').each(function(){ 
        if($('input[class=check_all]:checkbox:checked').length == 0){ 
            $(this).prop("checked", false); 
        } else {
            $(this).prop("checked", true); 
        } 
    });
}

</script>
        <!-- <div id="type_container" class="input_fields_wrap">
            <div class="row " id="edit-0">
                
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
                    <label for="">&nbsp;</label>
                    <!-- <button class="add_field_button btn btn-primary">Add More Fields</button> -->
                    <!-- <a class="add_field_button btn btn-primary add-type form-control " href="javascript: void(0)" tiitle="Click to add more"><i class="glyphicon glyphicon-plus-sign" style="margin-right: 8px"></i> Add New Row</a>
                </div>
            </div>
        </div>  -->
    </div>

       <!--  <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="input_fields_wrap">
                        <button class="add_field_button btn btn-primary">Add More Fields</button>
                        <div><input type="text" name="mytext[]" class="form-control"></div>
                    </div>
                </div>
            </div>
        </div>
 -->
        

       <!--  <script type="text/javascript">
            $(document).ready(function() {
                var max_fields      = 10; //maximum input boxes allowed
                var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                var add_button      = $(".add_field_button"); //Add button ID
                
                var x = 1; //initlal text box count
                $(add_button).click(function(e){ //on add input button click
                    e.preventDefault();
                    if(x < max_fields){ //max input box allowed
                        x++; //text box increment
                        $(wrapper).append('<div class="row " id="edit-0"><div class="col-md-2"><div class="form-group"><label for="book_name">Department Name</label><select name="department_id[]" id="department_id" class="form-control"><option value="">Select Department Name</option><?php foreach ($dep_list as $value) { ?><option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option> <?php } ?></select></div></div></div><a href="#" class="remove_field">Remove</a>'); //add input box
                        // $(wrapper).append('<div><input type="text" name="mytext[]"/></div>'); //add input box
                    }
                });
                
                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('.row').remove(); x--;
                })
            });
        </script> -->




        <?php $this->load->view('common/footer') ?>
        



