<?php
include('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/CSS/bootstrap.css" rel="stylesheet">
    <link href="assets/CSS/admin_css.css" rel="stylesheet">
    <script src="assets/Bootsrap/bootstrap_js.js"></script>
</head>

<body style="background-color:#E6E6E6;">

    <div class="container-fluid">
        <!-- <div class="row"> -->
        <!-- <div class="col-2 slidmenu" style="height:950px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;background-color:white;">
                <div class="col mb-5 logo" style="margin-top: 10px;">
                    <img src="assets/IMG/NEWERA.png" class="img-fluid">
                </div><br>

                <div class="row menuarea" style="padding: 20px;display: flex;flex-direction: column;gap: 25px;">

                    <a href="#" style="color: black;text-decoration: none;">
                        <div class="col row m_1" style="display: flex;align-content: center;justify-content: center;align-items: center;margin-bottom: 0px;">
                            <div class="col-3 dlogo"><img src="assets/IMG/icons/icons8-dashboard-24.png" class="img-fluid"></div>
                            <div class="col">
                                <h1 style="margin-bottom: 0px;font-size:16pt">Dashborde</h1>
                            </div>
                        </div>
                    </a>

                    <a href="#" style="color: black;text-decoration: none;">
                        <div class="col row m_1" style="display: flex;align-content: center;justify-content: center;align-items: center;margin-bottom: 0px;">
                            <div class="col-3 dlogo"><img src="assets/IMG/icons/icons8-settings-50.png" class="img-fluid" style="width: 58%;"></div>
                            <div class="col">
                                <h1 style="margin-bottom: 0px;font-size:16pt">settings</h1>
                            </div>
                        </div>
                    </a>


                </div> -->

        <!-- ................................slidemenu......................................-->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">

                <div class="col mb-5 logo" style="margin-top: 10px;">
                    <img src="assets/IMG/NEWERA.png" class="img-fluid">
                </div><br>
                <!-- <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5> -->
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <div class="row menuarea" style="padding: 20px;display: flex;flex-direction: column;gap: 25px;">

                    <a href="#" style="color: black;text-decoration: none;">
                        <div class="col row m_1" style="display: flex;align-content: center;justify-content: center;align-items: center;margin-bottom: 0px;">
                            <div class="col-3 dlogo"><img src="assets/IMG/icons/icons8-dashboard-24.png" class="img-fluid"></div>
                            <div class="col">
                                <h1 style="margin-bottom: 0px;font-size:16pt">Dashborde</h1>
                            </div>
                        </div>
                    </a>


                    <a href="#" style="color: black;text-decoration: none;">
                        <div class="col row m_1" style="display: flex;align-content: center;justify-content: center;align-items: center;margin-bottom: 0px;">
                            <div class="col-3 dlogo"><img src="assets/IMG/icons/icons8-settings-50.png" class="img-fluid" style="width: 48%;"></div>
                            <div class="col">
                                <h1 style="margin-bottom: 0px;font-size:16pt">settings</h1>
                            </div>
                        </div>
                    </a>


                </div>

            </div>
        </div>
    </div>
    <!--................................slidemenuend........................................-->


    <div class="col bg-white slidbar" style="height:65px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
        <div class="row">
            <div class="col">
                <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="background-color: none;margin-top:5px;">
                    <img src="assets/IMG/icons/icons8-menu-48.png" class="img-fluid" style="width: 70%;margin-top: 2px;">
                </a>
            </div>
            <div class="col" style="text-align: end;margin-top: 14px;margin-right: 20px;">
                <button class="prodcut_btn"><- Sign Out</button>
            </div>
        </div>
        <!-- </div>
        </div>
    </div> -->


        <!-- </body>

</html> -->