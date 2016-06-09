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
            <li class="active"><a href="<?php echo base_url() ?>jonal">Jonal</a></li>
            <li class="active"><a href="<?php echo base_url() ?>jonal/add">Add Jonal</a></li>
        </ol>
    </section>
    <br/>

    <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>
        <h2> Add New jonal </h2>


        <?php
        echo form_open('');
        ?>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label> jonal Name </label>
                    <?php
                        $form_input     = array(
                        'name'          => 'name',
                        'class'         => 'form-control ',
                        'value'         => $name,
                        'required'      => 'required',
                        'placeholder'   => 'Jone/Jonal Name',
                        'size'          => '50'
                        );
                        echo form_input($form_input);
                    ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">


                    <label>Division Name </label>
                    <div>
                        <select name="division_id" class="form-group form-control">
                            <option value="0" >select Option</option>
                            <?php foreach ($division_list as $division) { ?>

                                <option value="<?php echo $division["id"]; ?>" 
                                        <?php if ($division["id"] == $division_id) {
                                            echo 'selected';
                                        } ?> >
                                <?php echo $division["name"]; ?>
                                </option>

<?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">


                    <label>Jonal Head Name </label>
                    <div>
                        <select name="jonal_head_id" class="form-group form-control">
                            <option value="0" >select Option</option>
                            <?php foreach ($jonal_head_list as $jonal_head) { ?>

                                <option value="<?php echo $jonal_head["id"]; ?>" 
                                        <?php if ($jonal_head["id"] == $jonal_head_id) {
                                            echo 'selected';
                                        } ?> >
                                <?php echo $jonal_head["name"]; ?>
                                </option>

<?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Start: Multi Select Start From Here  -->
            <div class="col-md-12">
                 
                <div class="row">
                    <div class="col-xs-5">
                        <label for="DiscritName">Select District Name FROM</label>
                        <select name="from[]" id="search" class="form-control" size="8" multiple="multiple">
                            <?php foreach ($district_list as $value) { ?>
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
                        <label for="DiscritName">Select District Name To</label>
                        <select name="district_list[]" id="search_to" class="form-control" size="8" multiple="multiple">
                            
                            <?php if (!empty($district_info)) {
                                foreach ($district_info as $value) { ?>
                                   <option value="<?php echo $value->district_id ?>"><?php echo $value->district_name; ?></option> 
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
           
            <div class="col-md-2"><br>
                <div class="pull-right"> 

                    <?php
                    $form_input = array(
                        'name' => 'submit',
                        'class' => 'btn btn-lg btn-success ',
                        'value' => 'Add Jone/Jonal'
                    );

                    echo form_submit($form_input);
                    echo form_close()
                    ?> 

                </div> 
            </div>
        </div>



        <!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>
