<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>task manager</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Button trigger modal 
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>
        -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">افزودن پوشه</h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="addfolderinput" placeholder="نام پوشه را اینجا وارد کنید..">
          <span  id="addfolderresultmsg"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
          <button type="button" class="btn btn-success" id="addfolderbtn">افزودن</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">پوشه‌های من</h5>
        </div>
        <div class="modal-body">

        
          <ul class="action-list">
            <?php foreach ($folders as $folder) : ?>
              <li onclick="removeFol(this)" data-folder-id="<?= $folder->id ?>" class="item">
                <i class="fa-regular fa-folder feather"></i>
                <span> <?= $folder->name ?> </span>
                  <i style="position:absolute; left:20px; cursor:pointer" class="fa-solid fa-trash "></i>
              </li>
            <?php endforeach; ?>
          </ul>

        </div>
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
          <input type="text" class="form-control" id="tasknameinput" placeholder="نام فعالیت را اینجا وارد کنید.."></br>
          <div class="form-floating">
            <textarea class="form-control" placeholder="توضیحات" id="taskdescinput" style="height: 100px"></textarea>
            <label for="floatingTextarea2">توضیحات</label>
          </div></br> 
          <div class="row">
            <div class="col">
            <span>انتخاب فهرست:</span>
              <select class="form-select" id="selectfolderinput" aria-label="Default select example">
              <?php foreach ($folders as $folder) : ?>
                <option value="<?= $folder->id ?>"><?= $folder->name ?></option> 
                1
              <?php endforeach ?>

              </select>
            </div>
            <div class="col">
              <span>مهلت:</span>
              <input type="date" id="deadlineinput" class="form-control" >
            </div>  
          </div>   
          </br>
            <input class="form-check-input" class="float:right !important;" type="checkbox" value="" id="isimportantinput">&nbsp;
            <label class="form-check-label" class="float:right !important;" for="isimportantinput">
              علامت زدن به عنوان مهم
            </label>

            <span  id="addtaskresultmsg"></span>
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
          <button type="button" class="btn btn-success" id="addtaskbtn">افزودن</button>
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
        <?= getDayOrNight() ?> بخیر، امین
          
        </div>
      </div>

      <!-- left content starts -->
      <div class="left-content">
        <ul class="menu-list">
            <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("?today") ?>">
                <i class="fa-solid fa-calendar-day feather"></i>
                <span> امروز </span>
              </a>
            </li>
            <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("?important") ?>">
                <i class="fa-solid fa-star feather"></i>
                <span> مهم</span>
              </a>
            </li>
            <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("?active") ?>">
                <i class="fa-solid fa-bars-staggered feather"></i>
                <span> در جریان </span>
              </a>
            </li>
            <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("?done") ?>">
                <i class="fa-solid fa-circle-check feather"></i>
                <span> انجام شده</span>
              </a>
            </li>
            <li class="menu-item">
              <a style="text-decoration:none; color:black;" href="<?= goUrl("?canceled") ?>">
                <i class="fa-regular fa-calendar-minus feather"></i>
                <span> لغو شده </span>
              </a>
            </li>
        </ul>
        <ul class="folders-list">
          <p style="padding: 10px; font-size:15px; color:darkgray; margin-bottom:0;">فهرست های من</p>
          <?php foreach ($folders as $folder) : ?>
            <li class="item">
              <a style="text-decoration:none; color:black;" href="?folder_id=<?= $folder->id ?>">
                <i class="fa-solid fa-folder feather"></i>
                <span> <?= $folder->name ?> </span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

        <ul class="category-list">
          <li class="item2">
            <i class="fa-solid fa-plus"></i>
            <span data-bs-toggle="modal" data-bs-target="#exampleModal">افزودن پوشه</span>
          </li>
          <li class="item2">
            <i class="fa-solid fa-gear"></i>
            <span data-bs-toggle="modal" data-bs-target="#exampleModal2">مدیریت پوشه‌ها</span>
          </li>
        </ul>
      </div>
      <!-- left content ends -->
    </div>
    <!--  -->
    <!-- left bar ends -->
    <!-- page content starts -->
    <div class="page-content">
      <div class="header">فعالیت‌ها‌‌ی</div>

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
              <!-- <input class="task-item form-check-input" name="task" type="checkbox" id="item-1" checked disabled /> -->  
              <span class="label-text"> <?= $task->title ?> </span>
              <span class="tag waiting"><?php echo $task->deadline !== '0000-00-00 00:00:00' ?  substr($task->deadline,0,10) : 'بدون محدودیت زمانی'; ?></span>
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
              <!-- <input class="task-item form-check-input" name="task" type="checkbox" id="item-1" checked disabled /> -->  
              <i class="fa-solid fa-plus"></i>
              <span class="label-text"> افزودن فعالیت </span>
            </div>
    </div>
    <!--  -->
    <!-- page content ends -->

    <!-- right bar starts -->
    <!--
      <div class="right-bar">
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
      </div>
      -->
    <!-- right bar ends -->


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
              $('<li class="item"> <a style="text-decoration:none; color:black;" href="#"> <i class="fa-regular fa-folder feather"></i> <span> '+ input.val() +' </span> </a> </li>').appendTo('.action-list');
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
              $('#addtaskresultmsg').html('پوشه ایجاد شد!');
              $('#addtaskresultmsg').css('color','green');
             // $('<li class="item"> <a style="text-decoration:none; color:black;" href="#"> <i class="fa-regular fa-folder feather"></i> <span> '+ input.val() +' </span> </a> </li>').appendTo('.action-list');
            }
            else{
              $('#addtaskresultmsg').html(e);
              $('#addtaskresultmsg').css('color','red');
            }
          },
         
        });
      });
    });
  </script>

</body>

</html>