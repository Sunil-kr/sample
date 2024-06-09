
<link rel="stylesheet" href="css/cookie-style.css">

<div class="disclaimer-page container" id="disclaimer-page" style="display:none" >
  <div id="cookieAcceptBar" class="cookieAcceptBar">

    <div id="modalOverlay" >
      <div class="modalPopup" >
        <div class="modalContent">
          <?php
              $data = getDisclaimer($db);
              $count=1;
              foreach($data as $row)
              { 
                ?>
                      <h1><?=$row['heading']?></h1>
                      <p><span id="dis_content" class=""> <?=$row['content']?> </span> </p>
                      
                      <!-- <small onclick="myFunction()" class="text-primary">Read more</small> -->


                </div>
            <?php
              }
              ?>
          <button id="cookieAcceptBarConfirm" class="btn btn-agree">Agree</button> &nbsp
          <button id="cookieRejectBarConfirm" class="btn btn-disagree">Disagree</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  window.onload = function () {
    // alert("hello");
    checkCookie();


  }


  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }


  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }


  function checkCookie() {
    let user = getCookie("username");


    if (user == "") {
      // alert("Thanks for accepting our cookies.");  
      document.getElementById('disclaimer-page').style.display = 'block';

      // IF clicked Agreee
      document.getElementById('cookieAcceptBarConfirm').onclick = function () {
        user = "JLOcookie";
        if (user != "" && user != null) {
          setCookie("username", user, 30);
        }
      };

      // IF clicked DisAgreee
      document.getElementById('cookieRejectBarConfirm').onclick = function () {
        // window.history.back(-10);
        if (confirm("Exit the Site?")) {

          window.open('', '_self', '');
          window.close();
        }
      };

    } else {
      // Currently no need to add any else here as it auto run the inline added display: none;
    }

  }



  // For text truncate on click
  function myFunction() {
    var element = document.getElementById("dis_content");
    element.classList.remove("truncated");
  }
</script>