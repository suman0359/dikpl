    <?php //$this->load->view('common/css_link') ?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>দিকদর্শন প্রকাশনী Login Page</title>
    <link href="<?php echo base_url(); ?>style_sheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/space.css">
    <!-- font Awesome -->
    <!-- <link href="<?php echo base_url(); ?>style_sheet/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->


    <script src="<?php echo base_url(); ?>style_sheet/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>style_sheet/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>



</head>
<body>


  <p>
    <span id="fog">A long</span>
    <span id="fog-2">long time</span>
    <span id="glow">ago,</span>
    <span id="light">in a</span>
    <span id="stars">galaxy</span>
    <span id="stars-2">far</span>
    <span id="small-stars">far</span>
    <span id="small-stars-2">away…</span>
</p>  
    
 <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <?php $this->load->view('common/error_show'); ?>
            </div>
        </div>
        <div class="row">
           
            
            <div class="col-md-4 col-md-offset-4">
                <div class="logo">
                    <img src="<?php echo base_url(); ?>/dik_dorshon/dikdhorshon_logo.png" alt="Dik Dorshon">
                </div>
            </div>

            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title text-center">Please Sign In</h2>
                    </div>
                    <div class="panel-body">
                        
                            <?php echo form_open('', array('id'=>'loginform', 'role'=>'form')) ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required="">
                                    
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <input type="submit" value="Login" class="btn btn-lg btn-success btn-block" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>style_sheet/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>

<?php 
//$this->load->view('common/footer');
?>

