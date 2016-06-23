    
<?php
$c = $this->uri->rsegment(1);
$user_type = $this->session->userdata('user_type');
?>

<ul class="sidebar-menu"> 
    <li class="title">  Setup Form </li>



    <li class="<?php if ($c == 'college') echo "active" ?>">
        <a href="<?php echo base_url(); ?>college">
            <i class="fa fa-university"></i> <span>College</span>
        </a>
    </li>


    <li class="<?php if ($c == 'department') echo "active" ?>">
        <a href="<?php echo base_url(); ?>department">
            <i class="fa fa-puzzle-piece"></i> <span>Department</span>
        </a>
    </li>

    <li class="<?php if ($c == 'teachers') echo "active" ?>">
        <a href="<?php echo base_url(); ?>teachers">
            <i class="fa fa-users"></i> <span>Teachers</span>
        </a>
    </li>

<!--    <li class="<?php if ($c == 'subject') echo "active" ?>">
        <a href="<?php echo base_url(); ?>subject">
            <i class="fa fa-puzzle-piece"></i> <span>Subject</span>
        </a>
    </li>-->


    <li class="<?php if ($c == 'books') echo "active" ?>">
        <a href="<?php echo base_url(); ?>books">
            <i class="fa fa-book"></i> <span>Books</span>
        </a>
    </li>

</ul>



<ul class="sidebar-menu"> 
    <li class="title"> Transection  </li>

    
        <li class="<?php if ($c == 'requisition') echo "active" ?>">
            <a href="<?php echo base_url(); ?>requisition/add">
                <i class="fa fa-paper-plane"></i> <span> Book Requisition  </span>
            </a>
        </li>

    <li class="<?php if ($c == 'donation') echo "active" ?>">
        <a href="<?php echo base_url(); ?>donation/add">
            <i class="fa fa-paypal"></i> <span>Donation Requisition </span>
        </a>
    </li>

    <li class="<?php if ($c == 'index') echo "active" ?>">
        <a href="<?php echo base_url(); ?>report/index">
            <i class="fa fa-bar-chart-o"></i> <span>Reports  </span>
        </a>
    </li>
    
      <li>
        <a href="<?php echo base_url(); ?>expense/add_expense"><i class="fa fa-money" aria-hidden="true"></i> Expense</a>
    </li>


    <li class="<?php if ($c == 'book_stock') echo "active" ?>">
        <a href="<?php echo base_url(); ?>report/book_stock">
            <i class="fa fa-bar-chart-o"></i> <span> Stock Book </span>
        </a>
    </li>
    
    <li class="<?php if ($c == 'donation_stock') echo "active" ?>">
        <a href="<?php echo base_url(); ?>report/donation_stock">
            <i class="fa fa-bar-chart-o"></i> <span> Stock Donation </span>
        </a>
    </li>

</ul>