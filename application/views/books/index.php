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
        <h1>Dashboard<small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="<?php echo base_url() ?>books">Books</a></li>
        </ol>
    </section>
    <br/>



    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>

        <div class="searchbar " >
            <div class="col-md-8"  >
            </div>

            <div class="pull-right"> 
                <a href="<?php echo base_url() ?>books/add" class="btn btn-info pull-right" > <i class="fa fa-plus-square gap">  </i> Add Books</a> 
            </div>
            <div class="clearfix"></div>
        </div> 


        <div class="col-md-12">

            <table class="table table-bordered table-hover ">
                <tr>
                    <th id="action_btn_align">#</th>
                    <th id="action_btn_align">বইয়ের নাম</th>
                    <th id="action_btn_align">লেখকের নাম</th>
                    <th id="action_btn_align">বিষয় / বিভাগ </th>
                    <th id="action_btn_align">শ্রেণী</th>
                    <th id="action_btn_align">বইয়ের ধরন</th>
                    <th id="action_btn_align">গায়ের মূল্য</th>
                    <th id="action_btn_align">বিক্রয় মূল্য</th>
                    <th id="action_btn_align">Action</th>

                </tr>



                <?php
                //var_dump($college_list) ; 
                foreach ($books_list as $books) { 
                    $company_name = $books->company_name;
                    if(!empty($company_name)){
                        if ($company_name==1){ $company_name = "গ্রন্থ কুটির"; }
                        if ($company_name==2){ $company_name = "দিকদর্শন "; }
                    }
                    ?>


                    <tr id="action_btn_align">
                        <td> <?php echo $books->book_id; ?></td>
                        <td> <?php echo $books->book_name; ?></td>
                        <td> <?php echo $books->writter_name; ?></td>
                        <td> <?php echo $books->subject_name; ?></td>
                        <td> <?php echo $books->class_name; ?></td>
                        <td> <?php echo $company_name; ?></td>
                        <td> <?php echo $books->regular_price; ?></td>
                        <td> <?php echo $books->sell_price; ?></td>

                        <td>     
                            <a class="btn btn-primary btn-flat" href="<?php echo base_url(); ?>books/edit/<?php echo $books->book_id; ?>">
                            <i class="fa fa-pencil-square-o" ></i> Edit </a>
                            <a class="btn btn-danger btn-flat "  onclick="return confirm('Are you sure want to delete');" href="<?php echo base_url(); ?>books/delete/<?php echo $books->book_id; ?>">
                            <i class="fa fa-pencil-square-o" ></i> Delete </a>
                        </td>     
                    </tr>
<?php } ?>

            </table> 
        </div>

        <div>         
<?php echo $this->pagination->create_links();
?>  
        </div>

        <!-- End  Working area --> 
<?php $this->load->view('common/footer') ?>