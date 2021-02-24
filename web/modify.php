 <?php
require_once('public/shared/conn_PDO.php');
//if( !isset($_SESSION) ){ session_start(); } 

//$user_id = $_SESSION['uesr_id'];
$user_id = 2;

try{
  $sql_str = "SELECT * FROM mem
              WHERE user_id = :user_id";

  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam(':user_id' , $user_id);
  $stmt -> execute();
  $mem_row = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>
   <link rel="stylesheet" href="public/css/modify.css">
   <script src="public/js/jquery-3.5.1.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#changepwd").hide();

      $("#changepwdbtn").click(function() {
        $("#changepwd").show();
      });


      $("#cancel").click(function() {
        $("#changepwd").hide();
      });

    });

  </script>
  
  
   
 
 
 
 
  <section>

    <div class="container">
      <div>
        <img class="title animate__animated animate__fadeIn animate__delay-0.5s" src="public/image/modify/modify.svg" alt="">
        <p>會員資料修改</p>
      </div>


      <div class="row">
        <div class="col-10 col-sm-6 col-md-4 mx-auto p-0">
          <form class="modifyform" method="post" action="javasceipt:;">
            <div class="form-group">
              <input id="user_name" type="text" class="form-control" name="user_name" placeholder="帳號" required="required" value="<?php echo $mem_row['user_name'];?>">
            </div>
            <div class="form-group input-group">
              <input  type="password" class="form-control" name="pwd" placeholder="密碼" required="required">
              <div class="input-group-append">
                <button class="btn form-control btn-dark btnheight" type="button" style="" id="changepwdbtn">變更會員密碼</button>
              </div>
            </div>
            <!--************變更會員密碼*************-->
            <div id="changepwd">
              <div class="form-group">
                <input type="password" class="form-control" name="oldpwd" placeholder="請輸入目前密碼" required="">
              </div>
              <div class="form-group">
                <input id="user_pwd" type="password" class="form-control" name="user_pwd" placeholder="請輸入新密碼" required="">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="verifynewpwd" placeholder="請再次輸入新密碼" required="">
              </div>
            </div>
            <!--**************************************-->


            <div class="form-group">
              <input id="user_real_name" type="text" class="form-control" name="user_real_name" placeholder="姓名" required="required" value="<?php echo $mem_row['user_real_name'];?>">
            </div>
            <div class="form-group">
              <input id="user_tel" type="tel" class="form-control" name="user_tel" placeholder="電話" required="required" value="<?php echo $mem_row['user_tel'];?>">
            </div>
            <div class="form-group">
              <input id="user_mail" type="email" class="form-control" name="user_mail" placeholder="Email" required="required" value="<?php echo $mem_row['user_mail'];?>">
            </div>

            <div class="form-group row-col-3 last">
<!--              <input type="submit" value="確認修改" class="btn btn-sm col-5 form-control" >-->
              <input id="user_id" type="hidden" name="user_id" value="<?php echo $user_id/*$_SESSION['uesr_id']*/;?>">
              <input id="MM_process" type="hidden" name="MM_process" value="update">
               <button type="button" class="btn btn-sm col-5 form-control up_btn" onclick="getTestData();">確認修改</button>
              <span class="col-1"></span>
              <input type="reset" value="取消" class="btn btn-sm col-5 form-control" id="cancel">
              

            </div>
          </form>

        </div>

      </div>
    </div>

  </section>

<script>

 var testData = {}
  function getTestData() {
    var testDataArr = {}
    testDataArr['user_id']        = $('#user_id').val();
    testDataArr['MM_process']     = $('#MM_process').val();
    
    testDataArr['user_pwd']  = $('#user_pwd').val();
    testDataArr['user_name']      = $('#user_name').val();     
    testDataArr['user_real_name']   = $('#user_real_name').val();     
    testDataArr['user_tel']         = $('#user_tel').val();              
    testDataArr['user_mail']     = $('#user_mail').val();        
           
    
    console.log( testDataArr['user_pwd']);

    testData = testDataArr
    console.log(testData);
    // return testData
  }
  
  function renderData(res) {
    $('#user_pwd').val(res['user_pwd']);
    $('#user_name').val(res['user_name']);
    $('#user_real_name').val(res['user_real_name']);
    
    $('#user_tel').val(res['user_tel']);
    $('#user_mail').val(res['user_mail']);
            

//*** /
    }
  
  $('.up_btn').click(function() {
    $.ajax({
      url: 'web/test_select.php',
      data: testData,
      type: 'post'
    }).done(function(res) {
      console.log(res);
      renderData(res)
      //...DO
    });
  });

</script>