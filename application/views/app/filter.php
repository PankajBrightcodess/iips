<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Filter | Bless Fresh</title>
    <?php include"main-head-links.php"; ?>
  </head>
  <body>
    <?php include"header.php" ; ?>
    <?php include"side-menu.php" ; ?>

    <section class="FilterBar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"><a href="index.php" class="back"><i class="fas fa-arrow-left"></i></a> </div>
          <div class="col-6"><button type="button" class="filterIcon btn" onClick="$('#FilterOptions').show()"><i class="fas fa-sliders-h"></i></button></div>
        </div>
      </div>
      <div id="FilterOptions" style="display: none">
        <button type="button" class="close" aria-label="Close" onClick="$('#FilterOptions').hide()"><span aria-hidden="true">&times;</span></button>
        <h3>Cakes</h3><hr/> 
        <div class="row">
          <div class="col-6"><label for="birthday"><input type="checkbox" name="cake" value="birthday"> Birthday Cake</label></div>
          <div class="col-6"><label for="anniversary"><input type="checkbox" name="cake" value="anniversary"> Anniversary Cake</label></div>
          <div class="col-6"><label for="wedding"><input type="checkbox" name="cake" value="wedding"> Wedding Cake</label></div>
          <div class="col-6"><label for="dry-fruit"><input type="checkbox" name="cake" value="dry-fruit"> Dry Fruit Cake</label></div>
        </div>
        <h3>Cookies</h3><hr/> 
        <div class="row">
          <div class="col-6"><label for="Salty"><input type="checkbox" name="cookies" value="Salty"> Salty</label></div>
          <div class="col-6"><label for="Sweet"><input type="checkbox" name="cookies" value="Sweet"> Sweet</label></div>
        </div>
        <h3>Breads</h3><hr/> 
        <div class="row">
          <div class="col-6"><label for="Multigrain"><input type="checkbox" name="breads" value="Multigrain"> Multigrain Bread</label></div>
          <div class="col-6"><label for="Brown"><input type="checkbox" name="breads" value="Brown"> Brown Bread</label></div>
          <div class="col-6"><label for="Fruit"><input type="checkbox" name="breads" value="Fruit"> Fruit Bread</label></div>
          <div class="col-6"><label for="White"><input type="checkbox" name="breads" value="White"> White Bread</label></div>

        </div>
        <h3>Gift Boxes</h3><hr/> 
        <div class="row">
          <div class="col-6"><label for="birthday"><input type="checkbox" name="gift" value="birthday"> Birthday Gift</label></div>
          <div class="col-6"><label for="anniversary"><input type="checkbox" name="gift" value="anniversary"> Anniversary Gift</label></div>
          <div class="col-6"><label for="wedding"><input type="checkbox" name="gift" value="wedding"> Wedding Gift</label></div>
          <div class="col-6"><label for="valentine"><input type="checkbox" name="gift" value="valentine"> Valentine Gift</label></div>
        </div>
        <h3>Price Range</h3><hr/>  
        <div class="row">
          <div class="col-6"><label for="0-500"><input type="checkbox" name="price" value="0-500"> ₹0-₹500</label></div>
          <div class="col-6"><label for="500-1000"><input type="checkbox" name="price" value="500-1000"> ₹500-₹1,000</label></div>
          <div class="col-6"><label for="1000-5000"><input type="checkbox" name="price" value="1000-5000"> ₹1,000-₹1,500</label></div>
          <div class="col-6"><label for="1500-5000"><input type="checkbox" name="price" value="1000-5000"> ₹1,500-₹5,000</label></div>
        </div>
      </div>
    </section>
    <section class="filtrContentBox">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6 pr-1">
            <div class="categoryItem">
              <a href="description.php"><img src="images/categories/cakes/birthday.jpg" alt="Cakes"></a>
              <h3>Birthday Cake</h3>
              <div class="DescBtn">
                <p class="ratings"><i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i> 4.5 (175)</p>
                <p><del>₹800</del> <strong>₹699</strong></p>
                <p><a href="description.php" class="btn btn-warning"><i class="fas fa-cart-plus"></i> Add Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-6 pl-1">
            <div class="categoryItem">
              <a href="description.php"><img src="images/categories/cakes/anniversary.jpg" alt="Cakes"></a>
              <h3>Anniversary Cake</h3>
              <div class="DescBtn">
                <p class="ratings"><i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i> 4.5 (85)</p>
                <p><del>₹980</del> <strong>₹899</strong></p>
                <p><a href="description.php" class="btn btn-warning"><i class="fas fa-cart-plus"></i> Add Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-6 pr-1">
            <div class="categoryItem">
              <a href="description.php"><img src="images/categories/cakes/wedding.jpg" alt="Cakes"></a>
              <h3>Wedding Cake</h3>
              <div class="DescBtn">
                <p class="ratings"><i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i> 4.5 (75)</p>
                <p><del>₹1200</del> <strong>₹999</strong></p>
                <p><a href="description.php" class="btn btn-warning"><i class="fas fa-cart-plus"></i> Add Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-6 pl-1">
            <div class="categoryItem">
              <a href="description.php"><img src="images/categories/cakes/cupcake.jpg" alt="Cakes"></a>
              <h3>Cupcake</h3>
              <div class="DescBtn">
                <p class="ratings"><i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i> 4.5 (105)</p>
                <p><del>₹150</del> <strong>₹99</strong></p>
                <p><a href="description.php" class="btn btn-warning"><i class="fas fa-cart-plus"></i> Add Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-6 pr-1">
            <div class="categoryItem">
              <a href="description.php"><img src="images/categories/cakes/designer-cake.jpg" alt="Cakes"></a>
              <h3>Designer Cake</h3>
              <div class="DescBtn">
                <p class="ratings"><i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i> 4.5 (55)</p>
                <p><del>₹1000</del> <strong>₹899</strong></p>
                <p><a href="description.php" class="btn btn-warning"><i class="fas fa-cart-plus"></i> Add Cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-6 pl-1">
            <div class="categoryItem">
              <a href="description.php"><img src="images/categories/cakes/dryfruit-cake.jpg" alt="Cakes"></a>
              <h3>Dryfruit Cake</h3>
              <div class="DescBtn">
                <p class="ratings"><i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i> 4.5 (65)</p>
                <p><del>₹800</del> <strong>₹699</strong></p>
                <p><a href="description.php" class="btn btn-warning"><i class="fas fa-cart-plus"></i> Add Cart</a></p>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <?php include"footer.php" ; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom-slide.js"></script>

  </body>
</html>