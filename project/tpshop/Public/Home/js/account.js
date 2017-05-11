$(function(){

//...........................................................................
	//默认第一个选中
    $('.consignee-item').eq(0).find('.radio-img').addClass('pitchOn');
	//默认收获地址
    var name =$('.consignee-item').eq(0).find('.e-name').html();
    var cityParticular = $('.consignee-item').eq(0).find('.city-particular').html();
    var codeNumber =  $('.consignee-item').eq(0).find('.codeNumber').html();
    var city =  $('.consignee-item').eq(0).find('.city').html();

    //发货地址
    $('.m-city').html(city);
    //详细地址
    $('.m-particular').html(cityParticular);
    //收获地址
    $('.m-name').html(name);
    //电话号码
    $('.m-number').html(codeNumber);
//...................................................................
		//点击切换小按钮
	$('.appnd').delegate('.consignee-item .radio','click',function () {

        $(this).parents('.consignee-item').find('.radio-img').addClass('pitchOn');
        $(this).parents('.consignee-item').siblings('.consignee-item').find('.radio-img').removeClass('pitchOn');

        //............自己写的..........
		//获取想
        var name = $(this).parents('.consignee-item').find('.e-name').html();
        var cityParticular = $(this).parents('.consignee-item').find('.city-particular').html();
        var codeNumber = $(this).parents('.consignee-item').find('.codeNumber').html();
        var city = $(this).parents('.consignee-item').find('.city').html();

		//发货地址
        $('.m-city').html(city);
        //详细地址
		$('.m-particular').html(cityParticular);
		//收获地址
		$('.m-name').html(name);
		$('.m-number').html(codeNumber);
        //模态框隐藏
         $('.new-ress,.new').hide();
        //让添加新地址的按钮显示
        $('.new-address').show();
		$('.consignee-item new-ress').css('display','block');
    })




	//	添加新地址
	$('.new-address').click(function(){

		//清空form表单
		$('#form')[0].reset();
        area.selected('','','');
        //.............................
        //2017_4_6 修该
         $('.btn-group .ader').val('');
         //............................
		//让当前元素隐藏
		$(this).hide();
		//取消掉其他单选框的背景
		$('.consignee-item').find('.radio-img').removeClass('pitchOn');
        //使添加新地址的单选框添加背景
        $('.new-ress .radio-img').addClass('pitchOn');
		//使添加新地址的单选框和地址框显示
		$('.new-ress,.new').show();

	})

//	点击取消
$('.btn-qu').click(function(){
//	使添加新地址的单选框和地址框隐藏
	$('.new-ress,.new').hide();
//	让添加新地址的按钮显示
	$('.new-address').show();

})


   //编辑
    $('.appnd').delegate('.copyreader','click',function () {

	//编辑页
        $('.new-ress,.new').show();
        //选中背景图
        $(this).parents('.consignee-item').find('.radio-img').addClass('pitchOn');
        //	让其他兄弟元素的背景图消失
        $(this).parents('.consignee-item').siblings('.consignee-item').find('.radio-img').removeClass('pitchOn');

        //让添加新地址的按钮显示
        $('.new-address').css('display','none');
        $('#adress3').parents('.consignee-item').css('display','none');


        var postId= $(this).parents('.consignee-item').attr('ader');


        //ajax
        $.post(editAjax,{ader:postId},function (res) {
            //收获人

            $(' .s-name #name').val(res.clientname);
            //地址
            area.selected(res.place[0],res.place[1],res.place[2]);
            $('.address-s #particular').val(res.address);
            //手机
            $(' .shouji #shouji').val(res.cellphone);
            //邮编
            $('.postcode #postcode').val(res.postnum);
            //地址编号
            $('.btn-group .ader').val(res.ader);
        },'json');

    })



    /**
	 * 获得相应的内容
	 * var name = $(this).parents('.consignee-item').find('.e-name').html();
     var cityParticular = $(this).parents('.consignee-item').find('.city-particular').html();
     var codeNumber = $(this).parents('.consignee-item').find('.codeNumber').html();
     var city = $(this).parents('.consignee-item').find('.city').html();
     */
    ////	让编辑页面显示
	// 	$('.edit').show();
    /**
	 * //	将获得的内容写入样式中
     $('.edit .s-name #name').val(name);
     $('.edit .shouji #shouji').val(codeNumber);
     $('.edit .address-s #particular').val(cityParticular);
     */
    /**
	 *
	 *
     //	选中背景图
     $(this).parents('.consignee-item').find('.radio-img').addClass('pitchOn');
     //	让其他兄弟元素的背景图消失
     $(this).parents('.consignee-item').siblings('.consignee-item').find('.radio-img').removeClass('pitchOn');

     */
    //	切换地址
    // // $('.content-address .consignee-item .radio').click(function(){
    // //
    // $(this).parent().find('.radio-img').addClass('pitchOn');
    // $(this).parent().siblings('.consignee-item').find('.radio-img').removeClass('pitchOn');
    //
    // // });

	
	$('.invoice .radio').click(function(){

		$(this).parent().find('.radio-img').addClass('pitchOn');
		$(this).parent().siblings('.consignee-item').find('.radio-img').removeClass('pitchOn');
			if($(this).hasClass('yes')){
					$('.con').show();
				}else{
					$('.con').hide();
				}


	})



	$('.tongyong').click(function(){
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
		if($(this).hasClass('danwei')){
			$('.danweiname').show();
		}else{
			$('.danweiname').hide();
		}
	})

	
	
	
})