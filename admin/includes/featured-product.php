<?php 
session_start();
error_reporting(0);
include("db.php");
// include("function.php");

?>

<style>
    td{
      font-size: 14px;
    }

    td a{
      font-size: 14px; line-height: 50px; color: black;
    }

    img{
      height: 50px; width: 50px;
    }

    .product_name{
        overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    max-height:  70px;
    font-size: 22px;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    }

    /* styling for alert as bootstrap default was not working*/
      #alert {
          margin-left: auto;
          margin-right: 20px;
          margin-top: 20px;
          padding:10px;
          padding-top: 0px;
          padding-bottom: 0px;
          
         
      } 

      .close{
        background: none;
        border: none;
        
        }

      .close span{
          font-size: 25px;
          font-weight: bold;
        }

</style>

<main id="main" class="main">



  <div class="card-title">

    <h3>Manage Featured Products here</h3>

    <span id="response"></span>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">


      <div class="col-md-8">
        <div class="card">
          <div class="card-body pt-3">
            <!-- <h4 class="mb-3 p-2 m-0 text-center  bg-warning">Existing Featured Products </h4> -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col">Product Image</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Unique Code</th>
                  <th scope="col">Remove</th>
                </tr>
              </thead>

              <tbody>
              <?php
                  $data = getAllFeaturedProducts($db);
                  $count=1;
                  foreach($data as $row)
                  {
                    // echo $row['name'];
              ?>
                    <tr>
                    <td scope="row" class="pt-3"><?=$count?></td>

                    <?php


                        // $product_unique_code = str_replace(' ', '#', ( $row['products_unique_code']));     // Converting " " = space to # 

                        $product_unique_code =  $row['product_code'];

                        $query="SELECT * FROM `images` WHERE `product_code` = '$product_unique_code' ";

                        $run=mysqli_query($db,$query);

                        $res = mysqli_fetch_assoc($run);

                        // echo $res['image'];
                        
                    ?>
                     <td><a  href="../product-details.php?Product_detail_Unique_Code=<?= $product_unique_code ?>">
                        <img src="uploaded_images/<?= $res['image']?>" >         
                    </a></td>

                    <td class="pt-3 "><?= $row['product_name']?></td>
                    <td class="pt-3 "><?= $row['product_code']?></td>

                    <?php 
                        $product_unique_code = str_replace('#', ' ', ( $row['product_code']));     // Converting " " = space to # 
                    ?>

                    <td class="pt-3">
                    <a class="btn btn-sm btn-danger rounded-pill" href="includes/function.php?remove_Featured_Product_code=<?= $product_unique_code?>" onclick="return  confirm('Are you sure, You want to remove this product ? ')"> Remove</a>
                    </td>

                    </tr>
              <?php
                  $count++;
                  }
              ?>  

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>



      <div class="col-md-4">
        <div class="card">
          <div class="card-body pt-3">
          <h5 class="mb-3 p-2 m-0 text-center text-light bg-success">Add Products </h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <!-- <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col">Image</th>
                  <th scope="col">Unique Code</th>
                  <th scope="col">Add</th>
                </tr>
              </thead> -->

              <tbody style="height: 200px">
              <?php
                  $data = getAllProduct($db);
                  $count=1;
                  foreach($data as $row)
                  {
                    // echo $row['name'];
              ?>
                    <tr>
                    <?php
                        // echo $row['product_name'];
                        $product_id = $row['id'];

                        $query="SELECT * FROM `images` WHERE `product_id` = $product_id ";

                        $run=mysqli_query($db,$query);

                        $res = mysqli_fetch_assoc($run)
         
                    ?>

                    <?php
                            $product_unique_code = str_replace('#', ' ', ($row['product_code']));     // Converting " " = space to # 
                    ?>
                            <td scope="row">    
                                <a href="../product-details.php?Product_detail_Unique_Code=<?= $product_unique_code ?>"> 
                                    <img src="uploaded_images/<?= $res['image']?>" id="product-img" class=""  alt="<?php
                                    $alt= str_replace(' ', '-', ( $res['image'])); echo$alt ?>">  
                                </a>
                            </td>
                            
                            <td class="product_name" ><a  href="../product-details.php?Product_detail_Unique_Code=<?= $product_unique_code ?>">  <?= $row['product_name']?></a>  </td>
                           
                            
                    <td class="pt-3"><?= $row['product_code']?></td>

                    <td>
                    <!-- <a class="btn btn-sm btn-danger rounded-pill"  href="./includes/function.php?add_to_Featured_Product_Unique_Code=<?=$product_unique_code?>"> Add</a> -->
                    <a class="btn btn-sm btn-success rounded-pill mt-2"  onclick="addToFeaturedProduct('<?php echo $product_unique_code ?>')"> Add</a> <!-- take care of case senstivity while declaring a variable -->
                    </td>

                    </tr>
              <?php
                  $count++;
                  }
              ?>  

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>




    </div>
  </section>

</main><!-- End #main -->

<script>
    window.onload=function(){
      document.getElementById("linkid").click();
    };


//--------------------------------------------------------
    // ajax to insert data in to featured product
//--------------------------------------------------------
    function addToFeaturedProduct(value)
    {
      var add_to_Featured_Product_Unique_Code = value;

    // document.getElementById("select_label").style.display = 'none';;
      // alert(add_to_Featured_Product_Unique_Code);

        $.ajax({ 
        url:'includes/function.php',
        method:'GET',
        data: {
            // get_option:val
            add_to_Featured_Product_Unique_Code : add_to_Featured_Product_Unique_Code,
        
        },
        success: function (response) {  

            document.getElementById("response").innerHTML=response; 
            // alert(response);
            setTimeout(function(){
              window.location.reload();
            }, 500);
        }
        });
     }




</script>