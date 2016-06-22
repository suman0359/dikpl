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
            Expense Reports 

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <!--<li><a href="<?php echo base_url() ?>donation"><i class="fa "></i> Report</a></li>-->
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area">
        
        <div class="col-md-12">


            <table class="table table-bordered table-hover ">

                <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">তারিখ </th>
                    <?php if ($user_role == 1) { ?>
                        <th style="text-align: center">যাতায়াত খরচ</th>
                    <?php } ?>
                    <th style="text-align: center">যাতায়াত খরচ</th>
                    <th style="text-align: center">মোবাইল খরচ</th>
                    <th style="text-align: center">আপ্যয়ন খরচ</th>
                    <th style="text-align: center">প্যাকেট উত্তোলন</th>
                    <th style="text-align: center">অন্যান্য খরচ</th>
                    <th style="text-align: center;">মোট</th>
                    <th style="text-align: center;">Expense Type</th>
                    <th style="text-align: center">যাত্রা শুরুর কি: মি:</th>
                    <th style="text-align: center;">যাত্রা শেষের কি: মি:</th>
                    <th style="text-align: center;">মোট ব্যবহত কি: মি:</th>
                    <th style="text-align: center;">ব্যক্তিগত ব্যবহার</th>
                    <th style="text-align: center;">অফিস কাজে ব্যবহার</th>
                    <th style="text-align: center;">কি: মি: রেট</th>
                </tr>

                <tbody>
                    <?php
                    $serialNo = 1;
                    foreach ($expense_list as $value) {
                        ?>
                        <tr align="center">
                            <td><?php echo $serialNo; ?></td>
                            <td><?php echo $value['date']; ?></td>
                            <?php if ($user_role == 1) { ?>
                                <td><?php echo $value['entry_by']; ?></td>
                            <?php } ?>
                            <td><?php echo $value['journey_cost']; ?></td>
                            <td><?php echo $value['mobile_cost']; ?></td>
                            <td><?php echo $value['entertainment_cost']; ?></td>
                            <td><?php echo $value['packet_lift']; ?></td>
                            <td><?php echo $value['others_cost']; ?></td>
                            <td><?php echo $value['total_cost']; ?></td>
                            <td><?php echo $value['expense_type']; ?></td>
                            <td><?php echo $value['start_journey_km']; ?></td>
                            <td><?php echo $value['end_journey_km']; ?></td>
                            <td><?php echo $value['total_journey_km']; ?></td>
                            <td><?php echo $value['personal_use_km']; ?></td>
                            <td><?php echo $value['office_use_km']; ?></td>
                            <td><?php echo $value['kilomitter_rate']; ?></td>

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