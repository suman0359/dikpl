<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('settings/common/sidebar');
// $this->load->view('common/control_panel');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Settings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        </ol>
    </section>

    <!-- end: Bred Crumb -->

    <div class="col-md-12 home-page"> 


        <h2 class="alert alert-success text-center">Welcome Book Management !</h2>
        <div class="list-unstyled list-inline home_menu"> 
            <?php
            $this->load->view('settings/common/menu');
            ?>
        </div>
        <div class="clearfix"></div>


    </div>


    <?php
    $this->load->view('common/footer');
    ?>