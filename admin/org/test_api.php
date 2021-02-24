<?php
require_once('public/shared/conn_PDO.php');
if( !isset($_SESSION) ){session_start();}

if( isset($_POST['MM_process']) && $_POST['MM_process'] == 'updata' ) {

        //準備SQL語法>建立預處理器=========================

        $sql_str = "SELECT prod ( prod_id ) VALUES ( :prod_id )";
        $stmt = $conn -> prepare($sql_str);

        //接收資料===========================================
        $user_name = $_POST['user_name'];

        //綁定資料===========================================
        $stmt -> bindParam(':user_name' , $user_name );


        //執行==============================================
        $stmt -> execute();
        //$fetchData 是 $stmt 處理過的資料

        $resData = array(
          'user_name' => $fetchData['user_name'],
        );
        echo $resData;
}
?>