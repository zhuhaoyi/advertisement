$(document).ready(function(){
  $("#btn_sub").click(function(){
if ($("#txb_stock").val()==""){
     alert ("����д��Ʊ��������ƣ�" + $("#txb_stock").val() );
}else
{
    $("#form1").submit();
	//$(".text").show();
}

  });
});


$(function(){
  $(".enter .telnum").focus(function(){
	if($(this).val() == "�����������Ϣ�ֻ�����"){
      $(this).val("");
	};    
  });
  $(".enter .telnum").blur(function(){
	if($(this).val() == null || $(this).val() == ""){
	  $(this).val("�����������Ϣ�ֻ�����");
	}
  });
  $(".btn").click(function(){
    var tel = $(".enter .telnum").val(); 
	var reg = /^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$/; 
	if (reg.test(tel)) { 
	  //alert("���ڱ��λ������Ա�϶࣬�ͷ���Ա����������ظ�ȷ�ϣ���ע�����0731-88893893�����硣"); 
	}else{ 
	  alert("���ĺ�������Ŷ~"); 
	}; 
  });
  
  
  
  
  
  
})
