<?php
include('database.php');
include('admin_header.php');
?>


<div class="container" style="margin-top: 100px;margin-bottom:100px;">
    <div class="col row" style="flex-direction: column;gap:80px;">
        <div class="col">
            <h1>Delivery charge</h1>
        </div>
        <div class="col" style="padding:10px;border-radius:10px;background-color:white;">

            <div class="col" style="padding:5px;border-radius:5px;border-left:1px solid black;">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>IMG</th>
                            <th>NAME</th>
                            <th>Delivery charge</th>
                        </tr>
                    </thead>

                    <tbody class="product_area" id="product_area">



                    </tbody>

                </table>

            </div>

            <div class="pagination" id="pagination" style="justify-content: center;"></div>


        </div>
    </div>
</div>

<!--.................................( script ).................................-->

<script>
    $(document).ready(function() {
        loadproduct(1);
    })

    function loadproduct(page) {

        $.ajax({
            type: "GET",
            url: "delivery_ajax.php",
            data: {
                page: page
            },
            success: function(data) {
                // alert(data);
                let response = JSON.parse(data);
                $('#product_area').html(response.product_html);
                $('#pagination').html(response.pagination_html);
            },
            error: function(xhr, status, error) {
                alert("error");
            }
        });

    }

    $(document).on('click', '.pagination a', function() {
        let page = $(this).data('page');
        loadproduct(page);
    });
</script>