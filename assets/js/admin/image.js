$(document).ready(function(){
    $('.close-classic').click(function(){
        var url = HOSTNAME + 'admin/about/remove_image';
        var key = $(this).data('key');
        var id = $(this).data('id');
        var image = $(this).data('image');
        if(confirm('Chắc chắn xóa?')){
            $.ajax({
                method: "get",
                url: url,
                data: {
                    id : id, image : image
                },
                success: function(response){
                    console.log(response);
                    if(response.status == 200 && response.message == ''){
                        $('.remove_' + key).fadeOut();
                    }
                    if(response.status == 200 && response.message != ''){
                        alert(response.message);
                    }
                },
                error: function(jqXHR, exception){
                    console.log(errorHandle(jqXHR, exception));
                }
            });
        }
    });

    $('.btn-active-img').click(function(){
        var url = HOSTNAME + 'admin/about/active_image';
        var id = $(this).data('id');
        var image = $(this).data('image');
        if(confirm('Chắc chắn chọn ảnh này làm Avatar?')){
             $.ajax({
                method: "get",
                url: url,
                data: {
                    id : id, image : image
                },
                success: function(response){
                    if(response.status == 200){
                        location.reload();
                    }
                },
                error: function(jqXHR, exception){
                    console.log(errorHandle(jqXHR, exception));
                }
            });
        }
    });
});