<?php
include('database.php');
include('customer_header.php');
?>


<div class="container" style="display:flex;margin-top:60px;margin-bottom:60px;">

    <div class="col" style="background-color: #f4f4f4;padding: 20px;border-radius: 10px;">
        <table class="table table-hover">

            <thead>

                <tr>
                    <th>SL</th>
                    <th>IMG</th>
                    <th>Products Name</th>
                    <th>Price</th>
                    <th></th>
                </tr>

            </thead>

            <tbody>
                <tr>
                    <td>
                        <h6 style="margin-top:25px;">1</h6>
                    </td>
                    <td style="width: 17%;text-align: center;">
                        <div class="col row">
                            <div class="col-3" style="width: 65%;background-color: #dad7d2;border-radius: 10px;">
                                <img src="assets/IMG/dress/m-11.png" class="img-fluid" style="width: 100%;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <h6 style="margin-top:25px;">name</h6>
                    </td>
                    <td>
                        <h6 style="margin-top:25px;">100/-</h6>
                    </td>
                    <td>
                        <div class="col row" style="margin-top:25px;">
                            <div class="col"><button></button></div>
                            <div class="col"><button></button></div>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>

    <div class="col">

    </div>

</div>







<?php
include('customer_footer.php');
?>