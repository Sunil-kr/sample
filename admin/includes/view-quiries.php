<?php
  include("db.php");
?>

<main id="main" class="main">
  
  <div class="card-title">
    <h3>View All Quiries</h3>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">


      <div class="col-md-12"> 
        <div class="card">
          <div class="card-body pt-3">
            <!-- <h5 class="card-title">Main Category</h5> -->
 
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead> 
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col">Name</th> 
                  <th scope="col">Email </th>
                  <th scope="col">Mobile No</th>
                  <th scope="col">message</th>
                  <th scope="col">Dated</th>
                  <!-- <th scope="col">Edit</th> --> 
                </tr>
              </thead>

              <tbody style="overflow-x:auto">
              <?php
                  $data = ViewAllQuiries($db);
                  $count=1;
                  foreach($data as $row)
                  {
                    // echo $row['name'];
                    // $valid_date = date( "Y-m-d H:i:s",strtotime(str_replace('/','-',$row['created_at'])));
              ?>
                    <tr>
                    <td scope="row"><?=$count?></td>
                    
                    <td><?= $row['name']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['mobile']?></td> 
                    <td><?= $row['message']?></td>              

                    <td>
                        <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                            <?= date('F jS, Y',strtotime($row['created_at']))?>
                        </time>
                    </td>

                    <!-- <td>
                    <a class="btn btn-success" href="../includes/editdata.php?id=<?=$d['id']?>"> <i class="bi bi-pencil-square"></i></a>
                    </td> -->

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
</script>



