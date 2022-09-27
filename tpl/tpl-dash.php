<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تنظیمات کاربری - <?= getUserData($_SESSION['loginuser'])->name ?></title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <div class="task-manager">
    <!-- left bar starts -->
    <div class="left-bar">
      <div class="upper-part">
        <div class="actions">
          <div class="circle"></div>
          <div class="circle-2"></div>
        </div>
        <div class="userinfo">
          <span>
            <?= getDayOrNight() ?> بخیر، <?= getUserData($_SESSION['loginuser'])->name ?>
          </span>
         
          <a href="<?= goUrl('?logout') ?>"> 
            <i class="fa-solid fa-sign-out feather" title="خارج شدن" style="float:left ;"></i>
          </a>  
          <span style="float:left;  visibility: hidden; ">1</span>
          <a href="<?= goUrl('dash.php') ?>"> 
            <i class="fa-solid fa-user feather" title="حساب کاربری" style="float:left ;"></i>
          </a>
        </div>
      </div>

      <!-- left content starts -->
      <!-- <div class="left-content">
        <ul class="menu-list">
            <li class="menu-item">
                <a style="text-decoration:none; color:black;" href="<?= goUrl("index.php") ?>">
                <i class="fa-solid fa-rocket feather"></i>
                <span> بازگشت به برنامه </span>
                </a>
            </li> 
        </ul>
      </div> -->

          <a style="text-decoration:none; color:black; " href="<?= goUrl("index.php") ?>">
          <div class="task-box red" style="cursor:pointer;">
            <div class="description-task">
              <div class="task-name">
                <i class="fa-solid fa-rocket feather"></i>
                <span> مدیریت برنامه‌ها</span>
              </div>
            </div>
          </div>
          </a>
          <div class="task-box yellow">
            <div class="description-task">
              <div class="task-name">امروز  <?php echo verta()->format('%d، %B %Y');?></div>
            </div>
          </div>
          <div class="task-box blue">
            <div class="description-task">
              <div class="task-name"><?= $dayswithus ?> روز پیش به جمع ما پیوستی!</div>
            </div>
          </div>
          <div class="task-box green">
            <div class="description-task">
              <div class="task-name">تا الان <?= count(getTasks('all')) ?> فعالیت ثبت کرده ای!</div>
            </div>
          </div>
      
      <!-- left content ends -->
    </div>
    <!--  -->
    <!-- left bar ends -->
    <!-- page content starts -->
    <div class="page-content">
      <div class="header">تنظیمات حساب کاربری</div>

      <!--  contnet categories starts -->
      <!-- 
      <div class="content-categories">
        <div class="label-wrapper">
          <input class="nav-item" name="nav" type="radio" id="opt-1" />
          <label class="category" for="opt-1">All</label>
        </div>
        <div class="label-wrapper">
          <input class="nav-item" name="nav" type="radio" id="opt-2" checked />
          <label class="category" for="opt-2">Important</label>
        </div>
        <div class="label-wrapper">
          <input class="nav-item" name="nav" type="radio" id="opt-3" />
          <label class="category" for="opt-3">Notes</label>
        </div>
        <div class="label-wrapper">
          <input class="nav-item" name="nav" type="radio" id="opt-4" />
          <label class="category" for="opt-4">Links</label>
        </div>
      </div> -->
        
        <!-- contemt categories ends --> 

      <!-- tasks wrapper starts -->
     

      <div class="row" style="margin-top: 20px;">
        <div class="col-md">
          <h5 class="form-label mb-3">تغییر نام</h5>
          <form action="<?php BASE_URL .'dash.php'?>" method="POST">
          <input type="text" class="form-control  mb-3" value="<?= getUserData($_SESSION['loginuser'])->name?>" name="newname" aria-describedby="button-addon1">
          <button class="btn btn-outline-secondary form-control  mb-3" type="submit" id="button-addon1" name="updatename">بروزرسانی</button>
          </form> 
        </div>
        <div class="col-md">
          <h5 class="form-label mb-3">تغییر گذرواژه</h5>
          <form action="<?php BASE_URL .'dash.php'?>" method="POST">
           <input type="password" class="form-control mb-3" placeholder="گذرواژه فعلی" name="oldpass" required="yes" aria-label="Example text with button addon" aria-describedby="button-addon1"> 
           <input type="password" class="form-control mb-3" placeholder="گذرواژه جدید" name="newpass" required="yes" aria-label="Example text with button addon" aria-describedby="button-addon1"> 
           <button class="btn btn-outline-secondary form-control mb-3" type="submit" name="updatepass" id="button-addon1">بروزرسانی</button>
          </form> 
        </div>
          
        <div class="row">
        <div class="col-md"></div>
        <div class="col-md">
          <?php if(isset($message) & !empty($message)): ?>
            <div class="alert alert-<?php echo 'danger'? $stat==1: 'success' ?>" role="alert" id="alertmsg">
            <?= $message ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-md"></div>
        </div>
 
        </div>
      <!-- tasks wrapper ends -->
      
    </div>
    <!--  -->
    <!-- page content ends -->

    <!-- right bar starts -->
    
      <!-- <div class="right-bar">
        <div class="top-part">
          <img class="feather feather-users" src="/assets/svg/users.svg" alt="" />
          <div class="count">6</div>
        </div>
        <div class="header">Schedule</div>
        <div class="right-content">
          <div class="task-box yellow">
            <div class="description-task">
              <div class="time">08:00 - 09:00 AM</div>
              <div class="task-name">Product Review</div>
            </div>
            <div class="more-button"></div>
            <div class="members">
              <img src="/assets/images/img1.jpg" alt="member" />
              <img src="/assets/images/img2.jpg" alt="member-2" />
              <img src="/assets/images/img3.jpg" alt="member-3" />
              <img src="/assets/images/img4.jpg" alt="member-4" />
            </div>
          </div>
          <div class="task-box red">
            <div class="description-task">
              <div class="time">01:00 - 02:00 PM</div>
              <div class="task-name">Team Meeting</div>
            </div>
            <div class="more-button"></div>
            <div class="members">
              <img src="/assets/images/img1.jpg" alt="member" />
              <img src="/assets/images/img2.jpg" alt="member-2" />
              <img src="/assets/images/img3.jpg" alt="member-3" />
              <img src="/assets/images/img4.jpg" alt="member-4" />
            </div>
          </div>
          <div class="task-box green">
            <div class="description-task">
              <div class="time">03:00 - 04:00 PM</div>
              <div class="task-name">Release Event</div>
            </div>
            <div class="more-button"></div>
            <div class="members">
              <img src="/assets/images/img5.jpg" alt="member" />
              <img src="/assets/images/img6.jpg" alt="member-2" />
              <img src="/assets/images/img7.jpg" alt="member-3" />
              <img src="/assets/images/img8.jpg" alt="member-4" />
              <img src="/assets/images/img9.jpg" alt="member-5" />
            </div>
          </div>
          <div class="task-box blue">
            <div class="description-task">
              <div class="time">08:00 - 09:00 PM</div>
              <div class="task-name">Release Event</div>
            </div>
            <div class="more-button"></div>
            <div class="members">
              <img src="/assets/images/img5.jpg" alt="member" />
              <img src="/assets/images/img6.jpg" alt="member-2" />
              <img src="/assets/images/img7.jpg" alt="member-3" />
              <img src="/assets/images/img8.jpg" alt="member-4" />
              <img src="/assets/images/img9.jpg" alt="member-5" />
            </div>
          </div>
          <div class="task-box yellow">
            <div class="description-task">
              <div class="time">11:00 - 12:00 PM</div>
              <div class="task-name">Practise</div>
            </div>
            <div class="more-button"></div>
            <div class="members">
              <img src="/assets/images/img1.jpg" alt="member" />
              <img src="/assets/images/img2.jpg" alt="member-2" />
              <img src="/assets/images/img3.jpg" alt="member-3" />
              <img src="/assets/images/img4.jpg" alt="member-4" />
            </div>
          </div>
        </div>
      </div> -->
     
    <!-- right bar ends -->
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){

      $("#alertmsg").delay(2000).fadeOut(200);

    });
  </script>

</body>

</html>