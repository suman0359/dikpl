<?php
$this->load->view('common/css_link');
$this->load->view('common/header');
$this->load->view('common/sidebar');
//$this->load->view('common/control_panel');
?>
<?php $companyname = $this->session->userdata('companyname'); ?>
<?php $department_id = $this->uri->segment(3) ?>

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
            <li class="active"><a href="<?php echo base_url() ?>transfer">Distribute Book </a></li>

        </ol>
    </section>
    <br/>


    <!-- Start Working area --> 
    <div class="col-md-12 main-mid-area"> 
        <?php $this->load->view('common/error_show') ?>
        <h2> Distribute book to teacher </h2>




        <div class="col-md-12 margin_padding">

            <div class="col-md-9 ">
                <div class="slect_book">
                    <table id="distribute_book" class="table table-striped"> 
                        <tr class="alert alert-warning">
                            <th>Book  Name</th>
                            <th>Current Stock </th> 
                            <th> </th>
                            <th> </th>
                        </tr>
                        <?php
                        foreach ($book_list as $book) {
                            // echo "<pre>";
                            // print_r($book);
                            ?>
                            <tr>
                                <td class="book_name"> <?php echo $book['book_name'] ?> </td>
                                <td class="book_quantity"> <?php echo $book['quantity'] ?> </td>
                                
                                <td> <a href="JavaScript:void(0)" id="" class="btn btn-xs btn-success pull-right add_book_row" item-id="<?php echo $book['book_id'] ?>" >Add Book </a> </td>
                            </tr>

                        <?php } ?>
                    </table> 
                </div>  

                <br/>
                <?php
                echo form_open('');
                ?>
                <table class="table tableproduct table-responsive table-bordered col-md-12" id="plateVolumes" >  
                    <tbody>
                        <tr class="alert alert-info">

                            <th></th>
                            <th>Book  Name</th>
                            <th>Book Code </th>
                            <th>Book Price</th>
                            <th>Current Stock </th>
                            <th>Transfer QTY</th>

                        </tr>

                    </tbody>
                </table>

            </div>


            <div class="col-md-3">

                <div class="control-group">
                    <label class="control-label">Date</label>
                    <div class="controls " id="sandbox-container" >
                        <input type="text" class="datepicker fill-up form-control col-md-2" name="date" disabled="" value="<?php echo date("d-m-Y"); ?>" placeholder="YYY/MM/DD" required/>

                    </div>
                </div>


                <div class="control-group">
                    <label class="required">School/College </label>
                    <div>
                        <?php
                        $class = 'class="form-control " id="college_id" ';
                        $collages[''] = 'Select a College';
                        foreach ($college_list as $collage) {
                            $collages[$collage['college_id']] = $collage['college_name'];
                        }
                        echo form_dropdown('college_id', $collages, $college_id, $class);
                        ?>
                    </div>
                </div>

                
                <div class="control-group">
                    <label>Teacher </label>
                    <div>
                       
                            <?php 
                            
                            $class = 'class="form-control " id="teacher_id" ';

                            $teachers_list[''] = 'Select a Teacher';

                            foreach ($teacher_list as $teacher) {
                                $teachers_list[$teacher['id']] = $teacher['name'];
                                
                            }

                            echo form_dropdown('teacher_id', $teachers_list, '', $class);

                            ?>
                        
                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label">Comments</label>

                    <?php
                    $form_textarea = array(
                        'name' => 'comments',
                        'class' => 'form-control ',
                        'value' => ' ',
                        'rows' => '3'
                    );
                    echo form_textarea($form_textarea)
                    ?>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class=" text-center">

                <input type="submit" name="submit" value="Submit"  class="btn btn-lg btn-success" onClick="return confirm('Are you sure want to Submite');"/>
                <?php echo form_close() ?>      
            </div>
        </div>
    </div>
    <!-- End  Working area --> 



    <script>

        //Teacher Select 

        $(".main-mid-area").on('change', '#college_id', function () {

            var college_id = document.getElementById("college_id").value;
                                    
            $.ajax({
                url: "<?php echo base_url() ?>index.php/home/getteacher/" + college_id,
                beforeSend: function (xhr) {
                    xhr.overrideMimeType("text/plain; charset=x-user-defined");
                    $("#teacher_id").html("<option>Loading .... </option>");
                    var url = "<?php echo base_url() ?>distribute/distribute_book/"+college_id;
                    // window.location.replace(url);
                    // window.location.hash.replace(url);
                    window.history.pushState('obj', 'newtitle', url);
                }
            })
            .done(function (data) {

                $("#teacher_id").html("<option value=''>Select a Teacher </option>");
                data = JSON.parse(data);
                $.each(data, function (key, val) {
                    
                        
                    
                    $("#teacher_id").append("<option value='" + val.id + "'>" + val.name + "</option>");

                });


            });
        });

        /**
        * Try to Copying Book Row
        */
        $("#distribute_book").on("click", '.add_book_row', function(){
            var book_name = $(this).closest("tr").children('td.book_name').html();
            var book_quantity = $(this).closest("tr").children('td.book_quantity').html();
            var book_id = $(this).attr('item-id');

            get_product(book_id, book_name, book_quantity);
        })
        /* -------------------------------------------------------- */

        /**
        * Try to On key up check the current stock with transfer quantity
        */
        $("#plateVolumes").on("keyup", '.qty', function(){
            var transfer_qty = $(this).val();
            var qty_pid = $(this).closest("tr").children("td.book_quantity").text();
            if(qty_pid<=transfer_qty){
                alert("you can't add more then quantity");
                $(this).val(qty_pid);
            }
        });
        /* -------------------------------------------------------- */

        function get_product(id, book_name, book_quantity){
            var id = id; // Book ID
            var book_id = parseInt(id);
            var book_quantity = parseInt(book_quantity);
            
            var flag = true;
            $(".pid").each(function (index) {
                // console.log( $( this ).val() );
                var d = parseInt($(this).val());

                // alert(id+"-"+d) ;
                if (id == d)
                {
                    var cv = parseInt($(".q_" + id).val());
                    var qq = $(".q_" + id).val();
                    // console.log(qq);

                    if(book_quantity <= qq){
                        alert("you can't add more then quantity");
                    }else{
                        $(".q_" + id).val(cv + 1);
                    }

                    flag = false;
                }
            });

            if (flag) {

                $('.tableproduct').append('<tr id="line_' + book_id + '" >\n\
                                                              <td  ><i   class="remove_item glyphicon glyphicon-minus-sign btn btn-warning btn-xs "  itemid="' + id + '" ></i></td>\n\
                                                              <td><input name="pid[]" class="pid"  value=" ' + id + ' " type="hidden">' + book_name + '</td>\n\
                                                              <td>' + "code" + '</td>\n\
                                                              <td> <input name="price[]" class=" "  value="' + "rate" + '" type="hidden" > ' + "rate" + 'TK </td>\n\
                                                               <td class="book_quantity"><input name="" class="pid"  value="" type="hidden">' + book_quantity + '</td>\n\
                                                              <td><input type="number" name="qty[]"   id="qty" min="1" value="1" max="' + book_quantity + '" class="q_' + book_id + ' qty form-control "  /></td>\n\
                                                              </tr>');
        }

        }





        $(document.body).on('click', '.remove_item', function () {
            var id = $(this).attr("itemid");
            $("#line_" + id).remove();


        });




    </script>



    <?php $this->load->view('common/footer') ?>
        



