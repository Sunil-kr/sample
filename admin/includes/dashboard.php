
<?php
    // =================================================
    // Get Difference in Date and Time in minutes
    // ================================================

    date_default_timezone_set('Asia/Kolkata');

    // date_default_timezone_set('America/Los_Angeles');

    $current_date_time = date('Y-m-d H:i:s');

    $date_time_one_mon_ago = date("d-m-Y H:i:s", strtotime("-1 months")); 



             
?> 

<style>
  
  .dashboard-iframe{
    width: 100%;
    height: 75vh; 
    overflow-x: hidden;
  }
</style>

<main id="main" class="main" >

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard" >

    <iframe src="https://techbinge.org/JLO" style="zoom: 80%;" class="dashboard-iframe" frameborder="0">

    </iframe>
    </section>

</main><!-- End #main -->
  
  
  
  
  <script>
  
  
      // *********************************************
    //Confirm form resubmission restrict 
    // ********************************************
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    // *********************************************
    //Confirm form resubmission restrict 
    // ********************************************

  
  </script>

