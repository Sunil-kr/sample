
         <!-- ! Major Practice Area Carousel -->
         <section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
          <div class="container-fluid">
              <h3 class="special">Practice Area</h3>
            <!-- <div class="line"></div> -->
            <div class="row">
              <div class="col-md-12">
                <div id="news-slider" class="owl-carousel customCarousel" data-items="1" data-sm-items="1" data-md-items="2"
                  data-lg-items="3" data-xl-items="3" data-xxl-items="3" data-stage-padding="0" data-xxl-stage-padding="0"
                  data-margin="10" data-autoplay="true" data-nav="true" data-dots="false" data-animation-in="fadeIn"
                  data-animation-out="fadeOut" data-autoplay="true">
                  <!-- Family-law -->

                  <?php
                        $data = getAllPracticeArea($db); 
                        $count=1;
                        foreach($data as $row)
                        {
                    ?>
                  <article class="box-icon-classic">
                    <div class="unit box-icon-classic-body">
                        <div class="unit-img">
                            <img src="admin/uploaded_practice_area/<?= $row['cover_image']?>" alt="<?=$row['title']?>">
                        </div>

                        <div class="unit-body">
                        <h5 class="box-icon-classic-title"><a href="practice-area-details.php?area=<?=$row['slug']?>"><?=$row['title']?></a></h5>
                        <p class="box-icon-classic-text truncate"><?php echo strip_tags($row['content']);?> </p>
                        <p class="read-more">
                            <a href="practice-area-details.php?area=<?=$row['slug']?>">Read More</a>
                        </p>
                        </div>
                    </div>
                  </article>

                  <?php
                        }
                    ?>





                    <!-- Criminal-law -->
                    <!-- <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/cri-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="criminal-law.php">CRIMINAL-LAW</a></h5>
                  <p class="box-icon-classic-text">Criminal law in India means offenses against the state, it includes
                    felonies and misdemeanors. The standard of proof for crimes is "beyond a reasonable doubt</p>
                  <p class="read-more">
                    <a href="criminal-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article> -->
                    <!-- Arbitration-law  -->
                    <!-- <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/att-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="arbitration-law.php">ARBITRATION LAW</a></h5>
                  <p class="box-icon-classic-text">The Indian law of arbitration is contained in the Arbitration and
                    Conciliation Act 1996 (Act). The Act is based on the 1985 UNCITRAL Model Law on International
                    Commercial.
                  </p>
                  <p class="read-more">
                    <a href="arbitration-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article> -->

                    <!-- Corporate-law -->
                    <!-- <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/cop-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="corporate-law.php">CORPORATE LAW</a></h5>
                  <p class="box-icon-classic-text">Corporate Law deals with the formation and operations of corporations
                    and is related to commercial and contract law. A corporation is a legal entity created under the
                    laws.
                  </p>
                  <p class="read-more">
                    <a href="corporate-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article> -->
                    <!-- Civil-law -->
                    <!-- <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/civ-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="civil-law.php">CIVIL LAW</a></h5>
                  <p class="box-icon-classic-text">Civil law deals with the disputes between individuals, organizations,
                    or between the two, in which compensation is awarded to the victim. A defendant in civil litigation
                    is nev.</p>
                  <p class="read-more">
                    <a href="civil-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article> -->

                    <!-- labour-law -->
                    <!-- <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/lab-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="labour-law.php">LABOUR LAWS</a></h5>
                  <p class="box-icon-classic-text">The constitution of India confers innumerable rights for the
                    protection of labour. Indian constitution through various articles protects, supports, and acts as a
                    guidel.
                  </p>
                  <p class="read-more">
                    <a href="labour-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article> -->


                </div>
              </div>
            </div>
          </div>
        </section>