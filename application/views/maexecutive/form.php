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
                <li><a href="<?php echo base_url()?>home"><i class="fa fa-home"></i> Home</a></li>
                <li class="active"><a href="<?php echo base_url()?>user">User</a></li>
                <li class="active"><a href="<?php echo base_url()?>user/add">Add User</a></li>
            </ol>
        </section>
    <br/>


<!-- Start Working area --> 
<div class="col-md-9 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
    <h2> Add New User </h2>
    

    <?php 
    echo form_open_multipart('') ; 
    ?>


<div class="form-group">
    <label> User Name </label>
    <?php 
    $form_input = array(
        'name' => 'name',
        'class' =>'form-control ', 
        'value' => $name, 
        'required' => 'required',
        'placeholder'=>'User Name'
        
    );
    echo form_input($form_input); 
    ?>
</div>





   
    
    
<div class="form-group">
    
    <label>Email  </label>
    <?php 
    $form_input = array(
        'name' => 'email',
        'class' =>'form-control ', 
        'value' => $email,
        'type'=>'email',
        'required' => 'required',
         'placeholder'=>'Name@gmail.com'
        
    );
    echo form_input($form_input); 
    ?>
    
</div>
    
   
<div class="form-group">
    
    <label>Password  </label>
    <?php 
    $form_input = array(
        'name' => 'password',
        'class' =>'form-control ', 
        'value' => '',
         
        'placeholder'=>'********'
    );
    echo form_password($form_input); 
    ?>
    
</div>
   
<div class="form-group">
    
    <label>Phone  </label>
    <?php 
    $form_input = array(
        'name' => 'phone',
        'class' =>'form-control ', 
        'value' => $phone,
         'placeholder'=>'01**  ** ** **'
        
    );
    echo form_input($form_input); 
    ?>
    
</div> 
<div class="form-group">
    
    <label>Image  </label>
    <?php 
    $form_input = array(
        'name' => 'image',
        'class' =>'', 
        'value' => '',
        'type'=>'file'
         
        
    );
    echo form_input($form_input); 
    if($image){
    ?>
    
    <img src="<?php echo base_url()?>uploads/<?php echo $image; ?>" style="height:40px; width: 50px; margin-top: 1px;" />
    <?php } ?>
</div> 
    
   <div class="form-group">
    <label> User Address </label>
    <?php 
    $form_input = array(
        'name' => 'address',
        'class' =>'form-control ', 
        'value' => $address, 
        'rows' => 3, 
        'cols' => 5, 
        'size' => 100, 
        'required' => 'required',
         'placeholder'=>'Address'
    );
    echo form_textarea($form_input); 
    ?>
    
</div> 

<div class="form-group col-md-3">
    
    <label>Division  </label>
    <div>
    
        <?php
        
        $dname=array("0"=>'All');
        $class='class="form-control division_id" ';
        foreach($division_list as $division){ 
            $dname[$division['id']]=$division['name'];
            }
         
            echo form_dropdown('division_id',$dname,$division_id,$class);
            
            ?>
      
        
        
    </div>
</div>

<div class="form-group col-md-3">
    
    <label> Jonal  </label>
  
     
      
            <div>
                <select name="jonal_id" class="form-group form-control" id="jonal_id">
                <?php 
                if($jonal_id !== ''){
                $jonal = $this->CM->getInfo('jonal', $jonal_id); 

                ?>
                <option value="<?php echo $jonal->id?>" ><?php echo $jonal->name; ?> </option>
                <?php } else {?>
                <option value="0" >select Division First </option>
                     <?php } ?>
                </select>
            </div>
        
        
   
</div>

<div class="form-group col-md-3">
    <label for="district">District</label>
    <div>
        <select name="district_id" class="form-group form-control" id="district_id">
        <?php 
        if($district_id !== ''){
        $district = $this->CM->getInfo('district', $district_id); 

        ?>
        <option value="<?php echo $district->id?>" ><?php echo $district->name; ?> </option>
        <?php } else {?>
        <option value="0" >select Jonal First </option>
             <?php } ?>
        </select>
    </div>
</div>
    

    <!-- Start: Multi Select Start From Here  -->
            <div class="col-md-12">
                 
                <div class="row">
                    <div class="col-xs-5">
                        <label for="DiscritName">Select Thana Name FROM</label>
                        <select name="from[]" id="search" class="form-control" size="8" multiple="multiple">
                            <?php foreach ($thana_list as $value) { ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="col-xs-2">
                        <br><br><br>
                        <button type="button" id="search_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                        <button type="button" id="search_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        <button type="button" id="search_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                        <button type="button" id="search_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                    </div>
                    
                    <div class="col-xs-5">
                        <label for="DiscritName">Select Thana Name To</label>
                        <select name="thana_list[]" id="search_to" class="form-control" size="8" multiple="multiple">
                            
                            <?php if (!empty($thana_info)) {
                                foreach ($thana_info as $value) { ?>
                                   <option value="<?php echo $value->thana_id ?>"><?php echo $value->thana_name; ?></option> 
                              <?php  }
                            } ?>

                        </select>
                    </div>
                </div>
                

                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $('#search').multiselect({
                            search: {
                                left: '<input autocomplete="off" type="text" name="q" class="form-control" placeholder="Search..." />',
                                right: '<input autocomplete="off" type="text" name="q" class="form-control" placeholder="Search..." />',
                            }
                        });
                    });
                </script>
                
            </div>
            <!-- End: Multi Select Start From Here -->

    
    <div class="clearfix"></div>
    <br>
<div class="col-md-12 text-right">
    <?php 
        $form_input = array(
            'name' => 'submit',
            'class' =>'btn btn-lg btn-success ', 
            'value' => 'Add User'
        );

        echo form_submit($form_input); 
    ?>
</div>

   <?php echo form_close() ?> 
    
    <script>
    $(document).ready(function(){

       
        $(".main-mid-area").on('change', '.division_id', function(){

        var div_id = $(this).val() ; 
        $.ajax({
          url: "<?php echo base_url() ?>index.php/home/getjonal/"+div_id,

          beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            $("#jonal_id").html("<option>Loading .... </option>") ; 

          }
        })
      .done(function( data ) {
       /* if ( console && console.log ) {
          console.log( "Sample of data:", data.slice( 0, 100 ) );
        }*/
      
         $("#jonal_id").html("<option value=''>Select a Jonal </option>"); 
            data=JSON.parse(data);
        $.each(data, function(key, val) {
              $("#jonal_id").append("<option value='"+val.id+"'>"+val.name+"</option>");
              
            });  
            

       });
     }); 

        $(".main-mid-area").on('change', '#jonal_id', function(){

        var jonal_id = $(this).val() ; 
        console.log(jonal_id);
        $.ajax({
          url: "<?php echo base_url() ?>index.php/home/getdistrict/"+jonal_id,

          beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            $("#district_id").html("<option>Loading .... </option>") ; 

          }
        })
      .done(function( data ) {
       /* if ( console && console.log ) {
          console.log( "Sample of data:", data.slice( 0, 100 ) );
        }*/
      
         $("#district_id").html("<option value=''>Select a District </option>"); 
            data=JSON.parse(data);
        $.each(data, function(key, val) {
              $("#district_id").append("<option value='"+val.id+"'>"+val.name+"</option>");
              
            });  
            

       });
     }); 
     
     // start getThana_list
     $(".main-mid-area").on('change', '#district_id', function(){

        var district_id = $(this).val() ; 
        console.log(district_id);
        $.ajax({
          url: "<?php echo base_url() ?>index.php/home/getthana/"+district_id,

          beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            $("#search").html("<option>Loading .... </option>") ; 

          }
        })
      .done(function( data ) {
       
         $("#search").html(data);
       });
     }); 
     // End getThana_list


    }); 

</script>


</div>
<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>
        
     

     
 