<?php
include('database.php');
include('admin_header.php');
?>

<div class="container" style="margin-top: 100px;">
    <div class="row" style="gap: 20px;">

        <div class="col" style="background-color:white;border-radius: 10px;height: 220px;">
            <form action="brand_action.php" method="post" onsubmit="return valid()">
                <div class="row" style="flex-direction: column;gap:20px;padding:20px;text-align: center;">
                    <div class="col">
                        <h3>Brand add section</h3>
                    </div>
                    <div class="col">
                        <input type="text" name="brand" id="brandid" oninput="removevalidation('brandid')" style="width: 100%;padding:10px;">
                    </div>
                    <div class="col">
                        <button type="submit" name="b_addbtn" style="width: 100%;background-color:black;color:white;padding-top:5px;padding-bottom:5px;">ADD</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col" style="background-color:white;padding:20px;border-radius: 10px;">

            <div class="col" id="book-container" style="background-color:white;padding:20px;border-radius: 10px;border-left:1px solid black;margin-top: 20px;">
                <table class="table table-white table-striped">

                    <thead>
                        <tr>
                            <th>SLN</th>
                            <th>BRAND'S</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                       
                    </tbody>


                </table>
                <div class="pagination" id="pagination"></div>
            </div>


        </div>
    </div>
</div>

<script>
    function valid() {

        var brands = document.getElementById("brandid");
        var f = 0;

        if (brands.value == "") {
            // alert("hlo");
            brands.style.border = "1px solid red";
            brands.style.outline = "none";
            brands.focus();
            f = 1;
        }

        if (f == 0) {
            return true;
        } else {
            return false;
        }

    }

    function removevalidation(Id) {
        var id = document.getElementById(Id);
        // alert("hlo");
        id.style.border = "1px solid black";
    }

    //.............................ajex...................................



    $(document).ready(function() {
        loadBooks(1);

        function loadBooks(page) {
            $.ajax({
                url: "brand_ajexaction_copy.php",
                type: "GET",
                data: {
                    page: page
                },
                success: function(data) {
                    let response = JSON.parse(data);
                    // alert(data);
                    $('#book-container').html(response.books_html);
                    $('#pagination').html(response.pagination_html);
                }
            });
        }


        $(document).on('click', '.pagination a', function() {
            let page = $(this).data('page');
            loadBooks(page);
        });
    });
</script>





</body>

</html>