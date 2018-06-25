$(document).ready(function(){
    $('.btn-remove').click(function(){
        var controller = $(this).data('controller');
        var id = $(this).data('id');
        var url = HOSTNAME + 'admin/' + controller + '/remove';

        if(confirm('Chắc chắn xóa?')){
            $.ajax({
                method: "post",
                url: url,
                data: {
                    id : id, csrf_myielts_token : csrf_hash
                },
                success: function(response){
                    if(response.status == 200){
                        csrf_hash = response.reponse.csrf_hash;
                        $('.remove_' + id).fadeOut();
                    }
                },
                error: function(jqXHR, exception){
                    console.log(errorHandle(jqXHR, exception));
                }
            });
        }
    });

    function formatNumber(nStr, decSeperate, groupSeperate) {
        nStr += '';
        x = nStr.split(decSeperate);
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
        }
        return x1 + x2;
    }

    $('#price_shared').on('input', function(e){        
        $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
    }).on('keypress',function(e){
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', function(e){    
        var cb = e.originalEvent.clipboardData || window.clipboardData;      
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('');
    }

});
var numberdates = $("#content-full-date .title-content-date.date").length;
function removeDate(){
    numberdate = $(".title-content-date.date").length;
    $($("#content-full-date .title-content-date.date")[numberdate-1]).parents(".no_border").prev().css("display","none");
    $($("#content-full-date .title-content-date.date")[numberdate-1]).removeClass('date').addClass('rm');;
    $($("#content-full-date .title-content-date.rm")).css("display","none");
    $(".title-content-date.showdate .btn-margin span.remove").remove();
    if(numberdate>=3){
        $($(".title-content-date.showdate .btn-margin")[numberdate-2]).append("<span class='col-xs-1 remove' style='float:right;padding:0px;' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
    }
    $("#numberdate").val($("#content-full-date .title-content-date.date").length);
    


}
var csrf_hash = $("input[name='csrf_myielts_token']").val();
function remove(controller, id){
    var url = HOSTNAMEADMIN + '/' + controller + '/remove';
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_myielts_token : csrf_hash
            },
            success: function(response){
                csrf_hash = response.reponse.csrf_hash;
                if(response.status == 200 && response.isExisted == true){
                    console.log(response);
                    console.log(response.message);
                    if(response.message != 'undefined'){
                        alert(response.message);
                    }
                    $('.remove_' + id).fadeOut();
                }
                if(response.status == 200 && response.isExisted == false){
                    alert('Danh mục này có chứa bài viết. Vui lòng xóa bài viết trước sau đó thực hiện lại thao tác');
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
                if(jqXHR.status == 404 && jqXHR.responseJSON.message != 'undefined'){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }
            }
        });
    }
}
function remove_image(controller, id, image, key){
    var url = HOSTNAMEADMIN + '/' + controller + '/remove_image';
    if(confirm('Chắc chắn xóa ảnh này?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_myielts_token : csrf_hash, image : image
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    $('.row_' + key).fadeOut();
                    $("input[name='csrf_myielts_token']").val(csrf_hash);
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
}function active(controller, id, question) {
    var url = HOSTNAMEADMIN + '/' + controller + '/active';
    if(confirm(question)){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_myielts_token : csrf_hash
            },
            success: function(response){
                csrf_hash = response.reponse.csrf_hash;
                if(response.status == 200){
                    switch(controller){
                        case 'post_category' :
                            alert('Bật danh mục thành công');
                            break;
                        case 'order' :
                            alert('Hủy đặt bàn thành công');
                            break;
                        case 'banner' :
                            alert('Bật banner thành công');
                            break;
                        case 'product' :
                            alert('Bật thực đơn thành công');
                            break;
                        case 'post' :
                            alert('Bật bài viết thành công');
                            break;
                        case 'product_category' :
                            alert('Bật danh mục thành công');
                            break;
                    }
                    location.reload();
                }
                console.log(response);
            },
            error: function(jqXHR, exception){
                if(jqXHR.status == 404 &&  jqXHR.responseJSON.message != 'undefined '){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }else{
                    console.log(errorHandle(jqXHR, exception));
                }
            }
        });
    }
}

function deactive(controller, id, question) {
    var url = HOSTNAMEADMIN + '/' + controller + '/deactive';
    if(confirm(question)){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_myielts_token : csrf_hash
            },
            success: function(response){
                csrf_hash = response.reponse.csrf_hash;
                if(response.status == 200){
                    switch(controller){
                        case 'post_category' :
                            alert('Tắt danh mục thành công');
                            break;
                        case 'order' :
                            alert('Hủy đặt bàn thành công');
                            break;
                        case 'banner' :
                            alert('Tắt banner thành công');
                            break;
                        case 'product' :
                            alert('Tắt thực đơn thành công');
                            break;
                        case 'post' :
                            alert('Tắt bài viết thành công');
                            break;
                        case 'product_category' :
                            alert('Tắt danh mục thành công');
                            break;
                    }
                    location.reload();
                }
            },
            error: function(jqXHR, exception){
                console.log(jqXHR);
            }
        });
    }
}
function errorHandle(jqXHR, exception){
    if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
        return ('The requested page not found.');
    }  else if (jqXHR.status == 401) {
        return ('Sorry!! You session has expired. Please login to continue access.');
    } else if (jqXHR.status == 500) {
        return ('Internal Server Error.');
    } else if (exception === 'parsererror') {
        return ('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        return ('Time out error.');
    } else if (exception === 'abort') {
        return ('Ajax request aborted.');
    }

    return ('Unknown error occurred. Please try again.');
}

    $('.select2').select2();
    $(document).off("change","[id^=paren-go-place_]").on("change","[id^=paren-go-place_]",function(){
        var stt = $($(this)[0])[0].dataset.idlocaltion;
        var url = HOSTNAMEADMIN + '/product/ajax_area_selected';
        $.ajax({
            method: "post",
            url: url,
            data: {
                area : $($(this)[0]).val(), csrf_myielts_token : csrf_hash
            },
            success: function(response){
                console.log(response)
                csrf_hash = response.reponse.csrf_hash;
                if(response.status == 200 && response.isExisted == true){
                    $("input[name='csrf_myielts_token']").val(csrf_hash);
                    $("#go-place_"+stt).html(response.reponse.content);
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
                location.reload();
            }
        }); 
    });
    
