<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');

?>
<?php $companyname=$this->session->userdata('companyname'); ?>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-top:-10px!important;">
              <h1 id="company_info">
                Dashboard
                <small ><?php if(!empty($companyname)) echo  $companyname; ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>home"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="<?php echo base_url()?>purchase">Purchase</a></li>
                <li class="active"><a href="<?php echo base_url()?>purchase/add">Add Purchase</a></li>
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
    
     
       <?php  $uid=$this->uri->segment(3); 
        if(!empty ($uid)) { ?>
    
    <div class="col-md-12 margin_padding voucher_memo_area">
       
        <h3>Distribution Voucher</h3>  
        <table width="100%"> 
            <tr>
                
           <td> 
        
            <table >
                <tr>
                    <td >Id :</td>
                    <td><?php echo $distribution_info->entryby; ?></td> 
                </tr>
                <tr>
                    <td>Requested  By :</td>
                    <td> <?php 
                    $emp=$this->CM->getwhere('user',array('id'=>$distribution_info->entryby)); 
                                        
                    echo $emp->name ; 
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
                    <?php echo $distribution_info->distribute_date; ?>
                    </td>
                </tr>
                
                <tr>
                    <td> Division : </td>
                    <td> 
                    <?php 
                    $college=$this->CM->getwhere('college',array('id'=>$distribution_info->id)); 
                    $div=$this->CM->getwhere('division',array('id'=>$college->division_id)); 
                                echo $div->name; 
                          ?> 
                    </td>
                </tr>
                <tr>
                  <td>College Name: </td>
                  <td><?php echo $college->name; ?></td>
                </tr>
               
                
                
              
            </table>
          </td>
            </tr>
        </table>
           
     </div >
    
    
     
     
    <div class="col-md-12 margin_padding ">
       <!-- *************************************************************** -->
       

      <table class="table voucher_item_area" >
          <tr class="active voucher_header">
              <td>Sl</td>
              <td> Book  Name</td>
              <td align="center">Quantity</td>
              <?php if($distribution_info->status==0){ ?>
              <td align="center">Transfer Quan.</td>
              <?php } ?>
              <td>Price</td>
              <td>Total</td>

          </tr>
          <?php
          $i = 1;
          $total_price = 0;
          $total_quantity = 0;
          $total_transfer_quantity = 0;
          foreach ($book_list as $book) {
              ?>
              <tr class="voucher_item">
                  <td><?php echo $i; ?></td>
                  <td> <?php echo $book['book_name'] ?> </td>
                  <td align="center"><?php echo $book['quantity']; ?></td>
                  <?php if($distribution_info->status==0){ ?>
                  <td align="center"><?php echo $book['transfer_quantity']; ?></td>
                  <?php } ?>
                  <td><?php echo $book['price']; ?></td>
                  <td><?php echo $total = $book['quantity'] * $book['price']; ?> </td>

              </tr>
          <?php
          $total_price+=$total;
          $total_quantity+=$book['quantity'];
          //$total_transfer_quantity+=$book['transfer_quantity'];

          $i++;
      }
      ?>
          <tr class="voucher_total">
              <td align="right"></td>
              <td align="right">Total Quantity</td>
              <td align="center"><?php echo $total_quantity; ?></td>
              <?php if($distribution_info->status==0){ ?>
              <td align="right"></td>
              <?php } ?>
              <td align="right">Total Price</td>
              <td><?php echo $total_price; ?></td>
              
          </tr>


      </table>

       <!-- *************************************************************** -->
       
        
        <u>  Sender Comment :  </u> <br />
        <?php echo $distribution_info->comments ; ?>
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
                                    <td>Distibute by   </td>

                                </tr>
                                <tr class="voucher_bottom_left">
                                    <td>Name : <span style="border-bottom: 0.14em dotted #000; min-width: 175px; display: inline-block;"><?php $approved_by = $distribution_info->entryby; $approved_by = $this->CM->getInfo('user', $approved_by); echo @$approved_by->name; ?></span></td>

                                </tr>
                                <tr class="voucher_bottom_left">
                                    <td>Date : <span style="border-bottom: 0.14em dotted #000; min-width: 180px; display: inline-block;"><?php echo date("d-m-Y"); ?></span> </td>

                                </tr>

                            </table>
        </td>
                 </tr>
             </table>
             
             
     </div >
    
     
       <?php if($distribution_info->status == 1) { ?>
         <div class="clearfix"></div>
     <div class="alert alert-info text-center"> This requisition already accept and send book according on this. </div>
     <?php } ?>
     
     <div class=" text-center no-print">
         <a href="JavaScript:history.back(-1)" class="btn btn-warning"> Back </a>
     </div>
     
       
    <!-- End  Working area --> 
    
    <?php } ?>

    <!-- start  add the row --> 

    
 

<?php $this->load->view('common/footer') ?>
        




