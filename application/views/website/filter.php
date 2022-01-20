
    <section class="FilterPage">
      <div class="container">
        <?php 
            include('breadcrumb.php');     
        ?>
        <div class="row">
          <div class="col-lg-3">
            <div class="FilterOptions">
              <div class="filterCategories">
                <h3>Category</h3> <hr>
                <p><a href="#" class="ActiveList">Foodgrains, Oil &amp; Masala</a></p>
                <ul>
                  <li><a href="#" data-toggle="collapse" data-target="#SubList" aria-expanded="false" aria-controls="SubList">Atta, Flours &amp; Sooji (60)</a>
                    <ul class="collapse" id="SubList">
                      <li><a href="#">Atta Whole Wheat (30)</a></li>
                      <li><a href="#">Rice & Other Flours (16)</a></li>
                      <li><a href="#">Sooji, Maida & Besan (14)</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Dals &amp; Pulses (135)</a></li>
                  <li><a href="#">Dry Fruits (194)</a></li>
                  <li><a href="#">Edible Oils &amp; Ghee (209)</a></li>
                  <li><a href="#">Masalas &amp; Spices (250)</a></li>
                  <li><a href="#">Organic Staples (342)</a></li>
                  <li><a href="#">Rice &amp; Rice Products (141)</a></li>
                  <li><a href="#">Salt, Sugar &amp; Jaggery (47)</a></li>
                </ul>
              </div><!--/-filterCategories-->
              <div class="FilterBrands">
                <hr><h3>Brands <!--<span><input type="text" name="search" placeholder="Search by Brnads :"></span>--></h3>
                <hr>
                <label for="Fortune"><input type="checkbox" name="brands" value="Fortune"> Fortune</label>
                <label for="Ashirwad"><input type="checkbox" name="brands" value="Ashirwad"> Ashirwad</label>
                <label for="Patanjali"><input type="checkbox" name="brands" value="Patanjali"> Patanjali</label>
                <label for="patanjali"><input type="checkbox" name="brands" value="Patanjali"> Patanjali</label>
                <label for="Dabur"><input type="checkbox" name="brands" value="Dabur"> Dabur</label>
                <label for="Detol"><input type="checkbox" name="brands" value="Detol"> Detol</label>
              </div>
              <div class="FoodPreference">
                <hr><h3>Food Preference</h3><hr>
                <label for="Vegetarian"><input type="checkbox" name="FoodPref" value="Vegetarian"> Vegetarian</label>
                <label for="Non-Vegetarian"><input type="checkbox" name="FoodPref" value="Non-Vegetarian"> Non-Vegetarian</label>
              </div>
              <div class="CountryOrigin">
                <h3>Country Of Origin</h3><hr>
                <label for="India"><input type="checkbox" name="CountryOrigin" value="India"> India</label>
                <label for="Austrialia"><input type="checkbox" name="CountryOrigin" value="Austrialia"> Austrialia</label>
                <label for="Ameriaca"><input type="checkbox" name="CountryOrigin" value="Ameriaca"> Ameriaca</label>
                <label for="Italy"><input type="checkbox" name="CountryOrigin" value="Italy"> Italy</label>
                <label for="Cananda"><input type="checkbox" name="CountryOrigin" value="Cananda"> Cananda</label>
                <label for="UAE"><input type="checkbox" name="CountryOrigin" value="UAE"> UAE</label>
                <label for="Afghanistan"><input type="checkbox" name="CountryOrigin" value="Afghanistan"> Afghanistan</label>
                <label for="Spain"><input type="checkbox" name="CountryOrigin" value="Spain"> Spain</label>
              </div>
              <div class="AllergenInfo">
                <hr><h3>Allergen Info</h3><hr>
                <label for="Gluten Free"><input type="checkbox" name="Allergen" value="Gluten Free"> Gluten Free</label>
                <label for="Nut Free"><input type="checkbox" name="Allergen" value="Nut Free"> Nut Free</label>
                <label for="Dairy Free"><input type="checkbox" name="Allergen" value="Dairy Free"> Dairy Free</label>
                <label for="Fish Free"><input type="checkbox" name="Allergen" value="Fish Free"> Fish Free</label>
                <label for="Trans Fat Free"><input type="checkbox" name="Allergen" value="Trans Fat Free"> Trans Fat Free</label>
                <label for="Contains Milk"><input type="checkbox" name="Allergen" value="Contains Milk"> Contains Milk</label>
                <label for="Lactose Free"><input type="checkbox" name="Allergen" value="Lactose Free"> Lactose Free</label>
                <label for="No Added Sugar"><input type="checkbox" name="Allergen" value="No Added Sugar"> No Added Sugar</label>
              </div>
              <div class="PriceRange">
                <hr><h3>Price Range</h3><hr>
                <label for="Less Than 20"><input type="checkbox" name="PriceRange" value="Less Than 20"> Less than Rs 20 (15)</label>
                <label for="Rs 21 to Rs 50"><input type="checkbox" name="PriceRange" value="Rs 21 to Rs 50"> Rs 21 to Rs 50 (157)</label>
                <label for="Rs 51 to Rs 100"><input type="checkbox" name="PriceRange" value="Rs 51 to Rs 100"> Rs 51 to Rs 100 (302)</label>
                <label for="Rs 101 to Rs 200"><input type="checkbox" name="PriceRange" value="Rs 101 to Rs 200"> Rs 101 to Rs 200 (283)</label>
                <label for="Rs 201 to Rs 500"><input type="checkbox" name="PriceRange" value="Rs 201 to Rs 500"> Rs 201 to Rs 500 (240)</label>
                <label for="More Than Rs 501"><input type="checkbox" name="PriceRange" value="More Than Rs 501"> More than Rs 501 (248)</label>
              </div>
              <div class="Discount">
                <hr><h3>Discount</h3><hr>
                <label for="Upto 5%"><input type="checkbox" name="Discount" value="Upto 5%"> Upto 5% (160)</label>
                <label for="5% - 10%"><input type="checkbox" name="Discount" value="5% - 10%"> 5% - 10% (212)</label>
                <label for="10% - 15%"><input type="checkbox" name="Discount" value="10% - 15%"> 10% - 15% (154)</label>
                <label for="15% - 25%"><input type="checkbox" name="Discount" value="15% - 25%"> 15% - 25% (200)</label>
                <label for="More than 25%"><input type="checkbox" name="Discount" value="More than 25%"> More than 25% (262)</label>
              </div>
              <div class="PackSize">
                <hr><h3>Pack Size</h3><hr>
                <label for="2x100g"><input type="checkbox" name="PackSize" value="2x100g"> 2x100 g Multipack</label>
                <label for="2x200g"><input type="checkbox" name="PackSize" value="2x200g"> 2x200 g Multipack</label>
                <label for="2x250g"><input type="checkbox" name="PackSize" value="2x250g"> 2x250 g Multipack</label>
                <label for="2x500g"><input type="checkbox" name="PackSize" value="2x500g"> 2x500 g Multipack</label>
                <label for="2x500g Pouch"><input type="checkbox" name="PackSize" value="2x500g Pouch"> 2x500 g Pouch Multipack</label>
              </div>
            </div><!--/-FilterOptions-->
          </div>
          <div class="col-lg-9">
            <div class="FilterProducts">
              <div class="row">
                <div class="col-lg-9 pl-2 pr-2"><h2>Foodgrains, Oil & Masala (58)</h2><hr></div>
                <div class="col-lg-3 pl-2 pr-2">
                  <select name="productView" class="form-control">
                    <option value="Popularity">Popularity</option>
                    <option value="Price - High to Low">Price - High to Low</option>
                    <option value="Price - Low to High">Price - Low to High</option>
                    <option value="Alphabetical">Alphabetical</option>
                    <option value="Off - High to Low">% Off - High to Low</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="#"><img src="<?php echo file_url('assets/website/images/products/staples/multigrain-atta.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Ashirward Multi Millet Mix Atta</div>
                    <div class="ProductWeight">1kg</div>
                    <div class="ProductPrice">MRP : <s>₹140</s> ₹125</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="#"><img src="<?php echo file_url('assets/website/images/products/staples/sooji.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Patanjali Sooji</div>
                    <div class="ProductWeight">500g</div>
                    <div class="ProductPrice">MRP : <s>₹28</s> ₹25</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/immunity-boosters/turmeric-powder.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Tata Sampann Turmeric Powder</div>
                    <div class="ProductWeight">25g</div>
                    <div class="ProductPrice">MRP : <s>₹15</s> ₹9</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/tata-toor-dal.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Tata Unpolished Toor Dal</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹150</s> ₹126</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/everyday-bashmati-rice.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Fortune Everday Bashmati Rice</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹90</s> ₹80</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/madhuram.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Patanjali Madhuram (Gur Powder)</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹70</s> ₹65</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/mustard-oil.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Fortune Mustard Oil</div>
                    <div class="ProductWeight">1l</div>
                    <div class="ProductPrice">MRP : <s>₹122</s> ₹115</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/salt.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Tata Salt</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹19</s> ₹17</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/cashew-dry-fruits.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Nutraj Cashewnuts</div>
                    <div class="ProductWeight">400g</div>
                    <div class="ProductPrice">MRP : <s>₹650</s> ₹400</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/patanjali-ghee.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Patanjali Ghee</div>
                    <div class="ProductWeight">500ml</div>
                    <div class="ProductPrice">MRP : <s>₹295</s> ₹280</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/kitchen-king-masala.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">MDH Kitchen King Masala</div>
                    <div class="ProductWeight">50g</div>
                    <div class="ProductPrice">MRP : <s>₹36</s> ₹35</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/brown-sugar.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Organin Brown Sugar</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹145</s> ₹135</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="#"><img src="<?php echo file_url('assets/website/images/products/staples/multigrain-atta.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Ashirward Multi Millet Mix Atta</div>
                    <div class="ProductWeight">1kg</div>
                    <div class="ProductPrice">MRP : <s>₹140</s> ₹125</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="#"><img src="<?php echo file_url('assets/website/images/products/staples/sooji.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Patanjali Sooji</div>
                    <div class="ProductWeight">500g</div>
                    <div class="ProductPrice">MRP : <s>₹28</s> ₹25</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/immunity-boosters/turmeric-powder.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Tata Sampann Turmeric Powder</div>
                    <div class="ProductWeight">25g</div>
                    <div class="ProductPrice">MRP : <s>₹15</s> ₹9</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/tata-toor-dal.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Tata Unpolished Toor Dal</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹150</s> ₹126</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/everyday-bashmati-rice.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Fortune Everday Bashmati Rice</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹90</s> ₹80</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/madhuram.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Patanjali Madhuram (Gur Powder)</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹70</s> ₹65</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/mustard-oil.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Fortune Mustard Oil</div>
                    <div class="ProductWeight">1l</div>
                    <div class="ProductPrice">MRP : <s>₹122</s> ₹115</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/salt.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Tata Salt</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹19</s> ₹17</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/cashew-dry-fruits.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Nutraj Cashewnuts</div>
                    <div class="ProductWeight">400g</div>
                    <div class="ProductPrice">MRP : <s>₹650</s> ₹400</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/patanjali-ghee.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Patanjali Ghee</div>
                    <div class="ProductWeight">500ml</div>
                    <div class="ProductPrice">MRP : <s>₹295</s> ₹280</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/kitchen-king-masala.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">MDH Kitchen King Masala</div>
                    <div class="ProductWeight">50g</div>
                    <div class="ProductPrice">MRP : <s>₹36</s> ₹35</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>
                <div class="col-lg-3 pl-2 pr-2">
                  <div class="ProductWrap">
                    <a href="filter.php"><img src="<?php echo file_url('assets/website/images/products/staples/brown-sugar.jpg'); ?>" alt="Products"></a>
                    <div class="ProductDesc">Organin Brown Sugar</div>
                    <div class="ProductWeight">1Kg</div>
                    <div class="ProductPrice">MRP : <s>₹145</s> ₹135</div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                      <form action="#" method="post">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                          </div>
                          <input type="number" name="quantity" placeholder="1" class="QtIn">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></sapn> Add</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div><!--/-#ProductWrap-->
                </div>

              </div>
            </div><!--/-FilterProducts-->
          </div>
        </div>
      </div>
    </section>
   <?php include 'bottom_section.php' ;?>
   <script>

   </script>
  </body>
</html>
