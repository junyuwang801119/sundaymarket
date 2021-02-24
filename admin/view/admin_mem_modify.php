<?php
require_once('../../public/shared/conn_PDO.php');

$user_id = $_GET['user_id'];
try{
  $sql_str = "SELECT * FROM mem
              WHERE user_id = :user_id";
  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam(':user_id', $user_id);

  $RS_mems = $stmt -> execute();
  //  $row = $stmt ->rowCount();
  $row_RS_mem_1 = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>

<form style="width:100%;" method="post" enctype="multipart/form-data" action="view/admin_mem_process.php">
  <div class="modal-header">
    <h5 class="modal-title" id="admin_member_modifyTitle">修改會員資料</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 ">

          <div class="form-group row m-4">
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">帳號等級:</label>
            <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="管理員" value='<?php echo $row_RS_mem_1['user_grade'];?>'>
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員帳號:</label>
            <input type="text" class="form-control col-9  mt-2" id="formGroupExampleInput" placeholder="mark111@gmail.com" value='<?php echo $row_RS_mem_1['user_mail'];?>'>
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">修改密碼:</label>
            <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="******">
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">確認密碼:</label>
            <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="******">
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員名稱:</label>
            <input type="text" class="form-control col-9  mt-2" id="formGroupExampleInput" placeholder="Mark" value='<?php echo $row_RS_mem_1['user_real_name'];?>'>
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員性別:</label>
            <div class="col-9 pt-2 mt-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0">
                <label class="form-check-label" for="inlineRadio1" <?php if( $row_RS_mem_1['user_sex']==0 ){ echo ' checked'; } ?>
                  >男</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
                <label class="form-check-label" for="inlineRadio2" <?php if( $row_RS_mem_1['user_sex']==1 ){ echo ' checked'; } ?>
                  >女</label>
              </div>
            </div>
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員電話:</label>
            <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="0938138138" value='<?php echo $row_RS_mem_1['user_tel'];?>'><?php echo $row_RS_mem_1['user_tel'];?>
            <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員地址:</label>
            <input type="text" class="form-control col-9 mt-2 " id="formGroupExampleInput" placeholder="天堂市天堂路地獄巷十八層" value='<?php echo $row_RS_mem_1['user_address'];?>'>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-center">
    <button type="button" class="btn btn-danger" >清除資料</button>
    <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>

    <input type="submit" class="btn btn-info" value="確認修改">
    <input type="hidden" name="user_id" value="<?php echo $row_RS_mem_1['user_id']; ?>">
    <input type="hidden" name="MM_process" value="update">
  </div>
</form>    