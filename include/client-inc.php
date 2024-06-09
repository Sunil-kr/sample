

     <!--===================================== Our Clients Section Start===================================== -->
     <section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
        <div class="container-fluid">
          <h6 class="special">Our Client's</h6>
          <!-- <div class="line"></div> -->
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-classic owl-dots-secondary" data-items="1" data-sm-items="2" data-md-items="3"
            data-lg-items="6" data-xl-items="8" data-xxl-items="10" data-stage-padding="15" data-xxl-stage-padding="0"
            data-margin="30" data-autoplay="true" data-nav="true" data-dots="true">
            <!-- Thumbnail Classic-->
            <?php
                $data = getClient($db); 
                $count=1;
                foreach($data as $row)
                {
            ?>

            <article class="thumbnail thumbnail-mary">
              <div class="thumbnail-mary-figure"><img src="admin/cms/uploaded_clients/<?=$row['client_logo']?>" alt="<?=$row['client_logo']?>" width="270" height="195" />
              </div>
              <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/client/1.png"
                  data-lightgallery="item"><img src="admin/cms/uploaded_clients/<?=$row['client_logo']?>" alt="<?=$row['client_logo']?>" width="270" height="195" /></a>
              </div>
            </article>

            <?php
                }
            ?>

          
          </div>
        </div>
      </section>
      <!--===================================== Our Clients Section End===================================== -->
