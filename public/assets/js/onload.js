$(document).ready(function(){

    $('#cate_id').on('change',function (e) {
       var category =  $(this).val();
       $.ajax({
         type:'GET',
         url:'http://localhost:8000/admin/category/child/'+category,
         success:function(response){
             $('#child_cate_div').html('');
             if(response.categories.length > 0) {
                 var html = '<label class="control-label col-md-3" for="child_cate_id">Child Category</label>';
                 html += '<div class="col-md-6">';
                 html += '<select class="form-control" name="child_cate_id" id="child_cate_id">';

                 for (var i = 0; i < response.categories.length; i++) {
                     // console.log(response.categories[i].id);
                     html += '<option value="' + response.categories[i].id + '"> ' + response.categories[i].cate_title + ' </option>';
                 }
                 html += '</select>';
                 html += '</div>';
                 $('#child_cate_div').append(html);
             }
         },
         error:function(){

         }
       });

    })
});