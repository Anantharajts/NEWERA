<?php
include('database.php');
include('admin_header.php');
?>


<div class="container" style="margin-top:100px;margin-bottom:100px;">
    <div class="row" style="flex-direction: column;gap:10px;align-items: center;">
        <div class="col row" style="background-color:white;border-radius:5px;gap:20px;">
            <div class="col">
                <h4 style="padding: 10px;">Orders List</h4>
            </div>
            <!-- <div class="col" style="text-align:end;"><input type="sarch" name="sarch" id="sarchid" placeholder="Sarch" style="margin-top: 12px;width: 80%;padding: 3px 5px;"></div>-->
        </div> 

        <div class="col" style="background-color:white;padding:10px;border-radius:5px;">
            <div class="col" style="background-color:white;padding:10px;border-radius:5px;border-left:1px solid black;">

                <table class="table table-hover" id="table01">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Order Id</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Payment Method</th> 
                            <th>Payment</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $_select = "SELECT C.`Id`, C.`Lid`, `Order_Number`, C.`AddressId`, `TotalAmount`, `PaymentMethod`, `PaymentDetails`, `Payment_Status`, `Order_Status`,P.Paymenrt_Method AS PM_NAME,S.Address AS A_DDRESS,S.FirstName AS customer_name,DATE_FORMAT(C.CreatdDate,'%d/%M/%y') AS _date  FROM `checkout` AS C
                                    INNER JOIN `payment_method_add` AS P ON P.Id = C.`PaymentMethod`
                                    INNER JOIN `shipping_info` AS S ON S.Id = C.AddressId
                                    WHERE C.`IsDeleted`=0";
                        // var_dump($_select);
                        $data = mysqli_query($con, $_select);
                        $sl = 1;
                        if (mysqli_num_rows($data) > 0) {

                            while ($_result = mysqli_fetch_assoc($data)) {

                                $orderid = $_result['Order_Number'];
                                $name = $_result['customer_name'];
                                $address = $_result['A_DDRESS'];
                                $total = $_result['TotalAmount'];
                                $payment_type = $_result['PM_NAME'];
                                $date = $_result['_date'];
                                $checkoutid = $_result['Id'];
                                $orderstatus = $_result['Order_Status'];
                                $payment_status = $_result['Payment_Status'];


                        ?>

                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $orderid; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $address ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $total ?></td>

                                    <td>

                                        <select name="status" id="status_<?php echo $sl; ?>" onchange="status('status_<?php echo $sl; ?>',<?php echo $checkoutid ?>,'payment_sta<?php echo $sl;?>')">

                                            <option value="0">Order Placed</option>
                                            <option value="1">Processing</option>
                                            <option value="2">Shipped</option>
                                            <option value="3">Out for Delivery</option>
                                            <option value="4">Delivered</option>

                                        </select>
                                    </td>

                                    <td><?php echo $payment_type; ?></td>

                                    <td><select name="payment_sta" id="payment_sta<?php echo $sl;?>" onchange="status('status_<?php echo $sl; ?>',<?php echo $checkoutid ?>,'payment_sta<?php echo $sl;?>')">

                                            <option value="0">Processing</option>
                                            <option value="1">paid</option>
                                            <option value="2">Pending</option>

                                        </select></td>

                                </tr>

                        <?php

                                $sl++;
                            }
                        }
                        ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>








<script>
    function status(statusid, rowid, payment) {
        alert("hi");
        var sid = document.getElementById(statusid).value;
        var pay_status = document.getElementById(payment).value;
        alert(sid);
        alert(rowid);
        alert(pay_status);

        $.ajax({

            url: "admin_orderitems_ajax.php",
            type: "GET",
            data: {
                status_id: sid,
                rowid: rowid,
                pay_status:pay_status
            },
            success: function(success) {
                alert("success");
            },
            error: function(xhr, status, error) {
                alert("error");
            }

        })

    }
</script>

<!--............................[datatable].............................-->

<script>

let table = new DataTable('#table01');
    
</script>