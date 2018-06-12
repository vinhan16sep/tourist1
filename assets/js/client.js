var csrf_hash = $("input[name='csrf_myielts_token']").val();
switch(window.location.origin){
    case 'http://myielts.vn':
        var HOSTNAME = 'http://tourist1.vn/';
        break;
    default:
        var HOSTNAME = 'http://localhost/tourist1/';
}
switch(window.location.origin){
    case 'http://tourist1.com':
        var HOSTNAMEADMIN = 'http://tourist1.com/admin';
        break;
    default:
        var HOSTNAMEADMIN = 'http://localhost/tourist1/admin';
} 
function checkLabelError(id='',content='',type='',parent='.col-xs-12'){
    if(type == 'noparent' && $('#'+id).val() == ''){
        console.log(1);
        return $('#'+id).after('<label id="'+id+'-error">'+content+'</label>');
    }
    if(type == 'img' && document.getElementById(id).files.length == 0){
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
function onKeyUpTinymce(id="", content="",parent=".col-xs-12"){
    tinymce.get(id).on('keyup',function(e){
        $("#"+id+"-error").remove();
        checkLabelError(id,content,"tinymce",parent);
        if($("label[id$=-error]").length > 0){
            return false;
        }
    });
}
$(document).ready(function(){
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
    $("#image_shared").change(function(event) {
        $("label[id=image_shared-error]").remove();
        checkLabelError("image_shared","Vui Lòng chọn hình ảnh.","img");
        
    });
    onKeyUpTinymce("content_vi","Nội dung không được trống.");
    onKeyUpTinymce("content_en","FULL Content field is required.");
    $('#nav-product li').click(function(){
        console.log(document.getElementById("image_shared").files.length);
        numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
        $("label[id$=-error]").remove();
        checkLabelError("parent_id_shared","Vui lòng chọn danh mục.","parent");
        checkLabelError("image_shared","Vui Lòng chọn hình ảnh.","img");
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
            if(idLabelError == "image_shared-error" || idLabelError == "parent_id_shared-error" || idLabelError.indexOf("description_") != "-1" || idLabelError.indexOf("title_") != "-1"){
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
    $($('#register-form')).submit(function(){
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
            }
        }else{
            alert("Bạn phải nhập số ngày và ít nhất là 1 ngày");
            return false;
        }
    });
    $(".append-date").click(function(){
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
                        external_plugins: {"filemanager": HOSTNAME + "filemanager/plugin.min.js"}
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
                    $(".no_border").prev().css("display","block");
                    $($(".title-content-date.showdate.vi .title-content-date.date.vi1")).attr("class","title-content-date date vi");
                    $($(".title-content-date.showdate.en .title-content-date.date.en1")).attr("class","title-content-date date en");
                    numberdates = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
                    for (var i = numberdate; i < numberdates; i++) {
                        $($(".title-content-date.showdate.vi .title-content-date.date.vi")[numberdate]).attr("class","title-content-date date vi1");
                        $($(".title-content-date.showdate.en .title-content-date.date.en")[numberdate]).attr("class","title-content-date date en1");
                    }
                }else{
                    $(".no_border").prev().css("display","block");
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
});