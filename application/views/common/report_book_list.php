
<table class="table voucher_item_area" >
    <tr class="active voucher_header">
        <td>Sl</td>
        <td> Book  Name</td>
        <td align="center">Quantity</td>
        <?php if($requisition_info->requisition_status==0){ ?>
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
            <?php if($requisition_info->requisition_status==0){ ?>
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
        <?php if($requisition_info->requisition_status==0){ ?>
        <td align="right"></td>
        <?php } ?>
        <td align="right">Total Price</td>
        <td><?php echo $total_price; ?></td>
        
    </tr>


</table>
