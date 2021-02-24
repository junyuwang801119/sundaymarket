<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
  <script>
    
    //建構原生ajax框架:
    //參數仿jq方式 -->json
    //      json字段中需: type請求類型  url請求地址  data請求參數  success請求回調   
    function frankAjax(paramsObj){
      //(1)先處理 paramsObj 參數,將此json格式轉成必要格式 
      // a.get請求,將參數拼接到url後   {....} -> [.....] -> join() -> url+join()
      // b.post請求,建構formData參數對象  formData.append(... , ...);
      
      //(2)準備xhr對象,實現onreadystatechange,準備發送請求
      //   xhr.onreadystatechange = function(){....};
      
      //(3)準備open()
      //   xhr.open(... , ... , true);
      
      //(4)準備send()
      //   if(paramsObj.ytpe == 'get'){ xhr.send(null);}
      //    else if( paramsObj.type == 'post'){ xhr.send( formData ); }
      
      
      
      
      
    }
  
  </script>
  
  
  
  
  
  
</body>
</html>