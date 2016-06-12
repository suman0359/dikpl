<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');
?>

<?php $name = $this->session->userdata("username"); $companyname = $this->session->userdata('companyname'); ?>

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


    <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 

        <div class="col-md-12 margin_padding">
            <div class="col-md-offset-4 col-md-6 voucher_top">

                <address class="company_info">



                </address>



            </div>
        </div>


        <?php
        $uid = $this->uri->segment(3);
        if (!empty($uid)) {
            ?>

            <div class="col-md-12 margin_padding voucher_memo_area">

                <h3>Requisition Transfer Form</h3>  
                <table width="100%"> 
                    <tr>

                        <td> 

                            <table >
                                <tr>
                                    <td >Id :</td>
                                    <td><?php echo $requisition_info->requisition_by; ?></td>
                                </tr>
                                <tr>
                                    <td>Requested  By :</td>
                                    <td> <?php
                                        $emp = $this->CM->getwhere('user', array('id' => $requisition_info->requisition_by));

                                        echo $emp->name;
                                        ?> </td>
                                </tr>



                            </table>
                        </td>

                        <td> 
                            <table class="pull-right">



                    </tr>
                    <tr>
                        <td>Request Date :</td>
                        <td>
                            <?php echo $requisition_info->date; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Division : </td>
                        <td> 
                            <?php
                            $college = $this->CM->getwhere('college', array('id' => $requisition_info->id));
                            $div = $this->CM->getwhere('division', array('id' => $college->division_id));
                            echo $div->name;
                            ?> 
                        </td>
                    </tr>




                </table>
                </td>
                </tr>
                </table>

            </div>




            <div class="col-md-12 margin_padding ">

                <table class="table voucher_item_area" >
                    <tr class="active voucher_header">
                        <td> Sl </td>
                        <td> Book Name </td>
                        <td  align="center"> Req. Quantity </td>
                        <td  align="center"> Transfer Q.</td>
                        <td> Price </td>
                        <td> Total </td>

                    </tr>
                    <?php
                    $i = 1;
                    $total_price = 0;
                    $total_quantity = 0;
                    foreach ($book_list as $book) {
                        ?>
                        <tr class="voucher_item">
                            <td><?php echo $i; ?></td>
                            <td> <?php echo $book['book_name'] ?> </td>
                            <td align="center"><?php echo $book['quantity']; ?></td>
                            <td  align="center"><?php
                                $form_input = array(
                                    'type' => 'number',
                                    'name' => 'quantity',
                                    'size' => '5',
                                    'value' => $book['quantity'],
                                    'class' => 'text-center quantity form-control',
                                    'style' => 'width: 70px',
                                    'min' => '0'
                                );

                                echo form_input($form_input);
                                ?></td>
                            <td class="price"><?php echo $book['price']; ?></td>
                            <td class="tt"><?php echo $total = $book['quantity'] * $book['price']; ?> </td>

                        </tr>
                        <?php
                        $total_price+=$total;
                        $total_quantity+=$book['quantity'];
                        $i++;
                    }
                    ?>
                    <tr class="voucher_total">
                        <td></td>
                        <td align="right">Total Quantity</td>
                        <td align="center"><?php echo $total_quantity; ?></td>
                        <td align="center"><?php echo $total_quantity; ?></td>
                        <td align="right">Total Price</td>
                        <td class="total_price"><?php echo $total_price; ?></td>

                    </tr>


                </table>


                <u>  Sender Comment :  </u> <br />
                <?php echo $requisition_info->comment; ?>
            </div>


            <div class="col-md-12 margin_padding voucher_bottom_area">
                <table width="100%"> 
                    <tr> 
                        <td> 

                            <table >
                                <tr>
                                    <td>Check  by </td>

                                </tr>
                                <tr class="voucher_bottom_left">
                                    <td>Name: .................................................... </td>

                                </tr>
                                <tr class="voucher_bottom_left">
                                    <td>Date: ...................................................... </td>

                                </tr>

                            </table>
                        </td>
                        <td> 

                            <table class="pull-right" >
                                <tr>
                                    <td>Approve by   </td>

                                </tr>
                                <tr class="voucher_bottom_left">
                                    <td>Name : <span style="border-bottom: 0.14em dotted #000; min-width: 175px; display: inline-block;"><?php echo $name; ?></span></td>

                                </tr>
                                <tr class="voucher_bottom_left">
                                    <td>Date : <span style="border-bottom: 0.14em dotted #000; min-width: 180px; display: inline-block;"><?php echo date("d-m-Y"); ?></span> </td>

                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>


            </div >


            <?php if ($requisition_info->requisition_status == 0) { ?>
                <div class="clearfix"></div>
                <div class="alert alert-info text-center"> This requisition already accept and send book according on this. </div>
            <?php } ?>

            <div class=" text-center no-print"> 
                <a href="JavaScript:history.back(-1)" class="btn btn-warning"> Back </a>

                <?php if (($requisition_info->requisition_status != '0') AND ( $this->session->userdata('user_type') == '1')) { ?>
                    <a href="<?php echo base_url() ?>index.php/purchase/add/<?php echo $requisition_info->id ?>" class="btn btn-success"> Transfer Book  </a>
                <?php } ?>
            </div>


            <!-- End  Working area --> 

        <?php } ?>

        <!-- start  add the row --> 

        <script>

            $('.quantity').on('change', function () {

                var subtotal = 0;
                var quantity = $(this).val();
                var price = $(this).closest("td").parent(this).find(".price").html();
                var tt = $(this).closest("td").parent(this).find(".tt").html();
                // console.log(quantity);
                // console.log(price);
                var total = quantity * price;
                // document.getElementsByClassName("tt").innerHTML=total;
                $(this).closest("td").parent(this).find(".tt").text(total);
                // console.log(tt);

                var check = $(this).closest("tr").parents(this).find(".total_price").html();



            })

            $('.voucher_item_area').trigger('change');

            $('.voucher_item_area').on('change', function () {
                var total_price = 0;
                 $('tbody tr td.tt').each(function(){
                    var book_price = $(this).text();
                    var book_price = parseInt(book_price);
                    total_price += book_price;
                });
                 $("tbody tr.voucher_total td.total_price").text(total_price);
            })

        </script>


        <?php $this->load->view('common/footer') ?>
        




