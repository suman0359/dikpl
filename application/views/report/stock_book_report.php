<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
?> 

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top:-10px!important;">
        <h1>
            Distribution Reports 

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <!--<li><a href="<?php echo base_url() ?>donation"><i class="fa "></i> Report</a></li>-->
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area">
        <!-- <form action="<?php echo base_url() . "report/search_distribution_report/"; ?>" method="POST" >
            <div class="col-md-8">
                <div class="search_bar">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="Search MPO name" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                        <div class="form-group">
                            <input type="submit" value="Search" class="btn btn-primary">
                            <div class="clearfix"></div>
                        </div>
            </div>

        </form> -->

        <div class="col-md-12">

            <a href="<?php echo base_url(); ?>distribute/distribute_book" class="btn btn-primary pull-right">বই বিতরণ</a>
            <table class="table table-bordered table-hover ">

                <tr>
                    <th style="text-align: center;">#</th>

                    <th style="text-align: center">বইয়ের নাম</th>
                    <th style="text-align: center;">বইয়ের নাম পরিমান</th>
                    

                </tr>

                <tbody>
                    <?php
                    $serialNo = 1;
                    foreach ($book_list as $value) {
                        ?>
                        <tr>
                            <td><?php echo $serialNo; ?></td>

                            <td><?php echo $value['book_name']; ?></td>
                            <td align="center"><?php echo $value['quantity']; ?></td>
                            
                        </tr>
                        <?php
                        $serialNo++;
                    }
                    ?>
                </tbody>
            </table> 
        </div>

    </div>      

    <!-- End  Working area --> 
    <?php $this->load->view('common/footer') ?>