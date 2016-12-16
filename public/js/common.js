$.ajaxSetup ({
    cache: false
});

//�󶨶���ajax�˵�
function navload() {
    $('.top_nav a').live("click",
    function() {
		url = $(this).attr("href");
		if (url !== '' && url !== '#') {
        $.get(url, function(result){
           $("#nav").html(result);
        });
		}
	return false;
	});
}


//��ajax������
function hrftload() {
    $('.load a,.url').live("click",
    function() {
        url = $(this).attr("href");
		len=url.substring(url.length-1,url.length);
        if (len == "" || len == '#') {
            return false;
        }
		ajaxload(url);
        return false;
    });
	$('#nav ul a').live("click",function(){
		$("#nav ul a").removeClass('selected');
		$(this).addClass('selected');
	});
}

function ajaxload(url) {
    main_load(url);
}
//�˵���������ת
function menuload(url) {
    window.top.main_load(url);
}
//�󶨱����б�ɫ
function livetable() {
    $('.table_list tr:even,.form_table tr:odd').addClass('odd');
}


//�ύ����
function sub_lock() {
	var txt = '���ڴ������ݣ����Ժ�...';
    //IE6λ��
    if (!window.XMLHttpRequest) {
        $("#targetFixed").css("top", $(document).scrollTop() + 2);	
    }
    //������͸�����ֲ�
    if (!$("#overLay").size()) {
        $('<div id="overLay"></div>').prependTo($("body"));
        $("#overLay").css({
            width: "100%",
            backgroundColor: "#000",
            opacity: 0.1,
            position: "absolute",
            left: 0,
            top: 0,
            zIndex: 99
        }).height($(document).height());
    }
    $.dialog.tips(txt,3);
}
//�����ر�
function sub_lock_close() {
	var txt = '���ݴ�����ϣ�';
	$("#overLay").remove();
    $.dialog.tips(txt,1);
}

$(document).ready(function() {
livetable();	
})

//ajax�ύ����ȷ����ʾ
function ajaxpost(name,url,data,tip,success,failure,cancel){
	$.dialog({
		title: '����ȷ��',
		content: name,
		lock: true,
		button: [{
			name: 'ȷ�ϲ���',
			callback: function() {
			sub_lock();
			$.ajax({
			type: 'POST',
			url: url,
			data: data,
			dataType: 'json',
			success: function(json) {
				sub_lock_close();
				if(tip==1){
				$.dialog.tips(json.message, 3);
				}
				if (json.status == 1) {
					if(typeof success == "function"){
					success(json.message);
					}
				} else {
					if(typeof failure == "function"){
					failure(json.message);
					}
				}
			}
	});
	},
	focus: true
	},
		{
			name: 'ȡ��',
			callback: function() {
				  if(typeof cancel == "function"){
					cancel();
				}
			}
		}]
	});
}

//ajax�ύ��ȷ����ʾ
function ajaxpost_w(url,data,tip,success,failure,msg){
	$.ajax({
			type: 'POST',
			url: url,
			data: data,
			dataType: 'json',
			success: function(json) {
				if(tip==1){
				$.dialog.tips(json.message, 3);
				}
				if(tip==2&&msg!=''){
				$.dialog.tips(msg, 3);
				}
				if(json != null){
				if (json.status == 1) {
					if(typeof success == "function"){
					success(json.message);
					}
				} else {
					if(typeof failure == "function"){
					failure(json.message);
					}
				}
				}
			}
	});
}

//��������
function urldialog(title,url){
	$.dialog({
	title:title,
	content: 'url:'+url
	})
}

//��׼������
function savelistform(addurl,listurl,data){
$('#form').mkform(function() {
	sub_lock();
	if(typeof data == "function"){
		data(data);
	}
	setTimeout(function() {
		$('#form').ajaxSubmit({
			dataType: "json",
			type: 'post',
			success: function(json) {
				sub_lock_close();
				if (json.status == 0) {
					$.dialog.tips(json.message, 3);
				} else {
					$.dialog({
						title: '�����ɹ���',
						content: json.message+' 3����Զ������б�! ',
						lock: true,
						button: [{
							name: '�������',
							callback: function() {
								window.location.href=addurl
							},
							focus: true
						},
						{
							name: '�����б�',
							callback: function() {
								window.location.href=listurl
							}
						}]
					});
					setTimeout(function() {
					window.location.href=listurl
    		        }, 3000);

				}
				
			}
		});
	},
	1000);
	return false;
});
}

//��ֱ�ӱ���
function saveform(success,failure){
	$('#form').mkform(function(){
	setTimeout(function() {
	$('#form').ajaxSubmit({
		dataType: "json",
		success: function(json) {
		if (json.status == 1) {
			if(typeof success == "function"){
			success(json.message);
			}
		} else {
			if(typeof failure == "function"){
			failure(json.message);
			}
		}
		}
	});
	},
	1000);
	return false;
	});
}

