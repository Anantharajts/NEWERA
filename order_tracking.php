<?php
include('database.php');
include('customer_header.php');

if (isset($_GET['statusid']) != "") {
    echo $status_id = $_GET['statusid'];
}


?>

<style>
    /* body {
        margin-top: 20px;
    } */

    .steps .step {
        display: block;
        width: 100%;
        margin-bottom: 35px;
        text-align: center
    }

    .steps .step .step-icon-wrap {
        display: block;
        position: relative;
        width: 100%;
        height: 80px;
        text-align: center
    }

    .steps .step .step-icon-wrap::before,
    .steps .step .step-icon-wrap::after {
        display: block;
        position: absolute;
        top: 50%;
        width: 50%;
        height: 3px;
        margin-top: -1px;
        background-color: #e1e7ec;
        content: '';
        z-index: 1
    }

    .steps .step .step-icon-wrap::before {
        left: 0
    }

    .steps .step .step-icon-wrap::after {
        right: 0
    }

    .steps .step .step-icon {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        border: 1px solid #e1e7ec;
        border-radius: 50%;
        background-color: #f5f5f5;
        color: #374250;
        font-size: 38px;
        line-height: 81px;
        z-index: 5
    }

    .steps .step .step-title {
        margin-top: 16px;
        margin-bottom: 0;
        color: #606975;
        font-size: 14px;
        font-weight: 500
    }

    .steps .step:first-child .step-icon-wrap::before {
        display: none
    }

    .steps .step:last-child .step-icon-wrap::after {
        display: none
    }

    .steps .step.completed .step-icon-wrap::before,
    .steps .step.completed .step-icon-wrap::after {
        background-color: #0da9ef
    }

    .steps .step.completed .step-icon {
        border-color: #0da9ef;
        background-color: #0da9ef;
        color: #fff
    }

    @media (max-width: 576px) {

        .flex-sm-nowrap .step .step-icon-wrap::before,
        .flex-sm-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 768px) {

        .flex-md-nowrap .step .step-icon-wrap::before,
        .flex-md-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 991px) {

        .flex-lg-nowrap .step .step-icon-wrap::before,
        .flex-lg-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    @media (max-width: 1200px) {

        .flex-xl-nowrap .step .step-icon-wrap::before,
        .flex-xl-nowrap .step .step-icon-wrap::after {
            display: none
        }
    }

    .bg-faded,
    .bg-secondary {
        background-color: #f5f5f5 !important;
    }
</style>

<!--.................................................................[html]...................................................................-->

<div class="container" style="margin-bottom:100px;margin-top:100px;">

    <div class="row" style="flex-direction: column;gap: 20px;">

        <div class="col" style="background-color: white;padding:5px;border-radius:5px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
            <h4 style="margin-left: 10px;padding:5px;">Order Tracking</h4>
        </div>

        <input type="text" name="order_trackid" id="trackid" value="<?php echo $status_id ?>">
        <!--..........................................(stap-2).................................-->
        <div class="col" style="padding: 0px;">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
            <div class="col padding-bottom-3x mb-1">
                <div class="card mb-3">
                    <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium">34VB5540K83</span></div>
                    <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped Via:</span> UPS Ground</div>
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> Checking Quality</div>
                        <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span> SEP 09, 2017</div>
                    </div>
                    <div class="card-body">
                        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                            <div class="step completed">
                                <div class="step-icon-wrap">
                                    <div class="step-icon" id="OrderPlaced"><i class="pe-7s-cart"></i></div>
                                </div>
                                <h4 class="step-title">Order Placed</h4>
                            </div>
                            <div class="step completed">
                                <div class="step-icon-wrap">
                                    <div class="step-icon" id="Processing"><i class="pe-7s-config"></i></div>
                                </div>
                                <h4 class="step-title">Processing</h4>
                            </div>
                            <div class="step completed">
                                <div class="step-icon-wrap">
                                    <div class="step-icon" id="Shipped"><i class="pe-7s-medal"></i></div>
                                </div>
                                <h4 class="step-title">Shipped</h4>
                            </div>
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon" id="OutforDelivery"><i class="pe-7s-car"></i></div>
                                </div>
                                <h4 class="step-title">Out for Delivery</h4>
                            </div>
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon" id="Delivered"><i class="pe-7s-home"></i></div>
                                </div>
                                <h4 class="step-title">Delivered</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
            <div class="custom-control custom-checkbox mr-3">
                <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
                <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
            </div>
            <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails" data-toggle="modal" data-target="#orderDetails">View Order Details</a></div>
        </div> -->
            </div>
        </div>

    </div>


</div>


<!--................................................[script]..........................................-->

<script>
    orderstatus();

    function orderstatus() {

        var sid = document.getElementById('trackid').value;
        alert(sid);
        var stap_1 = document.getElementById('OrderPlaced');
        var stap_2 = document.getElementById('Processing');
        alert(stap_2);
        var stap_3 = document.getElementById('Shipped');
        var stap_4 = document.getElementById('OutforDelivery');
        var stap_5 = document.getElementById('Delivered');


        if (sid == 0) {
            stap_1.style.backgroundColor = "green";
            stap_1.style.border = "1px solid green";
        }
        if (sid == 1) {
            stap_1.style.backgroundColor = "green";
            stap_2.style.backgroundColor = "green";
            stap_1.style.border = "1px solid green";
            stap_2.style.border = "1px solid green";
        }
        if (sid == 2) {
            stap_1.style.backgroundColor = "green";
            stap_1.style.border = "1px solid green";
            stap_2.style.backgroundColor = "green";
            stap_2.style.border = "1px solid green";
            stap_3.style.backgroundColor = "green";
            stap_3.style.border = "1px solid green";
        }
        if (sid == 3) {
            stap_1.style.backgroundColor = "green";
            stap_1.style.border = "1px solid green";
            stap_2.style.backgroundColor = "green";
            stap_2.style.border = "1px solid green";
            stap_3.style.backgroundColor = "green";
            stap_3.style.border = "1px solid green";
            stap_4.style.backgroundColor = "green";
            stap_4.style.border = "1px solid green";
        }
        if (sid == 4) {
            stap_1.style.backgroundColor = "green";
            stap_1.style.border = "1px solid green";
            stap_2.style.backgroundColor = "green";
            stap_2.style.border = "1px solid green";
            stap_3.style.backgroundColor = "green";
            stap_3.style.border = "1px solid green";
            stap_4.style.backgroundColor = "green";
            stap_4.style.border = "1px solid green";
            stap_5.style.backgroundColor = "green";
            stap_6.style.border = "1px solid green";
        }





    }
</script>



<?php
include('customer_footer.php');
?>