$(document).ready(function(){
    $("#btn_sub").click(function(){
        if ($("#txb_stock").val()==""){
            alert ("请填写股票代码或名称！" + $("#txb_stock").val() );
        }else
        {
            $("#form1").submit();
            //$(".text").show();
        }

    });
});


$(function(){
    $(".enter .telnum").focus(function(){
        if($(this).val() == "请输入接收信息手机号码"){
            $(this).val("");
        };
    });
    $(".enter .telnum").blur(function(){
        if($(this).val() == null || $(this).val() == ""){
            $(this).val("请输入接收信息手机号码");
        }
    });
    $(".btn").click(function(){
        var tel = $(".enter .telnum").val();
        var reg = /^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[012356789]{1}[0-9]{8}$/;
        if (reg.test(tel)) {
            //alert("由于本次活动申请人员较多，客服人员将尽快给您回复确认，请注意接听0731-88893893的来电。");
        }else{
            alert("您的号码有误哦~");
        };
    });






})
