
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
	    <td align="center"><?php if($donation_info['requisition_status'] == 1) echo $donation_info['student_quantity'];  else echo $donation_info['transfer_student_quantity']; ?></td>
            <td align="center"><?php if($donation_info['requisition_status'] == 1) echo $donation_info['possible_book'];  else echo $donation_info['transfer_possible_book']; ?></td>
            <td align="center"><?php echo $donation_info['book_name']; ?></td>
            <td align="center"><?php if($donation_info['requisition_status'] == 1) echo $donation_info['money_amount'];  else echo $donation_info['transfer_money_amount']; ?></td>

        </tr>

</table>
