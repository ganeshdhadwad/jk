<div class="pizzaro-sorting">
                  <form class="woocommerce-ordering" method="get">
                     <select name="orderby" class="orderby">
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                     </select>
                     <input type="hidden" name="shop_view" value="grid-view"><input type="hidden" name="shop_style" value="lite"><input type="hidden" name="shop_layout" value="left-sidebar"><input type="hidden" name="shop_columns" value="3">
                  </form>
                  <form  class="form-pizzaro-wc-ppp" style="display: none;">
                     <select name="ppp" onchange="this.form.submit()" class="pizzaro-wc-wppp-select c-select">
                        <option value="9" selected="selected">Show 9</option>
                        <option value="18">Show 18</option>
                        <option value="36">Show 36</option>
                        <option value="-1">Show All</option>
                     </select>
                     <input type="hidden" name="shop_view" value="grid-view"><input type="hidden" name="shop_style" value="lite"><input type="hidden" name="shop_layout" value="left-sidebar">
                     <input type="hidden" name="shop_columns" value="3">
                  </form>
                  <p class="woocommerce-result-count">Showing 1–9 of 54 results</p>
                  <div class="product-filters-widgets">
                     <a class="dropdown-toggle collapsed" data-toggle="collapse" href="#products_filter_collapse" aria-expanded="false" aria-controls="products_filter_collapse">More Filters<i class="fa fa-chevron-down"></i></a>
                     <div class="collapse" id="products_filter_collapse">
                        <div id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
                           <span class="gamma widget-title">Filter by price</span>
                           <form method="get" action="#">
                              <div class="price_slider_wrapper">
                                 <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
                                 </div>
                                 <div class="price_slider_amount">


                                    <button type="submit" class="button">Filter</button>
                                    <div class="price_label" style="">Price: <span class="from"><?php echo $currency; ?>1</span> — <span class="to"><?php echo $currency; ?>59</span></div>
                                    <div class="clear"></div>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div id="woocommerce_layered_nav-2" class="widget woocommerce widget_layered_nav">
                           <span class="gamma widget-title">Food Type</span>
                           <ul>
                              <li class="wc-layered-nav-term "><a href="#">Meat</a> <span class="count">(7)</span></li>
                              <li class="wc-layered-nav-term "><a href="#">Spicy</a> <span class="count">(7)</span></li>
                              <li class="wc-layered-nav-term "><a href="#">Veg</a> <span class="count">(12)</span></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>