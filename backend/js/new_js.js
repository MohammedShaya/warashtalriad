   
function edit_point(point){
  console.log(point)
   $('.detailes_row').each(function () {
    if ($('.detailes_row').length>1) {
        $(this).remove();
    }
  });
   $.each(point,function (key,value) {
     if(key==0){
      $('textarea[name="details[]"]').val(value.point);
      $('textarea[name="details[]"]').text(value.point);
      $('input[name="order_detailes[]"]').val(value.order_);
     }else{
      let row=$('.detailes_row:last').clone(false).get(0);
       $(row).find('input').val(value.order_);
        $(row).find('textarea').val(value.point);
        $(row).find('textarea').text(value.point);
       $('.detailes_tbody').append(row);
     }
   })

}

$(document).ready(function(){
  // add answer
   
  $(document).on('click','#edit_basic_info',function () {
        
       $('#div_show').toggleClass('col-md-8');
       $('#div_edit').toggleClass('col-md-4');
       $('#div_edit').toggleClass('hidden');
  });

   $(document).on('click','.detailes_row_add',function () {
        let row=$('.detailes_row:last').clone(false).get(0);
        $(row).find('input').val('');
        $(row).find('textarea').val('');
        $(row).find('textarea').text('');
       $('.detailes_tbody').append(row);
  });


$(document).on('click','.add_likes',function(){
 
  let apiToken = "1331838866:AAGzkUH7szxYN0nAIQVSGx0GJpsmvxrRB4w";

let data = {
    'chat_id' : '@t.me/programmer_chanel',
    'text' : 'Hello world!'
};

$.ajax({
  url:`https://api.telegram.org/bot1331838866:AAGzkUH7szxYN0nAIQVSGx0GJpsmvxrRB4w/sendMessage`,
  method:"get",
  dataType:"html",
  data:{data },
  success:function(data){},
  error:function(data){},
});
  if($(this).hasClass('like')){
    $(this).html(`<i
    class="fa fa-thumbs-o-up" aria-hidden="true"></i> ${parseInt($(this).text())-1}`);
    $(this).removeClass('like');
    $(this).css('color','inherit;');
  }
  else{
    $(this).css('color','#ed3974;');
    $(this).addClass('like');
    $(this).html(`<i
    class="fa fa-thumbs-o-up" aria-hidden="true"></i> ${parseInt($(this).text())+1}`);
    $.ajax({
      url:baseurl+'Products/add_likes',
      method:"get",
      dataType:"json",
      data:{'id':$(this).data('id'), },
      success:function(data){},
      error:function(data){},
  });
  }
  
});







    // edit record
    $(document).on('click','.edit_record',function () {
        
             
             $('input[type="checkbox"]').prop('checked',false);
        $.ajax({
           url:baseurl+$(this).data('url'),
           method:"get",
           dataType:"json",
           data:{
            'id':$(this).data('id'), },
       
           success:function(data){

             $.each(data,function(i,value){
                $(`input[type="checkbox"][name="${i}"]`).prop('checked',value);
                $(`input[type="radio"][name="${i}"][value="${value}"`).prop('checked',true);
                $('textarea[name="'+i+'"]').text(value);  
                $('input[name="'+i+'"]').val(value);
                $(`input[type="checkbox"][name="${i}"]`).removeAttr('value');
                $('select[name="'+i+'"]').children('option[value="'+value+'"]').prop('selected',true);
               
                if(typeof(value) == 'object' && value != null ){
                edit_point(value);
                }
            });
                 $('#submit_form').text('تعديل');
        },
        error:function (status,hrf,error) {
            errorMsg(error);

        }

 });

});
 // delete record
    $(document).on('click','.delete_record',function () {
        if (confirm('هل تريد حذف هذا التصميم؟' )) {


        $.ajax({
           url:baseurl+$(this).data('url'),
           method:"get",
           dataType:"json",
           data:{
            'id':$(this).data('id'),
        },
       
        success:function(data){
       if (data.status=='success'){
            successMsg(data.message);
            $(id_form)[0].reset();
              table.ajax.reload();
            $('textarea').text('');  
             $('.div_answer').children().remove();
        if (page_url=='question/question_all') {
        get_data(page_url+'/'+$('#lession_input').val());
        $(id_submit_button).button('reset');
        $('#lissions_id_input').val($('#lession_input').val());
        $('.upload-image-preview').children().remove();

       }
       else{
       get_data(page_url);
       $(id_submit_button).button('reset');
       }
           
        }
        else{
            errorMsg(data.message);
        }
           
        },
          error:function (status,hrf,error) {
            errorMsg(error);

        }

 });
    }

});




$(document).on('submit',id_form, function(event){
        event.preventDefault();
        $(id_submit_button).button('loading');
         $('span[class="text-danger"]').text('');
      $.ajax({
           url:$(this).attr('action'),
           method:"POST",
           data:new FormData(this),
           contentType:false,
           cache:false,
           processData:false,
           datatype:'json',
      success:function(response){
        let res=JSON.parse(response);
        if(res.status=='fail'){
         $.each(res.message,function(i,value){
            $('#error_span_'+i).html(value);
        
            });
         
        }
       else if (res.status=='fail1'){
            errorMsg(res.message);
        }
        else{
            successMsg(res.message);
            $('#message').text(res.message);
            $('#message').addClass('alert alert-success');
            $('#message').removeClass('hidden');
             $(id_form)[0].reset();
             $('textarea').text(''); 
             if(table!=0){
               table.ajax.reload();
             } 
             setTimeout(() => {
              $('#message').text('');
              $('#message').removeClass('alert alert-success');
              $('#message').addClass('hidden');
             }, 3000);
        }
        if(res.url){
          window.location.reload();
        }
       },
  });

$(id_submit_button).button('reset');
 $('#submit_form').text('اضافة');
 });




     });