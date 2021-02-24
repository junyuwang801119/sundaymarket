<!DOCTYPE html>
<html lang="zh-Hant-TW">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>圖片上傳測試</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="../public/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1 class="page-header">圖片上傳</h1>

      <div class="row">
        <div class="col-md-3">
          <img src="../public/img_news/news_photo1.jpeg" alt="img-thunbnail">
        </div>

        <div class="col-md-3">
          <img src="../public/img_news/news_photo1.jpeg" alt="img-thunbnail">
        </div>
        <div class="col-md-3">
          <img src="../public/img_news/news_photo1.jpeg" alt="img-thunbnail">
        </div>
      </div>
      <hr>
      <button class="btn btn-danger pull-right imgadd">添加圖片</button>
    </div>
   
     <!-- Modal -->
    <div class="modal fade upmodal" >
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >圖片上傳</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span >&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <form action="">
             <div class="form-group">
               <input type="file" name="img">
             </div>
           </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
            <button type="button" class="btn btn-primary">上傳</button>
          </div>
        </div>
      </div>
    </div> 
  </body>
</html>

<script>
$(function(){
  $('.imgadd').click(function(){
    $('.upmodal').modal('show');
  });
});


</script>



















