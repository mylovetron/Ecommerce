$("div.alert").delay(3000).slideUp();

$(document).ready(function(){
	$("#addImages").click(function(){
		$("#insert").append('<div class="form-group"><div class="col-sm-9"><input type="file" id="form-field-1" name="fImages" class="col-xs-10 col-sm-5" /></div></div>');
	});
});

$(document).ready(function(){
	$("a#del_img_demo").on('click',function(){
		var url="http://ecommerce.test/admin/product/delimg/";
		var _token=$("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh=$(this).parent().find("img").attr("idHinh");
		var img=$(this).parent().find("img").attr("src");
		var rid=$(this).parent().find("img").attr("id");
		$.ajax({
			url:url+idHinh,
			type:'GET',
			cache:false,
			data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
			success:function(data){
				if(data=="oke"){
					$("#"+rid).remove();
				}else{
					alert("Error! Please contact admin");
				}
			}
		})
	})
});