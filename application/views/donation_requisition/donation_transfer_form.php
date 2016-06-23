<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');
?>

<?php
$name = $this->session->userdata("username");
$companyname = $this->session->userdata('companyname');
?>

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
    	    <p> <?php echo validation_errors(); ?> </p>
    	    <h3>Donation Requisition Transfer Form</h3>  
    	    <table width="100%"> 
    		<tr>

    		    <td> 

    			<table >
    			    <tr>
    				<td >Id :</td>
    				<td><?php echo $donation_info['donation_id']; ?></td>
    			    </tr>
    			    <tr>
    				<td>Requested  By :</td>
    				<td> <?php
					echo $donation_info['mpo_name'];
					?> 
    				</td>
    			    </tr>



    			</table>
    		    </td>

    		    <td> 
    			<table class="pull-right">



    		</tr>
    		<tr>
    		    <td>Request Date :</td>
    		    <td>
			    <?php echo $donation_info['donation_date']; ?>
    		    </td>
    		</tr>

    		<tr>
    		    <td> Division : </td>
    		    <td> 
			    <?php
			    echo $donation_info['division_name'];
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
    		    <td align="center">ID</td>
    		    <td align="center">Date</td>
    		    <td align="center">Division Name</td>
    		    <td align="center">Jonal Name</td>
    		    <td align="center">District Name</td>
    		    <td align="center">Thana Name</td>
    		    <td align="center">College Name</td>
    		    <td align="center">Teacher Name</td>
    		    <td align="center">Department Name</td>
    		    <td align="center">Class Name</td>
    		    <td align="center">Student Quantity</td>
    		    <td align="center">Possible Book</td>
    		    <td align="center">Book Name</td>
    		    <td align="center">Money Amount</td>

    		</tr>
		    <?php echo form_open(); ?>
    		<tr class="voucher_item">
    		    <td><?php echo $donation_info['donation_id']; ?></td>
    		    <td> <?php echo $donation_info['donation_date'] ?> </td>
    		    <td align="center"><?php echo $donation_info['division_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['jonal_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['district_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['thana_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['college_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['teacher_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['department_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['class_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['student_quantity']; ?></td>
    		    <td align="center"><?php echo $donation_info['possible_book']; ?></td>
    		    <td align="center"><?php echo $donation_info['book_name']; ?></td>
    		    <td align="center"><?php echo $donation_info['money_amount']; ?></td>

    		</tr>

    	    </table>


    	    <u>  Sender Comment :  </u> <br />
		<?php echo $donation_info['mpo_name'] ?>
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
    				<td>Name : <span style="border-bottom: 0.14em dotted #000; min-width: 175px; display: inline-block;"><?php echo $donation_info['mpo_name']; ?></span></td>

    			    </tr>
    			    <tr class="voucher_bottom_left">
    				<td>Date : <span style="border-bottom: 0.14em dotted #000; min-width: 180px; display: inline-block;"><?php echo date("d-m-Y"); ?></span> </td>

    			    </tr>

    			</table>
    		    </td>
    		</tr>
    	    </table>


    	</div >


	    <?php if ($donation_info['requisition_status'] == 1) { ?>
		<div class="clearfix"></div>
		<div class="alert alert-info text-center"> This requisition already accept and send book according on this. </div>
	    <?php } ?>

    	<div class=" text-center no-print"> 
    	    <a href="JavaScript:history.back(-1)" class="btn btn-warning"> Back </a>

		<?php if (($donation_info['requisition_status'] != '0') AND ( $this->session->userdata('user_type') == '1')) { ?>


		    <?php
		    $form = array(
			'name' => 'transfer_book',
			'value' => 'Transfer Book',
			'class' => 'btn btn-primary'
		    );
		    echo form_submit($form);
		    ?>
		<?php } ?>
    	</div>


    	<!-- End  Working area --> 

	<?php } ?>

        <!-- start  add the row --> 
	<?php echo form_close(); ?>
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
                // For Total Book Price Calculation 
                var total_price = 0;
                $('tbody tr td.tt').each(function () {
                    var book_price = $(this).text();
                    var book_price = parseInt(book_price);
                    total_price += book_price;
                });
                $("tbody tr.voucher_total td.total_price").text(total_price);
                /**************************************/

                // For Total Book Transfer Quantity
                var total_transfer_quantity = 0;
                $('tbody tr .quantity').each(function () {
                    var quantity = $(this).val();
                    var quantity = parseInt(quantity);
                    total_transfer_quantity += quantity;
                });
                $("tbody tr.voucher_total td.total_transfer_quantity").text(total_transfer_quantity);
                /**********************************************/
            })



        </script>


	<?php $this->load->view('common/footer') ?>
        




