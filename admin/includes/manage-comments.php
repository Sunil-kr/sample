<?php
  include("db.php");
?>

<main id="main" class="main">
  
  <div class="card-title">
    <h3>Manage Comments</h3>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="index.php?manage-comments">Manage Comments</a></li>
        </ol>
    </nav>

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
                  <th scope="col" width="5%">#</th> 
                  <th scope="col" width="5%">Name</th> 
                  <th scope="col" width="10%">Email </th>
                  <th scope="col" width="50%">Comment</th>
                  <th scope="col" width="15%">Blog</th>
                  <th scope="col" width="5%">Blog ID</th>
                  <th scope="col" width="5%">Date</th>
                  <th scope="col" width="5%">Delete</th>
                  <!-- <th scope="col">Edit</th> --> 
                </tr>
              </thead>

              <tbody style="overflow-x:auto">
              <?php
                  $data = getAllComments($db);
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
                    <td class="truncate"><?= $row['Comment']?></td> 
                    <td><?= $row['blog_name']?></td>              
                    <td><?= $row['blog_code']?></td>   

                    <td>
                        <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                            <?= date('F jS, Y',strtotime($row['created_at']))?>
                        </time>
                    </td>              

                    <td class="align-middle">
                      <div class="btn-group">
                      <?php $comment_id =  $row['id'];     // Converting " " = space to #  ?>
                      <a class="btn btn-sm btn-danger" href="includes/function.php?remove_comment=<?=$comment_id?>" onclick="return  confirm('Are you sure, You want to remove this Blog? ')">
                       <i class="bi bi-x-lg"></i></a>
                      </div>
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
</script>



