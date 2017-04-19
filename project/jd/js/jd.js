        var  hour=document.getElementById('hour').getElementsByTagName('span')[0];
        var  min=document.getElementById('min').getElementsByTagName('span')[0];
        var  sec=document.getElementById('sec').getElementsByTagName('span')[0];
        var rankinga=document.getElementsByClassName('ranking_a');
        var  rankingxian=document.getElementsByClassName('ranking_xian');

        // 滚屏开始
		var num=0;
		function run(){
		    num++;
		    if(num==9){
		    	num=0;
		    }
		    style_hs(num);
		}

		$("#r_c_t").hover(function(){
			$("#hand").stop().fadeIn();
			clearInterval(time1);
		},function(){
		    $("#hand").stop().fadeOut();
		    time1=setInterval(run,1000);
		});	
		$("#gundongtiao li").mouseover(function(){
			num=$(this).index();
			style_hs(num);
		});
		$("#hand li").eq(0).click(function(){
			num--;
			if (num==-1) {
				num=8;
			};
			style_hs(num);
		});
		$("#hand li").eq(1).click(function(){
			num++;
			if (num==9) {
				num=0;
			};
			style_hs(num);
		});
        
    	// 封装函数

		function style_hs(n){
	        $("#r_c_t img").eq(n).stop().fadeIn().siblings("img").stop().fadeOut();
	        $("#gundongtiao li").eq(n).stop().css({background:"red"}).siblings("li").stop().css({background:"white"});
		}
        // 滚屏结束
         
       // 促销开始
        $(".login_c_top1").hover(function(){
	       	$(".login_c_xian").stop().animate({left:"15px"},500);
	       	$(".login_c_bottom1").css({display:"block"}).siblings('.login_c_bottom2').css({display:"none"});
        })
        $(".login_c_top2").hover(function(){
	       	$(".login_c_xian").stop().animate({left:"52px"},500);
	       	$(".login_c_bottom2").css({display:"block"}).siblings('.login_c_bottom1').css({display:"none"});
        })
        // 促销结束

        // 排行榜开始
        $("#ranking_bd_head a").mouseover(function(){
        	paihang=$(this).index();
        	$(".ranking_xian").stop().animate({left:15+paihang*71+"px"},100);
        	$(".ranking_bd_item").eq(paihang).stop().fadeIn().siblings('.ranking_bd_item').stop().fadeOut();
        })
        // 排行榜结束

        // 滑动导航栏开始

        $(window).scroll(function() {
        	var t=$(window).scrollTop();
        	// document.title=t;
        	if (t>660) {
        		$("#search_xf").slideDown(300);
        	}else{
        		$("#search_xf").slideUp(300);
        	}
        	if (t<2108 &&t>=0) {
        		$(".left_xf").slideUp(300);
        	}else if(t>=2108 && t<2800){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(0).addClass("tjdys").siblings(".left_xf_li").removeClass("tjdys");
        	}else if(t>=2800 &&t<3380){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(1).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else if(t>=3380 &&t<3940){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(2).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else if(t>=3940 &&t<4500){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(3).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else if(t>=4500 &&t<5170){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(4).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else if(t>=5170 &&t<5700){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(5).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else if(t>=5700 &&t<6280){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(6).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else if(t>=6280 &&t<6800){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(7).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else if(t>=6800 &&t<7400){
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(8).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}else{
        		$(".left_xf").slideDown(300);
        		$(".left_xf_ul .left_xf_li").eq(9).addClass("tjdys").siblings('.left_xf_li').removeClass("tjdys");
        	}

        });
        // 滑动导航栏结束
        // 返回顶部开始
        $(".right_xf_item1").eq(6).click(function() {
        	 $("html,body").animate({scrollTop:0},0);
        	 $("#search_xf").hide();
        });
        // 返回顶部结束
        // 左侧悬浮开始
        $(".left_xf_ul li").eq(0).click(function() {
        	$("html,body").animate({scrollTop:2108},1000);
        });
        $(".left_xf_ul li").eq(1).click(function() {
        	$("html,body").animate({scrollTop:2800},1000);
        });
        $(".left_xf_ul li").eq(2).click(function() {
        	$("html,body").animate({scrollTop:3380},1000);
        });
        $(".left_xf_ul li").eq(3).click(function() {
        	$("html,body").animate({scrollTop:3940},1000);
        });
        $(".left_xf_ul li").eq(4).click(function() {
        	$("html,body").animate({scrollTop:4500},1000);
        });
        $(".left_xf_ul li").eq(5).click(function() {
        	$("html,body").animate({scrollTop:5170},1000);
        });
        $(".left_xf_ul li").eq(6).click(function() {
        	$("html,body").animate({scrollTop:5700},1000);
        });
        $(".left_xf_ul li").eq(7).click(function() {
        	$("html,body").animate({scrollTop:6280},1000);
        });
        $(".left_xf_ul li").eq(8).click(function() {
        	$("html,body").animate({scrollTop:6800},1000);
        });
        $(".left_xf_ul li").eq(9).click(function() {
        	$("html,body").animate({scrollTop:7700},1000);
        });
        $(".left_xf_ul li").eq(10).click(function() {
        	$("html,body").animate({scrollTop:0},1000);
        });
        // 左侧悬浮结束



        // 倒计时开始
    
	    // alert(new_t);
	    function djs(){
	    var new_t=new Date(2017,11,11,22,0,0,0);
	    var old_t=new Date();
	    var  cha=new_t.getTime()-old_t.getTime();
	    
	    var day=parseInt(cha/(24*60*60*1000));
	      cha=cha%(24*60*60*1000);
	    var h=parseInt(cha/(60*60*1000));
	      cha=cha%(60*60*1000);
	      hour.innerHTML=zreo(h);
	      var m=parseInt(cha/(60*1000));
	      cha=cha%(60*1000);
	      min.innerHTML=zreo(m);
	      var s=parseInt(cha/1000);
	      cha=cha%1000;
	      sec.innerHTML=zreo(s);
	      if (cha<=0) {
	      	clearInterval(time2);
	        };
	     }
	     djs();
	    time2=setInterval(djs,1000);
	    function zreo(n){
	      if (parseInt(n/10)==0) {
	      	n="0"+n;
	        };
        return n;
        }
       // 倒计时结束
 
   