<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>حساب کاربری - <?= getUserData($_SESSION['loginuser'])->name ?></title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
  <link type="text/css" rel="stylesheet" href="assets/css/jalalidatepicker.min.css" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/jalalidatepicker.min.js"></script>

  <!-- Button trigger modal 
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>
        -->

  <!-- Modal -->
  <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">افزودن فهرست</h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="addfolderinput" placeholder="نام فهرست را اینجا وارد کنید..">
          <span  id="addfolderresultmsg"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
          <button type="button" class="btn btn-success" id="addfolderbtn">افزودن</button>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="padding: 0px 20px;">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">افزودن فهرست</h5>
        </div>
        <div class="modal-body row">
          
            <input type="text" class="form-control col" id="addfolderinput" autocomplete="off"  placeholder="نام فهرست. مثال: شخصی">
            <button type="button" class="btn btn-success col-3" id="addfolderbtn">ایجاد</button>
            <span  id="addfolderresultmsg"></span>

          </div>
        <!--  -->
        
          <h6 class="modal-title" style="padding: 20px;" id="exampleModalLabel">فهرست‌های من</h6>
          <ul id="action-list">
            <?php foreach ($folders as $folder) : ?>
              <li onclick="removeFol(this)" data-folder-id="<?= $folder->id ?>" class="item">
                <i class="fa-regular fa-folder feather"></i>
                <span><?= $folder->name ?></span>
                  <i style="position:absolute; left:20px; cursor:pointer;" class="fa-solid fa-trash "></i>
              </li>
            <?php endforeach; ?>
          </ul>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ایجاد فعالیت جدید</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-9"><input type="text" class="form-control mb-3" id="tasknameinput" autocomplete="off" placeholder="نام فعالیت. مثال: پیاده روی"></div>
            <div class="col">
            <input class="form-check-input mb-3" style="float:right !important;" type="checkbox" value="" id="isimportantinput">
            <label class="form-check-label" style="float:right !important;" for="isimportantinput">
              &nbsp;ستاره دار
            </label>
            </div>
          </div>
          <div class="form-floating">
            <textarea class="form-control" id="taskdescinput" style="height: 80px; text-align:right; "></textarea>
            <label for="floatingTextarea2" >توضیح بیشتر...</label>
          </div>
          <div class="row mb-3" style="margin-top: 17px;">
            <div class="col">
            <!-- <label for="selectfolderinput">انتخاب فهرست:</label> -->
              <select class="form-select " id="selectfolderinput" autocomplete="off">
                <option value="0">بدون فهرست</option>
              <?php foreach ($folders as $folder) : ?>
                <option value="<?= $folder->id ?>" ><?= $folder->name ?></option> 
                1
              <?php endforeach ?>
              </select>
            </div>
            <div class="col">
              <!-- <label for="deadlineinput">مهلت:</label> -->
              <input  id="deadlineinput" placeholder="مهلت" class="form-control" data-jdp >
            </div>  
          </div>   
            <span  id="addtaskresultmsg"></span>
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-success col-4" id="addtaskbtn">ایجاد</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        </div>
      </div>
    </div>
  </div>

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
      <div class="left-content">
        <ul class="menu-list">
            <li class="menu-item ">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("index.php") ?>">
                <i class="fa-solid fa-calendar-day feather"></i>
                <span> همه </span>
              </a>
            </li>
            <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("important.php") ?>">
                <i class="fa-solid fa-star feather"></i>
                <span> مهم</span>
              </a>
            </li>
            <!-- <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("?active") ?>">
                <i class="fa-solid fa-bars-staggered feather"></i>
                <span> در جریان </span>
              </a>
            </li> -->
            <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("done.php") ?>">
                <i class="fa-solid fa-circle-check feather"></i>
                <span> انجام شده</span>
              </a>
            </li>
         <!--   <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("?canceled") ?>">
                <i class="fa-regular fa-calendar-minus feather"></i>
                <span> لغو شده </span>
              </a>
            </li> -->
        </ul>
        <ul class="folders-list">
          <p style="padding: 10px; font-size:15px; color:darkgray; margin-bottom:0;">فهرست های من</p>
          <?php foreach ($folders as $folder) : ?>
            <li class="item">
              <a style="text-decoration:none; color:black;" href="folder.php?fid=<?= $folder->id ?>">
                <i class="fa-solid fa-folder feather"></i>
                <span> <?= $folder->name ?> </span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

        <!-- <ul class="category-list">
          <li class="item2">
            <i class="fa-solid fa-plus"></i>
            <span data-bs-toggle="modal" data-bs-target="#exampleModal">افزودن فهرست</span>
          </li>
          <li class="item2">
            <i class="fa-solid fa-gear"></i>
            <span data-bs-toggle="modal" data-bs-target="#exampleModal2">مدیریت فهرست‌ها</span>
          </li>
        </ul> -->
        
        <div class="addfolder" data-bs-toggle="modal" data-bs-target="#exampleModal2">
          <!-- <input class="form-check-input" name="task" type="checkbox" id="item-1" checked disabled /> -->  
          <i class="fa-solid fa-folder-plus"></i>
          <span class="label-text">مدیریت فهرست‌ها</span>
        </div>

      </div>
      
      <!-- left content ends -->
    </div>
    <!--  -->
    <!-- left bar ends -->
    <!-- page content starts -->
    <div class="page-content">
      <div class="header"><i class="fa-solid fa-bars"></i> فعالیت های <?php print_r($pagetitle) ?></div>

      <!-- contnet categories starts

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
      </div>
        
        contemt categories ends -->

      <!-- tasks wrapper starts -->
      <div class="tasks-wrapper">
        <?php if(!empty($tasks)) : ?>
          <?php foreach ($tasks as $task) : ?>
            <div class="task">
              <?php if($task->isimportant): ?><i style="font-size: 45px; position:absolute; right:0; margin-top:-12px; opacity:15%; color:#89202a " class="fa-solid fa-star"></i><?php endif; ?>
              <span class="label-text"> <?= $task->title ?> </span>
              <span style="font-size: 12px; color: #154c79; margin-right:20px"> <?= $task->description ?> </span>
              <input class="form-check-input" style="float: left; margin-right:10px; cursor: pointer;" name="task" title="کامل کردن" type="checkbox" id="item-1" onclick="toggletask(this)" data-task-id="<?= $task->id ?>" <?php if($task->isdone):?>checked<?php endif; ?>/>   
              <?php if(!empty($task->deadline)):?><div style="background-color:#89202a; padding:0px 5px; border-radius:11px; float: left;  margin-left:20px;"><span style="font-size: 12px; color: white;  "><?= $task->deadline ?></span></div><?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="notaskwrapper">
              <div class="notaskhere" ></div>
              <p class="notaskp"> خالیه! </p>
            </div>
        <?php endif; ?>
      </div>
      <!-- tasks wrapper ends -->
      <div class="addtaskbox" data-bs-toggle="modal" data-bs-target="#exampleModal3">
          <!-- <input class="form-check-input" name="task" type="checkbox" id="item-1" checked disabled /> -->  
          <i class="fa-solid fa-plus"></i>
          <span class="label-text"> افزودن فعالیت </span>
      </div>
    </div>
    <!--  -->
    <!-- page content ends -->
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    function removeFol(element)
            {
                var fid = element.dataset.folderId;
                $.ajax({
                    url : 'process/ajax-handler.php',
                    method : 'POST',
                    data : {action: 'deletewithpost', folderid : fid},
                    success : function(e){
                        location.reload();
                    }
                });
            }
    
            function toggletask(element)
            {
                var tid = element.dataset.taskId;
                $.ajax({
                    url : 'process/ajax-handler.php',
                    method : 'POST',
                    data : {action: 'toggletask', taskid : tid},
                    success : function(e){
                        //location.reload();
                        $(element).parent('.task').fadeOut(500);
                    }
                });
            }

    $(document).ready(function() {
      
      $('#addfolderbtn').click(function() {
        var input = $('#addfolderinput');
        $.ajax({
          url: "process/ajax-handler.php",
          method: "POST",
          data: {
            action: "addfolder",
            foldername: input.val()
          },
          success: function(e) {
            if(e == 1){
              $('#addfolderresultmsg').html('پوشه ایجاد شد!');
              $('#addfolderresultmsg').css('color','green');
              //$('<li class="item"> <a style="text-decoration:none; color:black;" href="#"> <i class="fa-regular fa-folder feather"></i> <span> '+ input.val() +' </span> </a> </li>').appendTo('.action-list');
              //$('<li>hi</li>').appendTo("#action-list");
              //$("#action-list").append('<li>123</li>');
              
              setTimeout(function(){ location.reload(); }, 1000);
            }
            else{
              $('#addfolderresultmsg').html(e);
              $('#addfolderresultmsg').css('color','red');
            }
          },
         
        });
      });



      $('#addtaskbtn').click(function() {
        var name = $('#tasknameinput');
        var desc = $('#taskdescinput');
        var folder = $('#selectfolderinput');
        var deadline = $('#deadlineinput');
        var isimportant = 0;
        if ($('#isimportantinput').is(":checked"))
        {
          var isimportant = 1;
        }

        $.ajax({
          url: "process/ajax-handler.php",
          method: "POST",
          data: {
            action: "addtask",
            taskname: name.val(),
            taskdesc: desc.val(),
            taskfolder: folder.val(),
            taskdeadline: deadline.val(),
            isimportant: isimportant
          },
          success: function(e) {
            if(e == 1){
              $('#addtaskresultmsg').html('فعالیت ایجاد شد!');
              $('#addtaskresultmsg').css('color','green');
             // $('<li class="item"> <a style="text-decoration:none; color:black;" href="#"> <i class="fa-regular fa-folder feather"></i> <span> '+ input.val() +' </span> </a> </li>').appendTo('.action-list');
             setTimeout(function(){ location.reload(); }, 1000);
            }
            else{
              $('#addtaskresultmsg').html(e);
              $('#addtaskresultmsg').css('color','red');
            }
          },
         
        });
      });
    });
    jalaliDatepicker.startWatch({zIndex	:1100});

  </script>

</body>

</html>