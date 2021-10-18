<aside class="ps-sidebar" style="margin-left: 40px;">
            <aside class="widget widget_sidebar widget_category">
                <h3 class="widget-title">Categories</h3>
                <ul class="ps-list--checked">
                     <?php 
                     $getCat=$cat->getAllCat();
                    if ($getCat) {
                        $i=0;
                        while ($re=$getCat->fetch_assoc()) {
                            $i++;
                     ?>
                    <li class="current"><a href="productbycat.php?catId=<?php echo($re['catId']) ;?>"><?php echo($re['catName']) ;?></a></li>
                    <?php }}else{echo("catagory not found");} ?>
                </ul>
            </aside>
            
            <aside class="widget widget_sidebar widget_category">
                <h3 class="widget-title">City</h3>
                <ul class="ps-list--checked">
                    <?php 
                     $getCity=$pd->getAllCity();
                    if ($getCity) {
                       
                        while ($result=$getCity->fetch_assoc()) {
                            
                     ?>
                    <li class="current"><a href="productbycity.php?city_id=<?php echo($result['name']) ;?>"><?php echo($result['name']); ?> </a></li>
                    <?php }} ?>
                    
                </ul>
            </aside>
            <aside class="widget widget_sidebar widget_ads">
                <h3 class="widget-title">Ads banner</h3><a href="#"><img src="images/widget-ads.jpg" alt=""></a>
            </aside>
        </aside>