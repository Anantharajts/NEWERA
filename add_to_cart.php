<?php
include('database.php');
include('customer_header.php');
?>

<style>
  label {
    background-color: black;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 10px 15px 10px 10px;
    cursor: pointer;
    user-select: none;
    border-radius: 10px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    color: white;
  }

  input {
    display: none;
  }

  input:checked+label svg {
    fill: hsl(0deg 100% 50%);
    stroke: hsl(0deg 100% 50%);
    animation: heartButton 1s;
  }

  @keyframes heartButton {
    0% {
      transform: scale(1);
    }

    25% {
      transform: scale(1.3);
    }

    50% {
      transform: scale(1);
    }

    75% {
      transform: scale(1.3);
    }

    100% {
      transform: scale(1);
    }
  }

  input+label .action {
    position: relative;
    overflow: hidden;
    display: grid;
  }

  input+label .action span {
    grid-column-start: 1;
    grid-column-end: 1;
    grid-row-start: 1;
    grid-row-end: 1;
    transition: all .5s;
  }

  input+label .action span.option-1 {
    transform: translate(0px, 0%);
    opacity: 1;
  }

  input:checked+label .action span.option-1 {
    transform: translate(0px, -100%);
    opacity: 0;
  }

  input+label .action span.option-2 {
    transform: translate(0px, 100%);
    opacity: 0;
  }

  input:checked+label .action span.option-2 {
    transform: translate(0px, 0%);
    opacity: 1;
  }
</style>


<div class="container" style="border-top: 1px solid black;margin-bottom:70px;">

  <div class="row" style="justify-content: center;gap:20px;margin-top:65px;">

    <div class="col row" style="flex-direction: column;gap: 20px;text-align: center;">

      <div class="col" style="text-align: center;padding:20px;background-color:#F1F1F1;">
        <img src="assets/IMG/dress/m-12.png" class="img-fluid">
      </div>

      <div class="col row" style="gap: 20px;width:100%;padding:0px;margin-left:0px;">
        <div class="col" style="padding:0px;background-color:#F1F1F1;"><img src="assets/IMG/dress/m-12.png" class="img-fluid"></div>
        <div class="col" style="padding:0px;background-color:#F1F1F1;"><img src="assets/IMG/dress/m-12.png" class="img-fluid"></div>
        <div class="col" style="padding:0px;background-color:#F1F1F1;"><img src="assets/IMG/dress/m-12.png" class="img-fluid"></div>
        <div class="col" style="padding:0px;background-color:#F1F1F1;"><img src="assets/IMG/dress/m-12.png" class="img-fluid"></div>
      </div>

    </div>

    <div class="col row" style="gap:20px;flex-direction: column;">

      <div class="col">
        <h1>product name</h1>
      </div>
      <div class="col">
        <h5>price</h5>
      </div>
      <div class="col">
        <h5>Description</h5>
      </div>
      <div class="col">
        <p>brand:brandname</p>
      </div>
      <div class="col">
        <p>categiry:categoryname</p>
      </div>
      <div class="col row" style="align-items:center;">
        <input type="number" name="count" id="count">
      </div>
      <div class="col row" style="align-items:center;">
        <div class="col"><button style="width:100%;">a</button></div>
        <div class="col"><button style="width:100%;">b</button></div>
      </div>

    </div>
  </div>

</div>

<!--.........................................(stap-2)...........................................-->

<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  .carousel-container {
    width: 90%;
    margin: auto;
    margin-top: 50px;
    overflow: hidden;
    position: relative;
  }

  .carousel {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }

  .carousel .box {
    width: 18%;
    height: 500px;
    margin: 1%;
    border: 2px solid #aaa;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
  }

  .carousel .box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .nav-buttons {
    text-align: center;
    margin-top: 20px;
  }

  .nav-buttons button {
    font-size: 20px;
    padding: 10px 20px;
    margin: 10px;
    border: none;
    background-color: #000000;
    color: white;
    cursor: pointer;
    border-radius: 50px;
  }

  .nav-buttons button:hover {
    background-color: #2A608C;
  }
</style>


<div class="container" style="margin-bottom: 50px;">
  <div class="row nav-buttons" style="justify-content: end;">
    <div class="col-1" style="width: 6%;"><button onclick="prevSlide()">◄</button></div>
    <div class="col-1" style="width: 6%;"><button onclick="nextSlide()">►</button></div>


  </div>

  <div class="carousel-container">
    <div class="row carousel" id="carousel" style="gap:20px;">
      <div class="col box" style="flex-shrink: 0;">
        <div class="col sh_im1" style="border-radius: 10px;background-color: #F1F1F1;"></div>
        <div class="row mt-2" style="text-align: center;gap: 35px;">
          <div class="col row3_tx">
            <p>prodact name1</p>
          </div>

          <div class="col row3_price">
            <p>$150/-</p>
          </div>

        </div>

        <div class="row" style="gap:5px;text-align: -webkit-center;flex-direction: column;">
          <div class="col"><button class="cart" style="width: 100%;">ADD TO CART</button></div>

          <div class="col">

            <input type="checkbox" checked="checked" id="favorite" name="favorite-checkbox" value="favorite-button">
            <label for="favorite" class="container" style="justify-content: center;border-radius: 5px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
              <div class="action">
                <span class="option-1">Add to Favorites</span>
                <span class="option-2">Added to Favorites</span>
              </div>
            </label>

          </div>

        </div>
      </div>


      <div class="col box" style="flex-shrink: 0;">
        <div class="col sh_im1" style="border-radius: 10px;background-color: #F1F1F1;"></div>
        <div class="row mt-2" style="text-align: center;gap: 35px;">
          <div class="col row3_tx">
            <p>prodact name2</p>
          </div>

          <div class="col row3_price">
            <p>$150/-</p>
          </div>

        </div>

        <div class="row" style="gap:5px;text-align: -webkit-center;flex-direction: column;">
          <div class="col"><button class="cart" style="width: 100%;">ADD TO CART</button></div>

          <div class="col">

            <input type="checkbox" checked="checked" id="favorite" name="favorite-checkbox" value="favorite-button">
            <label for="favorite" class="container" style="justify-content: center;border-radius: 5px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
              <div class="action">
                <span class="option-1">Add to Favorites</span>
                <span class="option-2">Added to Favorites</span>
              </div>
            </label>

          </div>

        </div>
      </div>

      <div class="col box" style="flex-shrink: 0;">
        <div class="col sh_im1" style="border-radius: 10px;background-color: #F1F1F1;"></div>
        <div class="row mt-2" style="text-align: center;gap: 35px;">
          <div class="col row3_tx">
            <p>prodact name3</p>
          </div>

          <div class="col row3_price">
            <p>$150/-</p>
          </div>

        </div>

        <div class="row" style="gap:5px;text-align: -webkit-center;flex-direction: column;">
          <div class="col"><button class="cart" style="width: 100%;">ADD TO CART</button></div>

          <div class="col">

            <input type="checkbox" checked="checked" id="favorite" name="favorite-checkbox" value="favorite-button">
            <label for="favorite" class="container" style="justify-content: center;border-radius: 5px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
              <div class="action">
                <span class="option-1">Add to Favorites</span>
                <span class="option-2">Added to Favorites</span>
              </div>
            </label>

          </div>

        </div>
      </div>

      <div class="col box" style="flex-shrink: 0;">
        <div class="col sh_im1" style="border-radius: 10px;background-color: #F1F1F1;"></div>
        <div class="row mt-2" style="text-align: center;gap: 35px;">
          <div class="col row3_tx"> 
            <p>prodact name4</p>
          </div>

          <div class="col row3_price">
            <p>$150/-</p>
          </div>

        </div>

        <div class="row" style="gap:5px;text-align: -webkit-center;flex-direction: column;">
          <div class="col"><button class="cart" style="width: 100%;">ADD TO CART</button></div>

          <div class="col">

            <input type="checkbox" checked="checked" id="favorite" name="favorite-checkbox" value="favorite-button">
            <label for="favorite" class="container" style="justify-content: center;border-radius: 5px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
              <div class="action">
                <span class="option-1">Add to Favorites</span>
                <span class="option-2">Added to Favorites</span>
              </div>
            </label>

          </div>

        </div>
      </div>



      


    </div>
  </div>

</div>




<script>
  const carousel = document.getElementById("carousel");

  function nextSlide() {
    const firstImage = carousel.children[0];
    carousel.style.transition = "transform 0.5s ease-in-out";
    carousel.style.transform = "translateX(-20%)"; // Move left

    setTimeout(() => {
      carousel.appendChild(firstImage); // Move first to last
      carousel.style.transition = "none";
      carousel.style.transform = "translateX(0)"; // Reset position
    }, 500);
  }

  function prevSlide() {
    const lastImage = carousel.children[carousel.children.length - 1];
    carousel.style.transition = "none";
    carousel.insertBefore(lastImage, carousel.firstChild); // Move last to first
    carousel.style.transform = "translateX(-20%)"; // Move right

    setTimeout(() => {
      carousel.style.transition = "transform 0.5s ease-in-out";
      carousel.style.transform = "translateX(0)"; // Reset position
    }, 10);
  }
</script>

<?php
include('customer_footer.php');
?>

















<!-- staraddbutten -->

<!-- <div class="rating">
  <input type="radio" id="star-1" name="star-radio" value="star-1">
  <label for="star-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-2" name="star-radio" value="star-1">
  <label for="star-2">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-3" name="star-radio" value="star-1">
  <label for="star-3">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-4" name="star-radio" value="star-1">
  <label for="star-4">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-5" name="star-radio" value="star-1">
  <label for="star-5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
</div> -->

<!-- .rating {
  display: flex;
  flex-direction: row-reverse;
  gap: 0.3rem;
  --stroke: #666;
  --fill: #ffc73a;
}

.rating input {
  appearance: unset;
}

.rating label {
  cursor: pointer;
}

.rating svg {
  width: 2rem;
  height: 2rem;
  overflow: visible;
  fill: transparent;
  stroke: var(--stroke);
  stroke-linejoin: bevel;
  stroke-dasharray: 12;
  animation: idle 4s linear infinite;
  transition: stroke 0.2s, fill 0.5s;
}

@keyframes idle {
  from {
    stroke-dashoffset: 24;
  }
}

.rating label:hover svg {
  stroke: var(--fill);
}

.rating input:checked ~ label svg {
  transition: 0s;
  animation: idle 4s linear infinite, yippee 0.75s backwards;
  fill: var(--fill);
  stroke: var(--fill);
  stroke-opacity: 0;
  stroke-dasharray: 0;
  stroke-linejoin: miter;
  stroke-width: 8px;
}

@keyframes yippee {
  0% {
    transform: scale(1);
    fill: var(--fill);
    fill-opacity: 0;
    stroke-opacity: 1;
    stroke: var(--stroke);
    stroke-dasharray: 10;
    stroke-width: 1px;
    stroke-linejoin: bevel;
  }

  30% {
    transform: scale(0);
    fill: var(--fill);
    fill-opacity: 0;
    stroke-opacity: 1;
    stroke: var(--stroke);
    stroke-dasharray: 10;
    stroke-width: 1px;
    stroke-linejoin: bevel;
  }

  30.1% {
    stroke: var(--fill);
    stroke-dasharray: 0;
    stroke-linejoin: miter;
    stroke-width: 8px;
  }

  60% {
    transform: scale(1.2);
    fill: var(--fill);
  }
} -->