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
<?php echo form_open(); ?>
    	    <table class="table voucher_item_area" >
    		<tr class="active voucher_header">
    		    <th align="center">ID</th>
		    <td><?php echo $donation_info['donation_id']; ?></td>
		    <td></td>
		    <td></td>
		</tr>
		
		<tr class="voucher_item">
		    <th align="center">Date</th>
		    <td> <?php echo $donation_info['donation_date'] ?> </td>
		    <td></td>
		    <td></td>
		</tr>
		<tr class="voucher_item">
		    <th align="center">Division Name</th>
		    <td><?php echo $donation_info['division_name']; ?></td>
		    <td></td>
		    <td></td>
		</tr>
		<tr class="voucher_item">
		    <th align="center">College Name</th>
		    <td><?php echo $donation_info['college_name']; ?></td>
		    <td></td>
		    <td></td>
		</tr>
		<tr class="voucher_item">
		    <th align="center">Class Name</th>
		    <td><?php echo $donation_info['class_name']; ?></td>
		    <td></td>
		    <td></td>
		</tr>
		<tr class="voucher_item">
		    <th align="center">Student Quantity</th>
		    <td><?php echo $donation_info['student_quantity']; ?></td>
		    <td>Transfer Student Quantity</td>
		    <td  align="center"><?php
		    if($donation_info['requisition_status'] != '0'){
				$form_input = array(
				    'type' => 'number',
				    'name' => 'student_quantity[]',
				    'size' => '5',
				    'value' => $donation_info['student_quantity'],
				    'class' => 'text-center student_quantity form-control',
				    'style' => 'width: 130px',
				    'min' => '0'
				);
		    

//				echo form_hidden('book_id[]', $book['book_id']);
//				echo form_hidden('requisition_details_id[]', $book['trd_id']);
				echo form_input($form_input);
		    }  else {
			    echo $donation_info['student_quantity'];
		    }
				?>
		    </td>
		</tr>
		<tr class="voucher_item">
		    <th align="center">Possible Book</th>
		    <td><?php echo $donation_info['possible_book']; ?></td>
		    <td>Transfer Possible Book</td>
		    <td  align="center"><?php
		    
		    if ($donation_info['requisition_status'] != '0'){
				$form_input = array(
				    'type' => 'number',
				    'name' => 'possible_book[]',
				    'size' => '5',
				    'value' => $donation_info['possible_book'],
				    'class' => 'text-center possible_book form-control',
				    'style' => 'width: 130px',
				    'min' => '0'
				);

//				echo form_hidden('book_id[]', $book['book_id']);
//				echo form_hidden('requisition_details_id[]', $book['trd_id']);
				echo form_input($form_input);
		    }  else {
			echo $donation_info['possible_book'];
		    }
				?>
		    </td>
		</tr>
		<tr class="voucher_item">
		    <th align="center">Book Name</th>
		    <td><?php echo $donation_info['book_name']; ?></td>
		</tr>
		
		<tr class="voucher_item">
		    <th align="center">Money Amount</th>
		    <td><?php echo $donation_info['money_amount']; ?></td>
		    <td>Transfer Money Amount</td>
		    <td  align="center"><?php
		    
		    if ($donation_info['requisition_status'] != '0'){
				$form_input = array(
				    'type' => 'number',
				    'name' => 'money_amount[]',
				    'size' => '5',
				    'value' => $donation_info['money_amount'],
				    'class' => 'text-center money_amount form-control',
				    'style' => 'width: 130px',
				    'min' => '0'
				);

//				echo form_hidden('book_id[]', $book['book_id']);
//				echo form_hidden('requisition_details_id[]', $book['trd_id']);
				echo form_input($form_input);
		    }else{
			echo $donation_info['money_amount'];
		    }
				?>
		    </td>
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
			'value' => 'Transfer Donation',
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


	<?php $this->load->view('common/footer') ?>
        




