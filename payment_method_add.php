<?php
include('database.php');
include('admin_header.php');
?>


<div class="container" style="margin-top:100px;margin-bottom:100px;">

    <div class="col row" style="gap: 20px;">
        <!--..............................[payment method section].......................-->

        <div class="col" style="background-color:white;padding:20px;border-radius:10px;height: 212px;">

            <form action="pay_method_action.php" method="post" onsubmit="return valid()">

                <div class="col row" style="gap:20px;flex-direction: column;text-align: center;">

                    <div class="col">
                        <h4>Payment Method Add Section</h4>
                    </div>
                    <div class="col">
                        <input type="text" name="payment" id="pay_methodid" placeholder="Add Payment Method" oninput="removevalidatiopn('pay_methodid')" style="padding:10px 5px;border-radius:3px;border:1px solid black;width:100%;">
                    </div>
                    <div class="col">
                        <button type="submit" name="submit" style="padding:10px 5px;border-radius:3px;background-color:black;color:white;width:100%;">ADD</button>
                    </div>

                </div>

            </form>

        </div>

        <!--..............................[payment table section].......................-->

        <div class="col" style="background-color:white;padding:15px;border-radius:10px;">

            <div class="col" style="background-color:white;padding:15px;border-radius:10px;border-left:1px solid black;margin-top: 30px;">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>PAYMENT METHOD</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>

                            <td>1</td>
                            <td>UPI</td>
                            <td>
                                <form action="payment_method_add.php" method="post">
                                    <div class="col row">

                                        <div class="col">
                                            <button type="submit" name="edit" style="background-color:white;border:none;">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                                    stroke="#006eff">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                            stroke="#007bff" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                            stroke="#007bff" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>

                                                </svg>
                                            </button>
                                        </div>

                                        <div class="col">
                                            <button type="submit" name="delete" style="background-color:white;border:none;"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="#ff0000" width="20px" height="20px"
                                                    viewBox="0 0 24.00 24.00" stroke="#ff0000"
                                                    transform="matrix(-1, 0, 0, 1, 0, 0)">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">

                                                        <path
                                                            d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z" />

                                                    </g>

                                                </svg></button>
                                        </div>

                                    </div>
                                </form>
                            </td>

                        </tr>
                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!--...............[script]..................-->

<script>
    function valid() {
        var payment = document.getElementById('pay_methodid');
        var f = 0;
        alert('yo');
        if (payment.value == "") {
            payment.style.border = "1px solid red";
            payment.style.outline = "none";
            payment.focus();
            f = 1;
        }
        if (f == 0) {
            return true;
        } else {
            return false;
        }

    }

    function removevalidatiopn(Id) {
        var id = document.getElementById(Id);
        id.style.border = "1px solid black";
    }
</script>