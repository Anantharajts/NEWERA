<?php
include('database.php');
include('customer_header.php');
?>


<div class="container" style="border-top: 1px solid black;margin-bottom:50px;">

    <div class="col">
        <p style="margin-bottom:15px;margin-top:70px;">Saved Items</p>
        <h1 style="margin-bottom:30px;">My wishlist</h1>
    </div>

    <div class="col grid_container" style="display: grid;grid-template-columns: repeat( auto-fit, minmax(250px, 1fr) );gap: 48px;justify-content: center;align-content: start;">




        <div class="row" style="flex-direction: column;gap:10px;">

            <!-- <div class="col" style="background-color:#F1F1F1;border-radius:10px;"> -->
            <div class="col" style="text-align: center;background-color:#F1F1F1;border-radius:10px;padding:0px;">
                <img src="assets/IMG/dress/m-10.png" class="img-fluid">
            </div>
            <!-- </div> -->

            <div class="col row" style="text-align: center;gap: 36px;padding: 0px;">
                <div class="col">
                    <p>Product Name</p>
                </div>
                <div class="col">
                    <p>Price</p>
                </div>
            </div>
            <div class="col row" style="justify-content: center;align-items: center;text-align: center;gap: 60px;">
                <div class="col"><button style="width: 100%;padding: 8px 10px;color: white;background-color: black;border-radius: 5px;">Add to cart</button></div>
                <div class="col"><button style="width: 100%;padding: 5px 10px;color: white;background-color: black;border-radius: 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero">
                            <g fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(8.53333,8.53333)">
                                    <path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z">

                                    </path>
                                </g>
                            </g>
                        </svg></button></div>
            </div>
        </div>


                <div class="row" style="flex-direction: column;gap:10px;">

            <!-- <div class="col" style="background-color:#F1F1F1;border-radius:10px;"> -->
            <div class="col" style="text-align: center;background-color:#F1F1F1;border-radius:10px;padding:0px;">
                <img src="assets/IMG/dress/m-10.png" class="img-fluid">
            </div>
            <!-- </div> -->

            <div class="col row" style="text-align: center;gap: 36px;padding: 0px;">
                <div class="col">
                    <p>Product Name</p>
                </div>
                <div class="col">
                    <p>Price</p>
                </div>
            </div>
            <div class="col row" style="justify-content: center;align-items: center;text-align: center;gap:0px;">
                <div class="col"><button style="width: 100%;padding: 8px 10px;color: white;background-color: black;border-radius: 5px;">Add to cart</button></div>
                <div class="col"><button style="width: 100%;padding: 5px 10px;color: white;background-color: black;border-radius: 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero">
                            <g fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(8.53333,8.53333)">
                                    <path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z">

                                    </path>
                                </g>
                            </g>
                        </svg></button></div>
            </div>
        </div>


                <div class="row" style="flex-direction: column;gap:10px;">

            <!-- <div class="col" style="background-color:#F1F1F1;border-radius:10px;"> -->
            <div class="col" style="text-align: center;background-color:#F1F1F1;border-radius:10px;padding:0px;">
                <img src="assets/IMG/dress/m-10.png" class="img-fluid">
            </div>
            <!-- </div> -->

            <div class="col row" style="text-align: center;gap: 36px;padding: 0px;">
                <div class="col">
                    <p>Product Name</p>
                </div>
                <div class="col">
                    <p>Price</p>
                </div>
            </div>
            <div class="col row" style="justify-content: center;align-items: center;text-align: center;gap: 60px;">
                <div class="col"><button style="width: 100%;padding: 8px 10px;color: white;background-color: black;border-radius: 5px;">Add to cart</button></div>
                <div class="col"><button style="width: 100%;padding: 5px 10px;color: white;background-color: black;border-radius: 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero">
                            <g fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(8.53333,8.53333)">
                                    <path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z">

                                    </path>
                                </g>
                            </g>
                        </svg></button></div>
            </div>
        </div>


                <div class="row" style="flex-direction: column;gap:10px;">

            <!-- <div class="col" style="background-color:#F1F1F1;border-radius:10px;"> -->
            <div class="col" style="text-align: center;background-color:#F1F1F1;border-radius:10px;padding:0px;">
                <img src="assets/IMG/dress/m-10.png" class="img-fluid">
            </div>
            <!-- </div> -->

            <div class="col row" style="text-align: center;gap: 36px;padding:0px;">
                <div class="col">
                    <p>Product Name</p>
                </div>
                <div class="col">
                    <p>Price</p>
                </div>
            </div>
            <div class="col row" style="justify-content: center;align-items: center;text-align: center;gap:0px;">
                <div class="col"><button style="width: 100%;padding: 8px 10px;color: white;background-color: black;border-radius: 5px;">Add to cart</button></div>
                <div class="col"><button style="width: 100%;padding: 5px 10px;color: white;background-color: black;border-radius: 5px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero">
                            <g fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <g transform="scale(8.53333,8.53333)">
                                    <path d="M14.98438,2.48633c-0.55152,0.00862 -0.99193,0.46214 -0.98437,1.01367v0.5h-5.5c-0.26757,-0.00363 -0.52543,0.10012 -0.71593,0.28805c-0.1905,0.18793 -0.29774,0.44436 -0.29774,0.71195h-1.48633c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h18c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587h-1.48633c0,-0.26759 -0.10724,-0.52403 -0.29774,-0.71195c-0.1905,-0.18793 -0.44836,-0.29168 -0.71593,-0.28805h-5.5v-0.5c0.0037,-0.2703 -0.10218,-0.53059 -0.29351,-0.72155c-0.19133,-0.19097 -0.45182,-0.29634 -0.72212,-0.29212zM6,9l1.79297,15.23438c0.118,1.007 0.97037,1.76563 1.98438,1.76563h10.44531c1.014,0 1.86538,-0.75862 1.98438,-1.76562l1.79297,-15.23437z">

                                    </path>
                                </g>
                            </g>
                        </svg></button></div>
            </div>
        </div>








    </div>

</div>








<?php
include('customer_footer.php');
?>