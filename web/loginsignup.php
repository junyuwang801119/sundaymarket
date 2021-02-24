<?php
//msg=1 => 表示登入帳密失敗
//msg=2 => 表示未登入進入會員中心而導引過來
//msg=3 => 非管理者不能進入管理介面

require_once('public/shared/conn_PDO.php');
if( !isset($_SESSION) ){session_start() ;}

if( isset($_GET['mailok']) && $_GET['mailok']==1 ){


  try{

    $sql_str = "UPDATE user SET user_grade >1
                WHERE mem_mail = :mem_mail AND mem_chkcode = :mem_chkcode";
    $stmt = $conn -> prepare($sql_str);

    //接收資料===========================================
    $mem_mail    = $_GET['mem_mail'];
    $mem_chkcode = $_GET['mem_chkcode'];

    //綁定資料===========================================
    $stmt -> bindParam( ':mem_mail'    , $mem_mail );
    $stmt -> bindParam( ':mem_chkcode' , $mem_chkcode );

    //執行==============================================
    $stmt -> execute();
    header('Location: ./');
  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }
}

?>  

<link rel="stylesheet" href="public/css/loginsignup.css">


<script src="public/js/check_mem_register.js"></script>
<script>
  $(document).ready(function() {
    $(".nav-tabs a").click(function() {
      $("this").addClass(".line");


    });

    $("#forgetpwd").hide();

    $("#forget").click(function() {
      $("#forgetpwd").show();
    });

    $("#cancelforget").click(function() {
      $("#forgetpwd").hide();
    });



  });

</script>






<section>
  <div class="container">
    <div class="row">
      <div class="col-10 col-sm-6 col-md-4 mx-auto p-0">

        <div class="login-register-form wow animate__animated animate__fadeIn animate__delay-0.5s animate__fast">
          <ul class="nav nav-tabs line justify-content-between" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" href="#login" id="login-tab" data-toggle="tab" role="tab" aria-controls="login" aria-selected="true">&nbsp;</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link  " href="#register" id="register-tab" data-toggle="tab" aria-controls="register" aria-selected="false">&nbsp;</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">

              <form class="loginform" method="post" action="web/login_check.php">
                <div class="form-group">
                  <input type="text" class="form-control" name="user_name" placeholder="帳號" required="required" value="">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="user_pwd" placeholder="密碼" required="required">
                </div>
                <div class="form-group">
                 <button class="btn form-control" onclick="gethome();">登入</button>
<!--                  <input type="submit" value="登入" class="btn form-control">-->
                  <div class="bottom line">
                    <a href="#forgetpwd" id="forget">忘記密碼?</a>
                    <a href="./admin/Login_index.php">管理員登入</a>
                  </div>


                </div>
              </form>
              <div class="card card-outline-secondary" id="forgetpwd">
                <div class="card-header">
                  <h3 class="mb-0 text-center text-dark">重設密碼</h3>
                </div>
                <div class="card-body">
                  <form class="form" role="form" autocomplete="off">
                    <div class="form-group">
                      <label for="inputResetPasswordEmail">Email</label>
                      <input type="email" class="form-control" id="inputResetPasswordEmail" required="">
                      <span id="helpResetPasswordEmail" class="form-text small text-muted text-right">
                        密碼重設指示會寄到此Email
                      </span>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn form-control">重設密碼</button>
                      <button class="btn form-control " id="cancelforget">取消</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">

              <form method="post" action="?page=mem_addmem_ok_2" class="registerform">

                <div class="form-group">
                  <input type="text" class="form-control" name="user_name" placeholder="帳號" required="required" value="">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="user_pwd" placeholder="密碼" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirm_pwd" placeholder="請再次輸入密碼" required="">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="user_real_name" placeholder="姓名" required="required" value="">
                </div>
                <div class="form-group">
                  <input type="tel" class="form-control" name="user_tel" placeholder="電話" required="required" value="">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="user_mail" placeholder="Email" required="required" value="">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="announce" required="required">
                    <label for="announce" class="custom-control-label confirm">按下註冊鈕的同時，表示您已詳閱我們的資料使用政策與使用條款，同意使用Sunday Market所提供的服務並訂閱電子報。</label>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" value="註冊" class="btn form-control">
                  <input type="hidden" name="MM_process" value="addmem">
                </div>
                
                
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>

function gethome(){
  window.location="index.php";
  
}
</script>


<?php
echo '<h2>';
if( isset($_GET['msg']) && $_GET['msg']==1 ){ echo '==== 輸入的帳號或密碼有誤，請重新登入！ ===='; }
if( isset($_GET['msg']) && $_GET['msg']==2 ){ echo '==== 請以會員身份登入後, 再進入會員中心！ ===='; }
if( isset($_GET['msg']) && $_GET['msg']==3 ){ echo '==== 請以管理者身份登入後, 才能進入後台管理中心！ ===='; }  
echo '</h2>';
?>
