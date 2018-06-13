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
$("#nav-product #submit-shared").css("display","none");
$("#nav-product li#content-home").css("float","left");
$("#nav-product li#add-date").css("float","right");
$("#nav-product li").click(function(){ 
	$.validator.setDefaults({
		ignore: ":hidden:not('input')"
	});
	$('#register-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.col-xs-12').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.col-xs-12').removeClass("has-error");
		},
		rules: {
			title_vi: {
				required: true
			},
			title_en: {
				required: true
			},
			parent_id_shared: {
				required: true
			}
		}, 
		messages: {
			title_vi: {
				required: "Tiêu đề không được trống."
			},
			title_en: {
				required: "Title field is required."
			},
			parent_id_shared: {
				required: "Vui lòng chọn danh mục cha."
			}
		},

	});
	if ($('#register-form').valid() === false){
		if($(".col-xs-12.has-error input").length >0 && $(".col-xs-12.has-error input")[0].id.indexOf($("#home ul.language .active a").attr("aria-controls")) == "-1"){
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
		if($("select[name=parent_id_shared]").parent().attr("class") == "col-xs-12 has-error"){
			$("select[name=parent_id_shared]")[0].focus();
		}else{
			$(".col-xs-12.has-error input")[0].focus();
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
$("#register-form").submit(function(event) {
	$.validator.addMethod("number", function(value, element) {
		return this.optional(element) || (value>0);
	}, "Bạn phải nhập số và lớn hơn 0.");
	$.validator.setDefaults({
		ignore: ":hidden:not('input')"
	});
	$('#register-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.col-xs-12').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.col-xs-12').removeClass("has-error");
		}
	});
	$('[name^=title_date_]').each(function(e) {
		if($(this)[0].name.indexOf("vi") != "-1"){
			messages = "Tiêu đề không được trống.";
		}else{
			messages = "Title field is required.";
		}
		$("[name="+$(this)[0].name+"]").rules('add', {
			required: true,
			messages: {
				required:messages
			}
		})
	});
	$("[name=number]").rules('add', {
		required: true,
		number: true
	})
	if ($('#register-form').valid() === false){
		subStringLast = $("#add-date ul.language .active a").attr("aria-controls").substring(0, $("#add-date ul.language .active a").attr("aria-controls").length - 1);

		if($(".col-xs-12.has-error input")[0].id.indexOf(subStringLast) == "-1"){
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
		$(".col-xs-12.has-error input")[0].focus();
		return false;
	}else{
		if($(".title-content-date.showdate.vi .title-content-date.date.vi").length<=0){
			alert("Vui lòng tạo ra một ngày của tour");
			return false;
		}
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
				image_shared.append('id_date_'+k+'_vi',$('#id_date_vi_'+k).val());
				image_shared.append('id__date_'+k+'_en',$('#id_date_en_'+k).val());
			}
		}
		for (var k = 0; k < numberdates; k++) {
			image_shared.append('title_date_'+k+'_vi',$('#title_date_vi_'+k).val());
			image_shared.append('title_date_'+k+'_en',$('#title_date_en_'+k).val());
			image_shared.append('content_date_'+k+'_vi',tinymce.get("content_date_vi_"+k).getContent());
			image_shared.append('content_date_'+k+'_en',tinymce.get("content_date_en_"+k).getContent());
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