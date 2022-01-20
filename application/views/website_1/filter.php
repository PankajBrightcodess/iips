<section class="pages" id="filter">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-lg-2 FilterLeft">
            <div class="row">
              <div class="col-lg-12">
                <h2 class="filterTitle">Filters</h2>
                <div class="mobFilterIcon">
                    <button type="button" class="btn btn-outline-danger btn-block" name="filter" onclick="SmDeviceFilter()"><i class="fas fa-filter"></i> Filter</button>
                </div>
                <hr>
              </div>
            </div>
            <div class="filterData" id="MobView">
              <div class="accordion" id="FilterPanel">
                <div class="card">
                  <div class="card-header" id="headingOne">
                      <a href="#collapseOne" class="btn" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">Cakes <i class="fas fa-plus"></i></a>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#FilterPanel">
                    <div class="card-body">
                      <div class="CakesFilter">
                        <label for="birthday"><input type="checkbox" name="cake" value="birthday"> Birthday Cake</label>
                        <label for="anniversary"><input type="checkbox" name="cake" value="anniversary"> Anniversary Cake</label>
                        <label for="wedding"><input type="checkbox" name="cake" value="wedding"> Wedding Cake</label>
                        <label for="dry-fruit"><input type="checkbox" name="cake" value="dry-fruit"> Dry Fruit Cake</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <a href="#collapseTwo" class="btn collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">Cookies <i class="fas fa-plus"></i></a>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#FilterPanel">
                    <div class="card-body">
                      <div class="CookiesFilter">
                        <label for="Salty"><input type="checkbox" name="cookies" value="Salty"> Salty</label>
                        <label for="Sweet"><input type="checkbox" name="cookies" value="Sweet"> Sweet</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <a href="#collapseThree" class="btn collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">Breads <i class="fas fa-plus"></i></a>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#FilterPanel">
                    <div class="card-body">
                      <div class="Breads">
                        <label for="Multigrain"><input type="checkbox" name="breads" value="Multigrain"> Multigrain Bread</label>
                        <label for="Brown"><input type="checkbox" name="breads" value="Brown"> Brown Bread</label>
                        <label for="Fruit"><input type="checkbox" name="breads" value="Fruit"> Fruit Bread</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingFour">
                    <a href="#collapseFour" class="btn collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">Gift Boxes <i class="fas fa-plus"></i></a>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#FilterPanel">
                    <div class="card-body">
                      <div class="GiftBoxes">
                        <label for="birthday"><input type="checkbox" name="gift" value="birthday"> Birthday Gift</label>
                        <label for="anniversary"><input type="checkbox" name="gift" value="anniversary"> Anniversary Gift</label>
                        <label for="wedding"><input type="checkbox" name="gift" value="wedding"> Wedding Gift</label>
                        <label for="valentine"><input type="checkbox" name="gift" value="valentine"> Valentine Gift</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-9 col-lg-10 FilterRight">
            <div class="row mt-2">
              <div class="col-sm-6 col-lg-3">
                <div class="FilterContent">
                  <a href="description.php">
                    <img src="<?php echo file_url('assets/website/images/categories/cakes/birthday.jpg'); ?>" alt="Cakes">
                    <div class="ProductInfo">
                      <h3>Birthday Cake</h3>
                      <p class="price"><del>₹800</del> ₹599 <button type="button" class="btn btn-outline-success">Add Cart</button></p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="FilterContent">
                  <a href="description.php">
                    <img src="<?php echo file_url('assets/website/images/categories/cakes/anniversary.jpg');?>" alt="Cakes">
                    <div class="ProductInfo">
                      <h3>Anniversary Cake</h3>
                      <p class="price"><del>₹980</del> ₹899 <button type="button" class="btn btn-outline-success">Add Cart</button></p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="FilterContent">
                  <a href="description.php">
                    <img src="<?php echo file_url('assets/website/images/categories/cakes/wedding.jpg');?>" alt="Cakes">
                    <div class="ProductInfo">
                      <h3>Wedding Cake</h3>
                      <p class="price"><del>₹1200</del> ₹999 <button type="button" class="btn btn-outline-success">Add Cart</button></p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="FilterContent">
                  <a href="description.php">
                    <img src="<?php echo file_url('assets/website/images/categories/cakes/designer-cake.jpg');?>" alt="Cakes">
                    <div class="ProductInfo">
                      <h3>Designer Cake</h3>
                      <p class="price"><del>₹1000</del> ₹899 <button type="button" class="btn btn-outline-success">Add Cart</button></p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="FilterContent">
                  <a href="description.php">
                    <img src="<?php echo file_url('assets/website/images/categories/cakes/cupcake.jpg');?>" alt="Cakes">
                    <div class="ProductInfo">
                      <h3>Cupcake</h3>
                      <p class="price"><del>₹150</del> ₹99 <button type="button" class="btn btn-outline-success">Add Cart</button></p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="FilterContent">
                  <a href="description.php">
                    <img src="<?php echo file_url('assets/website/images/categories/cakes/dryfruit-cake.jpg');?>" alt="Cakes">
                    <div class="ProductInfo">
                      <h3>Dryfruit Cake</h3>
                      <p class="price"><del>₹800</del> ₹699 <button type="button" class="btn btn-outline-success">Add Cart</button></p>
                    </div>
                  </a>
                </div>
              </div>

            </div>
          </div><!-- /-FilterRight-->

          <div class="clearfix"></div>
        </div>
      </div>
    </section>

    
    
    <div id="PgFooter"><?php $this->load->view('website/footer');?></div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
          $(".collapse.show").each(function(){
            $(this).prev(".card-header").find(".fas").addClass("fa-minus").removeClass("fa-plus");
          });
          $(".collapse").on('show.bs.collapse', function(){
            $(this).prev(".card-header").find(".fas").removeClass("fa-plus").addClass("fa-minus");
          }).on('hide.bs.collapse', function(){
            $(this).prev(".card-header").find(".fas").removeClass("fa-minus").addClass("fa-plus");
          });
      });
    </script>
    <script>
      function SmDeviceFilter() {
        var filter = document.getElementById("MobView");
        if (filter.style.display === "block") {
          filter.style.display = "none";
        } else {
          filter.style.display = "block";
        }
      }
    </script>
  </body>
</html>