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
                <li class="active"><a href="<?php echo base_url()?>college">College</a></li>
                <li class="active"><a href="<?php echo base_url()?>college/add">Add College</a></li>
            </ol>
        </section>
    <br/>

    <!-- Start Working area --> 
<div class="col-md-12 main-mid-area"> 
   <?php $this->load->view('common/error_show') ?>
    <h2> Add New College </h2>
    

    <?php 
    echo form_open('') ; 
    ?>

<div class="row">
	<div class="col-md-3 col-sm-4">
		<div class="form-group">
		    <label> Collge Name </label>
		    <?php 
		    $form_input = array(
		        'name' => 'name',
		        'class' =>'form-control ', 
		        'value' => $name, 
		        'required' => 'required',
		        'placeholder'=>'Collge Name',
		        'size' => '50'
		    );
		    echo form_input($form_input); 
		    ?>
		</div>
	</div>

    <div class="col-md-2 col-sm-3">
        <div class="form-group">
       
            
            <label>District Name </label>
            <div>
            <select name="district_id" class="form-group form-control" id="district_id">
            <option value="0" >select Option</option>
                <?php foreach ($district_list as $district) { ?>
                
                <option value="<?php echo $district["id"];?>" <?php if($district["id"]==$district_id){echo 'selected';} ?> >
                    <?php echo $district["name"]; ?>
                </option>

                <?php }?>
            </select>
            </div>
        </div>
    </div>


    <div class="col-md-2 col-sm-3">
        <div class="form-group">
       
           
            <label>Thana Name </label>
            <div>
            <select name="thana_id" class="form-group form-control" id="thana_id">
            <?php 
            if($thana_id !== ''){
            $thana = $this->CM->getInfo('thana', $thana_id); 

            ?>
            <option value="<?php echo $thana->id?>" ><?php echo $thana->name; ?> </option>
            <?php } else {?>
            <option value="0" >select District First </option>
                 <?php } ?>
            </select>
            </div>
        </div>
    </div>
    
    
    <div class="col-md-2 col-sm-3">
        <div class="form-group">
       
            
            <label>Division  </label>
            <div>
            <select name="division_id" class="form-group form-control" id="division_id">
            <option value="0" >select Option</option>
                <?php foreach ($division_list as $division) { ?>
                
                <option value="<?php echo $division["id"];?>" <?php if($division["id"]==$division_id){echo 'selected';} ?> >
                    <?php echo $division["name"]; ?>
                </option>

                <?php }?>
            </select>
            </div>
        </div>
    </div>


    <div class="col-md-2 col-sm-3">
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
    
    <div class="col-md-2 col-sm-3">
        <div class="form-group">
       
           
            <label>Sale Executive </label>
            <div>
            <select name="executive_id" class="form-group form-control" id="executive_id">
            <?php 
            if($executive_id !== ''){
                
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

    <!-- Select Plugin Call for College -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#district_id").select2();
            $("#thana_id").select2();
        });
    </script>

<style type="text/css">
    
    .ms-options-wrap,
.ms-options-wrap * {
    box-sizing: border-box;
}

.ms-options-wrap > button:focus,
.ms-options-wrap > button {
    position: relative;
    width: 100%;
    text-align: left;
    border: 1px solid #aaa;
    background-color: #fff;
    padding: 5px 20px 5px 5px;
    margin-top: 1px;
    font-size: 13px;
    color: #aaa;
    outline: none;
    white-space: nowrap;
}

.ms-options-wrap > button:after {
    content: ' ';
    height: 0;
    position: absolute;
    top: 50%;
    right: 5px;
    width: 0;
    border: 6px solid rgba(0, 0, 0, 0);
    border-top-color: #999;
    margin-top: -3px;
}

.ms-options-wrap > .ms-options {
    position: absolute;
    left: 0;
    width: 100%;
    margin-top: 1px;
    margin-bottom: 20px;
    background: white;
    z-index: 2000;
    border: 1px solid #aaa;
}

.ms-options-wrap > .ms-options > .ms-search input {
    width: 100%;
    padding: 4px 5px;
    border: none;
    border-bottom: 1px groove;
    outline: none;
}

.ms-options-wrap > .ms-options .ms-selectall {
    display: inline-block;
    font-size: .9em;
    text-transform: lowercase;
    text-decoration: none;
}
.ms-options-wrap > .ms-options .ms-selectall:hover {
    text-decoration: underline;
}

.ms-options-wrap > .ms-options > .ms-selectall.global {
    margin: 4px 5px;
}

.ms-options-wrap > .ms-options > ul{
    list-style-type: none;
    padding-left: 0;
    display: block;
}

.ms-options-wrap > .ms-options > ul >label{
    padding-right: 5px !important;
}

.ms-options-wrap > .ms-options > ul > li.optgroup {
    padding: 5px;
}
.ms-options-wrap > .ms-options > ul > li.optgroup + li.optgroup {
    border-top: 1px solid #aaa;
}

.ms-options-wrap > .ms-options > ul > li.optgroup .label {
    display: block;
    padding: 5px 0 0 0;
    font-weight: bold;
}

.ms-options-wrap > .ms-options > ul label {
    position: relative;
    display: inline-block;
    width: 100%;
    padding: 4px;
    margin: 1px 0;
}

.ms-options-wrap > .ms-options > ul li.selected label,
.ms-options-wrap > .ms-options > ul label:hover {
    background-color: #efefef;
}

.ms-options-wrap > .ms-options > ul input[type="checkbox"] {
    margin-right: 5px;
    position: absolute;
    left: 4px;
    top: 7px;
}


</style>

    <div class="col-md-2 col-sm-3">
        <div class="form-group">
            <label> College Category </label>

            <!-- ********************************************************* -->
            
            <select name="college_category" id="college_category" multiple class="form-control">
                <option value="HSC" <?php 

                foreach ($college_category_list as $value) {
                    if(in_array("HSC", $value)) echo "selected";
                } 

                ?> >HSC</option>

                <option value="Degree" <?php 

                foreach ($college_category_list as $value) {
                    if(in_array("Degree", $value)) echo "selected";
                } 

                ?> >Degree</option>

                <option value="Hon's" <?php 

                foreach ($college_category_list as $value) {
                    if(in_array("Hon's", $value)) echo "selected";
                } 

                ?> >Hon's</option>

                <option value="Master's Prili" <?php 

                foreach ($college_category_list as $value) {
                    if(in_array("Master's Prili", $value)) echo "selected";
                } 

                ?> >Master's Prili</option>
                
                <option value="Master's Final" <?php 

                foreach ($college_category_list as $value) {
                    if(in_array("Master's Final", $value)) echo "selected";
                } 

                ?>
                >Master's Final</option>
                
            </select>

            <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->

            <script src="<?php echo base_url(); ?>/assets/plugins/jquery.multiselect.js"></script>
            <script>
            $('select[multiple]').multiselect({
                columns: 1,
                placeholder: 'Select options'
            });
            </script>
            <!-- ********************************************************* -->

        </div>
    </div>


		<div class="col-md-2"><br>
		<div class="pull-right"> 

    <?php 
    $form_input = array(
        'name' => 'submit',
        'class' =>'btn btn-lg btn-success ', 
        'value' => 'Add College'
    );

    echo form_submit($form_input); 
    echo form_close() 
    ?> 

   </div> 
	</div>
</div>
<script>
    $(document).ready(function(){

        $(".main-mid-area").on('change', '#district_id', function(){
        var did = $(this).val() ; 
        $.ajax({
          url: "<?php echo base_url() ?>index.php/home/getthana/"+did,

          beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
            $("#thana_id").html("<option>Loading .... </option>") ; 
          }
        })
      .done(function( data ) {
         $("#thana_id").html(data); 
   });
 });
 
 
 
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

