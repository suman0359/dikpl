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
                <li class="active"><a href="<?php echo base_url()?>thana">Thana</a></li>
                <li class="active"><a href="<?php echo base_url()?>thana/add">Add Thana</a></li>
            </ol>
        </section>
    <br/>

    <!-- Start Working area --> 
<div class="col-md-9 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
    <h2> Add New Thana </h2>
    

    <?php 
    echo form_open('') ; 
    ?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label> Thana Name </label>
            <?php 
            $form_input = array(
                'name' => 'name',
                'class' =>'form-control ', 
                'value' => $name, 
                'required' => 'required',
                'placeholder'=>'Thana Name',
                'size' => '50'
                
            );
            echo form_input($form_input); 
            ?>
        </div>
    </div>
    
    
    <div class="col-md-3">
        <div class="form-group">
       
            
            <label>Division  </label>
            <div>
            <select name="division_id" class="form-group form-control" id="division_id">
            <option value="0" >select Option</option>
            
                <?php foreach ($division_list as $division) { ?>
                
                <option value="<?php echo $division["id"];?>" >
                    <?php echo $division["name"]; ?>
                </option>

                <?php }?>
            </select>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
       
           
            <label>Jonal </label>
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
    </div>
    

    <div class="col-md-3">
        <div class="form-group">


            <label>District Name </label>
            <div>
                <select name="district_id" class="form-group form-control">
                    <option value="0" >select Option</option>
                    <?php foreach ($district_list as $district) { ?>

                        <option value="<?php echo $district["id"]; ?>" >
                        <?php echo $district["name"]; ?>
                        </option>

<?php } ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
       
           
            <label>Sale Executive </label>
            <div>
            <select name="executive_id" class="form-group form-control" id="executive_id">
            <?php 
            if($executive_id !== '0'){
                
            $user = $this->CM->getInfo('user', $executive_id); 


            ?>
            <option value="<?php echo $user->id?>" ><?php echo $user->name; ?> </option>
            <?php } else {?>
            <option value="0" >Select Jonal First </option>
                 <?php } ?>
            </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-12"><br>
        <div class="pull-right"> 

    <?php 
    $form_input = array(
        'name' => 'submit',
        'class' =>'btn btn-lg btn-success ', 
        'value' => 'Add Thana'
       
    );

    echo form_submit($form_input); 
    echo form_close() 
    ?> 

   </div> 
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".main-mid-area").on('change', '#division_id', function(){
        var div_id = $(this).val() ; 
        $.ajax({
          url: "<?php echo base_url() ?>index.php/home/getjonal/"+div_id,
          beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            $("#jonal_id").html("<option>Loading .... </option>") ; 
          }
        })
      .done(function( data ) {
         $("#jonal_id").html("<option value=''>Select a Jone </option>"); 
            data=JSON.parse(data);
        $.each(data, function(key, val) {
              $("#jonal_id").append("<option value='"+val.id+"'>"+val.name+"</option>");
            });  
            });
        }); 
        
        
 
        $(".main-mid-area").on('change', '#jonal_id', function(){
        var jiv_id = $(this).val() ; 
        $.ajax({
          url: "<?php echo base_url() ?>index.php/home/getexecutive/"+jiv_id,
          beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            $("#executive_id").html("<option>Loading .... </option>") ; 
          }
        })
      .done(function( data ) {
         $("#executive_id").html("<option value=''>Select an Excutive  </option>"); 
            data=JSON.parse(data);
        $.each(data, function(key, val) {
              $("#executive_id").append("<option value='"+val.id+"'>"+val.name+"</option>");
            });  
            });
        }); 
    });
</script>

<!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>

