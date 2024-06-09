<?php
  include("db.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .email-area {
                width: 100%;
                height: 100px;
            }
            .email-area textarea {
              min-width: 100%;
  height: 100px;
            }
            
            .email-area span i {
                margin-right: 10px;
            }
           
        </style>
    </head>

    <body>

        <main id="main" class="main">

            <div class="card-title">
                <h3>View All Registered Users</h3>

            </div>
            <!-- End Page Title -->
            <section>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="form1" method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Profile</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Email</th>
                                            <th><input type="checkbox" name="check" class="check sel" id="btn" onclick="selectAll()"></th>
                                                <th style="position: absolute;
        right: 27px;"><input type="checkbox" name="check" class="check un" id="btn2" onclick="unselectAll()"></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                  $data = ViewAllUser($db);
                  $count=1;
                  foreach($data as $row)
                  {
                    // echo $row['name'];
                    // $valid_date = date( "Y-m-d H:i:s",strtotime(str_replace('/','-',$row['created_at'])));
                    $user_email = $row['email'];
              ?>
                                            <tr>
                                                <td scope="row">
                                                    <?=$count?>
                                                </td>
                                                <td>
                                                    <img class="card-img" src="./uploaded_user_images/<?= $row['profile_img']?>" style="width: 50px; height: 50px; border-radius: 50%">
                                                </td>

                                                <td>
                                                    <?= $row['name']?>
                                                </td>
                                                <td>
                                                    <?= $row['email']?>
                                                </td>
                                                <td> <input type="checkbox" name="check[]" class="check" value="<?php echo $user_email ?>"></td>
                                            </tr>
                                            <?php
                  $count++;
                  }
              ?>
                                    </tbody>
                                </table>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Send Notification</h5>

                                <!-- Multi Columns Form -->
                                <form class="row g-3" action="includes/php-mailer/send-email.php" Method="post" id="form1">

                                    <div class="col-md-12 pt-4">
                                        <label for="inputName5" class="form-label">To</label>
                                        <div class="email-area">
                                           <textarea id="list" name="emails" required style="height: 100px; border: 2px solid #ddd;" readonly>
                                            </textarea>
                                            <!-- <span><i class="fa fa-times" aria-hidden="true"></i></span> -->
                                        </div>
                                        <!-- <input type="text" class="form-control" id="recipients_email" name="recipients_email" id="inputName5" required> -->

                                    </div>
                                    <div class="col-md-12"> 
                                        <label for="inputName5" class="form-label">Description</label>
                                        <textarea class="form-control" name="email_content" required style="height: 100px" spellcheck="false"></textarea>
                                    </div>

                                    <div class="text-start">
                                        <button type="submit" name="notify_user_on_email" class="btn btn-success w-100">Send</button>
                                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                    </div>
                                </form>
                                <!-- End Multi Columns Form -->

                            </div>
                        </div>

                    </div>




                </div>
            </section>

        </main>


        <script>



let list = [];
            var ls = document.getElementById("list");
            var x = document.querySelectorAll(".check");
            let btn = document.getElementById("btn");
            let btn2 = document.getElementById("btn2");
            var hideUn = document.querySelectorAll(".un");
            var hideSel = document.querySelectorAll(".sel");

            function selectAll(){
                for(var i = 0; i < x.length; i++)
                {
                     x[i].checked = true;
                     let allMail = x[i].value;
                     list.push(allMail);
                }
               btn.style.display="none";
               btn2.style.display="block"
            }

            function unselectAll(){
                for(var i = 0; i < x.length; i++)
                {
                    x[i].checked = false;
                    let allMail = x[i].value;
                    list.pop(allMail);
                }
                btn2.style.display="none"
                btn.style.display="block";
            }


       
      
            // console.log(x);

            for (y of x) {
                y.addEventListener("click", function() {
                    if (this.checked == true) {
                        list.push(this.value);
                        ls.innerHTML = list.join(';&nbsp&nbsp');
                    } else {
                        list = list.filter(e => e !== this.value);
                        ls.innerHTML = list.join(';&nbsp&nbsp');
                    }
                })
            }





  
        </script>
    </body>

    </html>


    <?php

if(isset($_POST['notify_user']))
{
  // print $_POST;
  echo $_POST['user_email'];

}

    ?>