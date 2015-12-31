$(function(){
	//--------点我要许愿触发事件-----------
	$( '#send, #send_span' ).click( function () {
		//BODY插入黑色满屏遮罩
		$( '<div id="windowBG"></div>' ).css( {
			width : $(document).width(),
 			height : $(document).height(),
 			position : 'absolute',
 			top : 0,
 			left : 0,
 			zIndex : 998,
 			opacity : 0.3,
 			filter : 'Alpha(Opacity = 30)',
 			backgroundColor : '#000000'
		} ).appendTo( 'body' );
		//遮罩上面的表单项目
		var obj = $( '#send_form' );
		// drag(obj, obj);
		obj.css( {
			left : ( $( window ).width() - obj.width() ) / 2,
			top : $( document ).scrollTop() + ( $( window ).height() - obj.height() ) / 2
		} ).fadeIn();
	} );


	$( '#main' ).height( $( window ).height() - $( '#top' ).height() - 45);

	var paper = $( '.paper' );

	var FW = $( '#main' ).width();
	var FH = $( '#main' ).height();
	for (var i = 0; i < paper.length; i++) {
		var obj = paper.eq(i);
		pos(obj);
		drag(obj, $( 'dt', obj ));
	}

	paper.click( function () {
		$( this ).css( 'z-index', 1 ).siblings().css( 'z-index', 0 );
	} );

	// 点击关闭按钮关闭许愿
	$('.close').click(function(){
		$('#send_form').fadeOut(400);
		$( '#windowBG' ).remove();
	})

	$('.close_wish').click(function() {
		$(this).parents('.paper').hide();
	});

	//按键检测字数限定只能有50字
	$('textarea[name=content]').keyup(function() {
		var content = $(this).val();
		var leftNum = check(content);
		$('.wish').find('b').html(leftNum);

		if(leftNum < 0){
			$(this).val(content.substring(0, 49));
			$('.wish').find('b').html(0);
		}
	});
	//表情输入 注意alt值和图片名字的规律
	$( '#phiz img' ).click( function () {
		var phiz = '[' + $( this ).attr('alt') + ']';
		var obj = $( 'textarea[name=content]' );
		obj.val(obj.val() + phiz);
	} );
	
	$('.submit').click(function() {
	   
	   if( $('input[name=nickname]').val() == ''){
	   	alert('昵称不能为空');
	   	return;
	   }

	   if( $('textarea[name=content]').val() == ''){
	   	alert('愿望不能为空');
	   	return;
	   }
        var wish = $('form[name=send_wish]').serialize();
	   $.post(CONTROL + '/ajax_wish',wish,function(data){
            $('#main').append(data);
            var obj = $('#main .paper').last();
            pos(obj);
            drag(obj, $(obj,'dt'));
	   },'html');
	   $('.close').click();

	});
	//-----函数区域------------
	//随机位置函数
	function pos(obj){
		var FW = $( '#main' ).width();
		var FH = $( '#main' ).height();
		obj.css( {
				left : parseInt(Math.random() * (FW - obj.width())) + 'px',
				top : parseInt(Math.random() * (FH - obj.height())) + 'px'
			} );
	}

	//检测有多少个字可以输入
	function check(str){
		// alert(str.length);
		var num = 50;
		for(var i = 0; i < str.length; i++){
			num--;
		}
		return num;
	}
	/**
	* 元素拖拽
	* @param  obj		被拖拽的对象
	* @param  element 	触发拖拽的对象
	*/
	function drag (obj, element) {
		var DX, DY, moving;

		element.mousedown(function (event) {
			obj.css( {
				zIndex : 1,
				opacity : 0.5,
	 			filter : 'Alpha(Opacity = 50)'
			} );

			DX = event.pageX - parseInt(obj.css('left'));	//鼠标距离事件源宽度
			DY = event.pageY - parseInt(obj.css('top'));	//鼠标距离事件源高度

			moving = true;	//记录拖拽状态
		});

		$(document).mousemove(function (event) {
			if (!moving) return;

			var OX = event.pageX, OY = event.pageY;	//移动时鼠标当前 X、Y 位置
			var	OW = obj.outerWidth(), OH = obj.outerHeight();	//拖拽对象宽、高
			var DW = $(window).width(), DH = $(window).height();  //页面宽、高

			var left, top;	//计算定位宽、高

			left = OX - DX < 0 ? 0 : OX - DX > DW - OW ? DW - OW : OX - DX;
			top = OY - DY < 0 ? 0 : OY - DY > DH - OH ? DH - OH : OY - DY;

			obj.css({
				'left' : left + 'px',
				'top' : top + 'px'
			});

		}).mouseup(function () {
			moving = false;	//鼠标抬起消取拖拽状态

			obj.css( {
				opacity : 1,
	 			filter : 'Alpha(Opacity = 100)'
			} );

		});
	}

})