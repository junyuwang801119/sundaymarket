
//修/刪 彈窗內容
  
$('.process-btn').click(function(){
//  e.preventDefault();
    //載入需要的檔案
    var url = $(this).attr('href');
    console.log (url);
    $.get(url,function(data){
      //將彈窗內容格式載入.process-modal .modal-content裡
      $('.process-modal .procontent').html(data);
      //讓.process-modal出現
      $('.process-modal').show();
    });
//   return false;
    
  });

//  $('.process-modal').click(function(){
//    $(this).hide();
//  });

  $('.modal-content').click(function(e){
    e.stopPropagation();
  });



