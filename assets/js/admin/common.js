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
var numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
function removeDate(){
    numberdate = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
    $($(".title-content-date.date.vi .remove")).remove();
    $($(".title-content-date.date.en .remove")).remove();
    $($(".title-content-date.showdate.vi .title-content-date.date.vi")[numberdate-1]).attr("class","title-content-date date vi1");
    $($(".title-content-date.showdate.en .title-content-date.date.en")[numberdate-1]).attr("class","title-content-date date en1");
    $($(".title-content-date.showdate.vi .title-content-date.date.vi1")).fadeOut();
    $($(".title-content-date.showdate.en .title-content-date.date.en1")).fadeOut();
    if(numberdate>=3){
        $($(".title-content-date.date.vi .title_date")[numberdate-2]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
        $($(".title-content-date.date.en .title_date")[numberdate-2]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
    }
    $("#numberdate").val($("#numberdate").val()-1);


}
$(".append-date").click(function(evt){
    numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
    if($(this).attr("id") == 'button-numberdate' || $(this).attr("id") == 'append-date'){
        if($(this).attr("id") == 'append-date'){
            $("#numberdate").val(Number($("#numberdate").val())+1)
        }
    }else{
        return false;
    }
    var numberdate = Number($("#numberdate").val());
    if(numberdate == 'NaN' || numberdate == 0){
        alert("Bạn phải nhập số và lớn hơn 0");
        $("#numberdate").val(numberdates);
        return false;
    }
    var url = HOSTNAMEADMIN + '/product/ajax_form/'+numberdate+'/'+($(".title-content-date.showdate.vi .title-content-date.date.vi").length+$(".title-content-date.showdate.vi .title-content-date.date.vi1").length);
    $.ajax({
        method: "get",
        url: url,
        success: function(response){
            $("label[id^=title_]").remove();
            $(document).ready(function(){
                "use strict";
                tinymce.init({
                    selector: ".tinymce-area",
                    theme: "modern",
                    block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3',
                    height: 300,
                    relative_urls: false,
                    remove_script_host: false,
                    forced_root_block : false,
                    plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                    {title: "Bold text", inline: "b"},
                    {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
                    {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
                    {title: "Example 1", inline: "span", classes: "example1"},
                    {title: "Example 2", inline: "span", classes: "example2"},
                    {title: "Table styles"},
                    {title: "Table row 1", selector: "tr", classes: "tablerow1"}
                    ],
                    external_filemanager_path: HOSTNAME + "filemanager/",
                    filemanager_title: "Responsive Filemanager",
                    external_plugins: {"filemanager": HOSTNAME + "filemanager/plugin.min.js"},
                    onchange_callback: function(editor) {
                        tinyMCE.triggerSave();
                        $("#" + editor.id).valid();
                    }
                });
            });
            $($(".title-content-date.date.vi .remove")).remove();
            $($(".title-content-date.date.en .remove")).remove();
            $(".title-content-date.showdate.vi").append($(response.reponse.vi)[0].innerHTML);
            $(".title-content-date.showdate.en").append($(response.reponse.en)[0].innerHTML);
            numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
            numberdates1 = $(".title-content-date.showdate.vi .title-content-date.date.vi1").length;
            for (var i = 0; i <= numberdates1; i++) {
                $($(".title-content-date.showdate.vi .title-content-date.date.vi1")[i]).attr("class","title-content-date date vi");
                $($(".title-content-date.showdate.en .title-content-date.date.en1")[i]).attr("class","title-content-date date en");
            }
            if(numberdate<(numberdates+numberdates1)){
                $($(".title-content-date.showdate.vi .title-content-date.date.vi1")).attr("class","title-content-date date vi");
                $($(".title-content-date.showdate.en .title-content-date.date.en1")).attr("class","title-content-date date en");
                numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
                for (var i = numberdate; i < numberdates; i++) {
                    $($(".title-content-date.showdate.vi .title-content-date.date.vi")[numberdate]).attr("class","title-content-date date vi1");
                    $($(".title-content-date.showdate.en .title-content-date.date.en")[numberdate]).attr("class","title-content-date date en1");
                }
            }else{
                for (var i = 0; i < (numberdate-numberdates); i++) {
                    $($(".title-content-date.showdate.vi .title-content-date.date.vi1")[i]).css("display","block");
                    $($(".title-content-date.showdate.en .title-content-date.date.en1")[i]).css("display","block");
                    $($(".title-content-date.showdate.vi .title-content-date.date.vi1")[i]).attr("class","title-content-date date vi");
                    $($(".title-content-date.showdate.en .title-content-date.date.en1")[i]).attr("class","title-content-date date en");
                }
            }
            $($(".title-content-date.showdate.vi .title-content-date.date.vi")).css("display","block");
            $($(".title-content-date.showdate.en .title-content-date.date.en")).css("display","block");
            $($(".title-content-date.showdate.vi .title-content-date.date.vi1")).css("display","none");
            $($(".title-content-date.showdate.en .title-content-date.date.en1")).css("display","none");
            if(numberdate >1){
                $($(".title-content-date.date.vi .title_date")[numberdate-1]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
                $($(".title-content-date.date.en .title_date")[numberdate-1]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
            }
        },
        error: function(jqXHR, exception){
            console.log(errorHandle(jqXHR, exception));

        }
    });
});
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
}

var csrf_hash = $("input[name='csrf_myielts_token']").val();
var status = 0;
$(document).ready(function(){
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
    function checkLabelError(id,content,type='',parent=".col-xs-12"){
        if(type == 'noparent' && $('#'+id).val() == ''){
            console.log(1);
            return $('#'+id).after('<label id="'+id+'-error">'+content+'</label>');
        }
        if(type == '' && $('#'+id).val() == '' && parent != ''){
            return $('#'+id).parent(parent).append('<label id="'+id+'-error">'+content+'</label>');
        }
        if(type == 'parent' && $('#'+id).val() == 'Chọn danh mục' && parent != ''){
            return $('#'+id).parent(parent).append('<label id="'+id+'-error">'+content+'</label>');
        }
        if(type == 'tinymce' && tinymce.get(id).getContent() == '' && parent != ''){
            return $('#'+id).parent(parent).append('<label id="'+id+'-error">'+content+'</label>');
        }
    }
    function messageId(id){
        if(id.indexOf("title_") != "-1"){
            if(id.indexOf("_vi") != "-1"){
                return "Tiêu đề không được trống.";
            }else{
                return "FULL Title field is required.";
            }
        }
        if(id.indexOf("description_") != "-1"){
            if(id.indexOf("_vi") != "-1"){
                return "Mô tả không được trống.";
            }else{
                return "FULL Description field is required.";
            }
        }
        if(id.indexOf("content_") != "-1"){
            if(id.indexOf("_vi") != "-1"){
                return "Nội dung không được trống.";
            }else{
                return "FULL Content field is required.";
            }
        }
    }
    function onKeyUpTinymce(id, content){
        tinymce.get(id).on('keyup',function(e){
            $("#"+id+"-error").remove();
            checkLabelError(id,content,"tinymce");
            if($("label[id$=-error]").length > 0){
                return false;
            }
        });
    }
    $("#nav-product #submit-shared").css("display","none");
    $("#nav-product li#content-home").css("float","left");
    $("#nav-product li#add-date").css("float","right");
    $("[name^=title_],[name^=description_]").keyup(function(){
        $("#"+$(this)[0].id+"-error").remove();
        checkLabelError($(this)[0].id,messageId($(this)[0].id));
    });
    $("#parent_id_shared").mouseup(function(event) {
        $("label[id=parent_id_shared-error]").remove();
        checkLabelError("parent_id_shared","Vui lòng chọn danh mục.","parent");
        
    });
    onKeyUpTinymce("content_vi","Nội dung không được trống.");
    onKeyUpTinymce("content_en","FULL Content field is required.");
    $('#nav-product li').click(function(){
        numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
        $("label[id$=-error]").remove();
        checkLabelError("parent_id_shared","Vui lòng chọn danh mục.","parent");
        checkLabelError("content_vi","Nội dung không được trống.","tinymce");
        checkLabelError("content_en","FULL Content field is required.","tinymce");
        checkLabelError("title_vi","Tiêu đề không được trống.");
        checkLabelError("title_en","FULL Title field is required.");
        checkLabelError("description_vi","Mô tả không được trống.");
        checkLabelError("description_en","FULL Description field is required.");
        console.log($("label[id$=-error]").length);
        if($("label[id$=-error]").length > 0){
            if($("label[id$=-error]")[0].id.indexOf($("#home ul.language .active a").attr("aria-controls")) == "-1" && $("label[id$=-error]")[0].id != "parent_id_shared-error"){
                $("#home ul.language .active a").attr("aria-expanded","false");
                $("#"+$("#home ul.language .active a").attr("aria-controls")).removeClass('active');
                if($("#home ul.language .active a").attr("aria-controls") == "vi"){
                    $("#home ul.language .active").removeClass('active');
                    $("a[aria-controls=en]").parent().addClass("active");
                    $("#home ul.language .active a").attr("aria-expanded","true");
                    $("#en").addClass('active');
                }else if($("#home ul.language .active a").attr("aria-controls") == "en"){
                    $("#home ul.language .active").removeClass('active');
                    $("a[aria-controls=vi]").parent().addClass("active");
                    $("#home ul.language .active a").attr("aria-expanded","true");
                    $("#vi").addClass('active');
                }
            }
            var idLabelError = $("label[id$=-error]")[0].id;
            if(idLabelError == "parent_id_shared-error" || idLabelError.indexOf("description_") != "-1" || idLabelError.indexOf("title_") != "-1"){
                $("#"+idLabelError).prev().focus();
            }else{
                tinymce.get($("#"+idLabelError).prev()[0].id).focus();
            }
            return false;
        }else{
            $("#nav-product li").css("display","inline");
            if($(this)[0].id == "add-date"){
                $(this).css("display","none");
                $("#nav-product #submit-shared").css("display","inline");
            }else if($(this)[0].id == "content-home"){
                $("#nav-product #submit-shared").css("display","none");
                $("#nav-product #add-date").css("display","inline");
            }
            $("#nav-product li#content-home").css("float","left");
            $("#nav-product #submit-shared").css("float","right");
        }
    });
    $($('#register-form #submit-shared')).click(function(){
        numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
        if(numberdates>0){
            $("label[id$=-error]").remove();
            for (var t = 0; t < numberdates; t++) {
                checkLabelError("content_date_vi_"+t,"Nội dung không được trống.","tinymce",".title-content-date.date.vi");
                checkLabelError("content_date_en_"+t,"FULL Content field is required.","tinymce",".title-content-date.date.en");
                checkLabelError("title_date_vi_"+t,"Tiêu đề không được trống.","noparent");
                checkLabelError("title_date_en_"+t,"FULL Title field is required.","noparent");
            }
            console.log($("label[id$=-error]").length);
            console.log($("label[id$=-error]"));
            if($("label[id$=-error]").length > 0){
                var subStringLast = $("#add-date ul.language .active a").attr("aria-controls").substring(0, $("#add-date ul.language .active a").attr("aria-controls").length - 1);
                console.log(subStringLast);
                if($("label[id$=-error]")[0].id.indexOf(subStringLast) == "-1"){
                    $("#add-date ul.language .active a").attr("aria-expanded","false");
                    $("#"+$("#add-date ul.language .active a").attr("aria-controls")).removeClass('active');
                    if(subStringLast == "vi"){
                        $("#add-date ul.language .active").removeClass('active');
                        $("a[aria-controls=en1]").parent().addClass("active");
                        $("#add-date ul.language .active a").attr("aria-expanded","true");
                        $("#en1").addClass('active');
                    }else if(subStringLast == "en"){
                        $("#add-date ul.language .active").removeClass('active');
                        $("a[aria-controls=vi1]").parent().addClass("active");
                        $("#add-date ul.language .active a").attr("aria-expanded","true");
                        $("#vi1").addClass('active');
                    }
                }
                var collapseIn = $($("label[id$=-error]")[0]).parent().parent(".collapse")[0].id;
                console.log(collapseIn);
                $("#"+collapseIn).addClass('in');
                $("#"+collapseIn).attr("aria-expanded","true");
                $("#"+collapseIn).css("height","auto");
                $("#"+collapseIn).parent().prev().removeClass('collapsed');
                $("#"+collapseIn).parent().prev().attr("aria-expanded","true");
                var idLabelError = $("label[id$=-error]")[0].id;
                console.log($("#"+idLabelError).prev()[0].id);
                if(idLabelError.indexOf("title_date") != "-1"){
                    $("#"+idLabelError).prev().focus();
                }else{
                    tinymce.get($("#"+idLabelError).prev()[0].id).focus();
                }
                return false;
            }else{

            }
        }else{
            alert("Bạn phải nhập số ngày và ít nhất là 1 ngày");
            return false;
        }
    });
   
});


$('#register-form #submit-shared').click(function(){
    if(window.location.pathname.indexOf("/product/edit/") == '-1'){
        var url = HOSTNAME + 'admin/product/create';
    }else{
        var url = window.location.href;
    }
    var image_shared = new FormData();
    numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
    for (var i = 0; i < document.getElementById("image_shared").files.length; i++) {
        image_shared.append('image_shared[]',document.getElementById("image_shared").files[i]);
    }
    if(window.location.pathname.indexOf("/product/edit/") != '-1'){
        for (var k = 0; k < numberdates; k++) {
            image_shared.append('id_date_vi[]',$('#id_date_vi_'+k).val());
            image_shared.append('id_date_en[]',$('#id_date_en_'+k).val());
        }
    }
    for (var k = 0; k < numberdates; k++) {
        image_shared.append('title_date_vi[]',$('#title_date_vi_'+k).val());
        image_shared.append('title_date_en[]',$('#title_date_en_'+k).val());
        image_shared.append('content_date_vi[]',tinymce.get("content_date_vi_"+k).getContent());
        image_shared.append('content_date_en[]',tinymce.get("content_date_en_"+k).getContent());
    }
    image_shared.append('numberdate',$('#numberdate').val());
    image_shared.append('title_vi',$('#title_vi').val());
    image_shared.append('title_en',$('#title_en').val());
    image_shared.append('metakeywords_vi',$('#metakeywords_vi').val());
    image_shared.append('metakeywords_en',$('#metakeywords_en').val());
    image_shared.append('metadescription_vi',$('#metadescription_vi').val());
    image_shared.append('metadescription_en',$('#metadescription_en').val());
    image_shared.append('slug_shared',$('#slug_shared').val());
    image_shared.append('parent_id_shared',$('#parent_id_shared').val());
    image_shared.append('description_vi',$('#description_vi').val());
    image_shared.append('description_en',$('#description_en').val());
    image_shared.append('content_vi',tinymce.get("content_vi").getContent());
    image_shared.append('content_en',tinymce.get("content_en").getContent());
    image_shared.append('csrf_myielts_token',csrf_hash);
    $.ajax({
        method: "post",
        url: url,
        data: image_shared,
        contentType: false,
        processData: false,
        success: function(response){
            $("#encypted_ppbtn").css('display','none');
            console.log(response);
            if(response.status == 200){
                csrf_hash = response.reponse.csrf_hash;
                if (response.isExisted == true) {
                    alert(response.message);
                    window.location.href=HOSTNAMEADMIN+"/product";
                }
            }
        },
        error: function(jqXHR, exception){
            // console.log(errorHandle(jqXHR, exception));
        }
    });
});