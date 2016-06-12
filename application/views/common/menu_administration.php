    
<?php
$c = $this->uri->rsegment(1);
$user_type = $this->session->userdata('user_type');
?>

<ul class="sidebar-menu"> 
    <li class="title">  Setup Form </li>

    <li>
        <a href="<?php echo base_url(); ?>settings/home/index">
            <i class="fa fa-cogs"></i> 
            Settings
        </a>
    </li>


    <li class="<?php if ($c == 'user') echo "active" ?>">
        <a href="<?php echo base_url(); ?>user">
            <i class="fa fa-user"></i> <span>User</span>
        </a>
    </li>         



    <li class="<?php if ($c == 'division') echo "active" ?>">
        <a href="<?php echo base_url(); ?>division">
            <i class="fa fa-sitemap"></i> <span>Division/Zone</span>
        </a>
    </li>

    <li class="<?php if ($c == 'jonal') echo "active" ?>">
        <a href="<?php echo base_url(); ?>jonal">
            <i class="fa fa-share-alt-square"></i> <span>Re-Zone</span>
        </a>
    </li>

    <li class="<?php if ($c == 'district') echo "active" ?>">
        <a href="<?php echo base_url(); ?>district">
            <i class="fa fa-share-alt-square"></i> <span>District</span>
        </a>
    </li>

    <li class="<?php if ($c == 'thana') echo "active" ?>">
        <a href="<?php echo base_url(); ?>thana">
            <i class="fa fa-share-alt-square"></i> <span>Thana</span>
        </a>
    </li>

    <li class="<?php if ($c == 'college') echo "active" ?>">
        <a href="<?php echo base_url(); ?>college">
            <i class="fa fa-university"></i> <span>College</span>
        </a>
    </li>

    <li class="<?php if ($c == 'year') echo "active" ?>">
        <a href="<?php echo base_url(); ?>year">
            <i class="fa fa-puzzle-piece"></i> <span>Year/Class</span>
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

    <?php if ($this->session->userdata('user_type') == '1') { ?>
        <li class="<?php if ($c == 'maexecutive') echo "active" ?>">
            <a href="<?php echo base_url(); ?>maexecutive">
                <i class="fa fa-user"></i> <span>Marketing Executive </span>
            </a>
        </li>     
        <li class="<?php if ($c == 'purchase') echo "active" ?>">
            <a href="<?php echo base_url(); ?>purchase/add">
                <i class="fa fa-truck"></i> <span> Challan  Book  </span>
            </a>
        </li>
    <?php } else { ?>
        <li class="<?php if ($c == 'requisition') echo "active" ?>">
            <a href="<?php echo base_url(); ?>requisition/add">
                <i class="fa fa-paper-plane"></i> <span> requisition  </span>
            </a>
        </li>


        <li class="<?php if ($c == 'distribute') echo "active" ?>">
            <a href="<?php echo base_url(); ?>distribute/add">
                <i class="fa  fa-folder-open-o"></i> <span> Distribute Books  </span>
            </a>
        </li>
    <?php } ?>

    <li class="<?php if ($c == 'donation') echo "active" ?>">
        <a href="<?php echo base_url(); ?>donation/add">
            <i class="fa fa-paypal"></i> <span>Donation  </span>
        </a>
    </li>

    <li class="<?php if ($c == 'report') echo "active" ?>">
        <a href="<?php echo base_url(); ?>report">
            <i class="fa fa-bar-chart-o"></i> <span>Reports  </span>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url(); ?>requisition/index"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Requisition</a>
    </li>
    
    <li>
        <a href="<?php echo base_url(); ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Distribution</a>
    </li>
    
    <li>
        <a href="<?php echo base_url(); ?>expense/add_expense"><i class="fa fa-money" aria-hidden="true"></i> Expense</a>
    </li>


</ul>