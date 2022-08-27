<?php include 'bootstrap/init.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <style>
        body{
            font-size: 20px;
            direction: rtl;
            padding: 50px;
            background-color: #fcc;
            font-family: iransans;
        }
        .item{
            text-align: center;
        }
    </style>
    <title>test</title>
</head>
<body>
   <?php $folders = getFolders();
    // $str = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789');
    // $str = substr($str,0,4);
     
    // echo $str.'<br>';              
   
   ?>
   
    <button id="btn">add</button>

        <ul class="action-list">
            <?php foreach ($folders as $folder) : ?>
              <li onclick="removeFol(this)" data-folder-id="<?= $folder->id ?>" class="item">
                <i class="fa-regular fa-folder feather"></i>
                <span><?= $folder->name ?></span>
                  <i  style=" margin-right:50px" class="fa-solid fa-trash "></i>
              </li>
            <?php endforeach; ?>
        </ul>



           



                
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
        $(document).ready(function(){
            
            // $('.item').click(function(){
            //     var task = $('.item');
            //     alert( task.dataset.id);
            //     $()
            //     // var folderid = $
            //     // $.ajax({
            //     //     url : 'process/ajax-handler.php',
            //     //     method : 'POST',
            //     //     data : {action: 'deletewithpost', folderid = }
            //     // });
            // });

        });
    </script>
</body>
</html>