<?php
ob_start();

session_start();
?>

<style type="text/css">

    <!--

    .style1 {color: #FFFFFF}

    -->
    .item{
        width: 260px; 
        min-height: 235px;
        margin: 20px 5px; 
        float: left;
        text-align: center;
    }

    .clearfix{
    	clear: both;
    	overflow: auto;
    }

    .item img{
        width: 1.5in;
        height: 1.69in;
        border: 7px solid #ccc;
    }

    .committee_list .item:nth-of-type(odd){
        float: right;
    }

    

.committee_list{
	clear: both;
	overflow: auto;
}
    .frame{
        background-color: rgba(255,64,74,1);
        padding: 20px 10px;
    }


    .frame_president{
        text-align: center;
    }

    .frame_president img{
        border: 10px solid #ccc;
        width: 280px;

    }

    .frame img{
        border: 10px solid #ccc;
        width: 100%;
    }


</style>

<div class="right_side">
    <div class="body_box_top">&nbsp;</div>

    <div class="body_box_middle" >


        <div class="head_line"> Member List </div>
        <?php 

            $scid = $_GET[scid];
            $cid = $_GET[cid];

            $sql=mysql_query("SELECT * FROM tbl_committee_information WHERE  president= 1 AND sub_menu_id = '$scid'");
            $query = mysql_fetch_array($sql);

            if(!empty($query)){
        ?>
        <div style="margin-bottom: 30px; margin: 0 auto;">
            <div class="frame_president">
                <img src="admin/committee_image/<?php echo $query['picture']; ?>" alt="">
                <div class="caption">
                    <h3><?php echo $query['name']; ?></h3>
                    <p style="text-align:center" class="home_text text-justify word-wrap"><b>(<?php echo $query['designation']; ?>)</b></p>
                </div>
            </div>
        </div>
        <?php } ?>

        

        <div class="committee_list" style="width: 100%; ">

            <?php 

            $scid = $_GET[scid];
            $cid = $_GET[cid];

            $sql=mysql_query("SELECT * FROM tbl_committee_information WHERE  president= 0 AND sub_menu_id = '$scid'");
            //$query = mysql_fetch_array($sql);

            while($query = mysql_fetch_array($sql)){
        ?>

            <div class="item" style="">
                <img src="admin/committee_image/<?php echo $query['picture']; ?>" alt="">

                <div class="caption">
                    <h3><?php echo $query['name']; ?></h3>
                    <p style="text-align:center" class="home_text text-justify word-wrap"><b>(<?php echo $query['designation']; ?>)</b></p>
                </div>

                <div class="clearfix"></div>

            </div>

            <?php } ?>

            

        </div>

        <?php
        include('admin/config.php');
        if ($_GET['scid'] && $_GET['cid']) {
            $smid = $_GET['scid'];
            $sql = 'SELECT * FROM committee_information WHERE sub_menu_id = "' . $smid . '" ';
        } else if ($_GET['cid']) {
            $mid = $_GET['cid'];
            $sql = 'SELECT * FROM committee_information WHERE main_menu_id = "' . $mid . '" ';
        }

        $query = mysql_query($sql);
        ?>


    </div>
</div>

