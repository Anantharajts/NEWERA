<?php
include('database.php');
include('admin_header.php');

$product_id='';

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    
    $product_id = $_POST["productid2"];
}

?>


<div class="container" style="margin-bottom: 100px;margin-top:100px;display: flex;justify-content: center;">

    <div class="col-8 row" style="gap:15px;padding:15px;border-radius:15px;background-color:white;">

        <div class="col" style="padding:0px;">
            <img src="assets/IMG/poster/delivery.jfif" class="img-fluid" style="border-radius: 6px;">
        </div>

        <div class="col">
            <form action="#" method="post" onsubmit="return valid()">
                <div class="col row" style="flex-direction: column;gap:15px;">

                    <div class="col">
                        <h5 style="margin-bottom: 40px;margin-top:65px;">ADD ON DELIVERY CHARGE</h5>
                    </div>
                    <div class="col">
                        <input type="hidden" name="p_id" id="p_id" value="<?php echo $product_id; ?>">
                        <input type="text" name="delivery" id="delivery" style="padding: 5px 0px;border-radius: 5px;border: 1px solid #b6b6b4;width:100%;margin-bottom:20px;">
                    </div>

                    <div class="col">
                        <button style="padding:5px 10px;border-radius:6px;background-color:black;color:white;width:100%;">SUBMIT</button>
                    </div>

                    <div class="col">
                        <a href="delivery_charge.php"><button style="padding:5px 10px;border-radius:6px;background-color:black;color:white;width:100%;">BACK</button></a>
                    </div>

                </div>
            </form>
        </div>

    </div>

</div>


<script>

function valid(){
    var delivery=document.getElementById('delivery');
    f=0;

    if(delivery.value == ""){
      
    }
}

</script>