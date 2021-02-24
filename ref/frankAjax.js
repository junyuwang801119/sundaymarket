 //建構原生ajax框架:
    //參數仿jq方式 -->json
    //      json字段中需: type請求類型  url請求地址  data請求參數  success請求回調   
    function frankAjax(paramsObj){
      if( paramsObj.type.toLocaleLowerCase() == 'get' ){
        console.log('get請求');
      }else if( paramsObj.type.toLocaleLowerCase() == 'post' ){
        console.log('post請求');
      }else{
        console.log('請求類型錯誤');
      }
      
      
      
      
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

    frankAjax({
      type:'post',
      url:'upload.php',
      data{
          username:'test-frank',
          password:'t123456'
      },
        success:function( res ){
          console.log(res);
    }
    });