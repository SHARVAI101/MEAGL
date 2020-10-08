$(document).ready(function(){
	var title=$(this).attr('title');
	console.log(title);
	$('.trendingmemes').hide();
	$('.freshmemes').hide();
	$('.notifications-column').hide();
	$('.notif').removeClass('addBackground');
	$('#recommendedmemes').addClass('borderi');
	//new version below
			$('.dp,.user-options').mouseenter(function(){
				$('.user-options').css('display','block');
				console.log('enter');
			}).mouseleave(function(){
				$('.user-options').css('display','none');
				console.log('exit');
			});
	//$('.notif-meme-heading').hide();
	if(title=="Index Page")
	{

		var canvas=(document).getElementById('tab-bottom');
		
		var ctx=canvas.getContext('2d');
		
		ctx.beginPath();
			ctx.rect(0,4,$('#recommendedmemes').width()+13.5,canvas.height);
			ctx.rect(0,0,3,canvas.height);
			ctx.rect($('#recommendedmemes').width()+13.5,0,canvas.width,canvas.height);
			ctx.fillStyle="#b522a8";
			ctx.fill();

			$('#notifications').click(function(){
				$('.notif').removeClass('addBackground');
				$('.notifications-column').slideToggle();
				
			});
			
			

			

			//new version below
			
			var tOffset=$('.tabs').offset().top;
			var sHeight=$('.tabs').height()+10;
			$(window).scroll(function(){
				var scrollYpos = $(document).scrollTop();
			    if (scrollYpos > tOffset - sHeight) {
			        $(".tabs").css({
			            'top': '50px',
			            'position': 'fixed'
			        });
			        $('.recommendedmemes').css({
			        	'position':'relative',
			        });

			    }
			    
			     else {
			        $(".tabs").css({
			            'top': '100px',
			            'position': 'relative'
			        });
			    }
			});
			//new version ends

			$('#recommendedmemes').click(function(){
				ctx.clearRect(0,0,canvas.width,canvas.height);
				ctx.beginPath();
				ctx.rect(0,4,$(this).width()+13.5,canvas.height);
				ctx.rect(0,0,3,canvas.height);
				ctx.rect($(this).width()+13.5,0,canvas.width,canvas.height);
				ctx.fillStyle="#b522a8";
				ctx.fill();
				$('#recommendedmemes:after').show();
				$('.recommendedmemes').show();
				$('.trendingmemes').hide();
				$('.freshmemes').hide();
				$(this).addClass('border');
				$('#trendingmemes').removeClass('border');
				$('#freshmemes').removeClass('border');
				$('#shuffle').removeClass('border');
			});

			$('#trendingmemes').click(function(){
				$('#recommendedmemes').removeClass('borderi');
				ctx.clearRect(0,0,canvas.width,canvas.height);
				ctx.beginPath();
				ctx.rect($('#recommendedmemes').width()+64.5,4,$(this).width()+40,canvas.height);
				ctx.rect(0,0,$('#recommendedmemes').width()+64.5,canvas.height);
				ctx.rect($('#recommendedmemes').width()+23,0,3,canvas.height);
				ctx.rect($('#recommendedmemes').width()+$(this).width()+84.5,0,canvas.width,canvas.height);
				ctx.fillStyle="#b522a8";
				ctx.fill();
				$('.recommendedmemes').hide();
				$('.trendingmemes').show();
				$('.freshmemes').hide();
				$(this).addClass('border');
				$('#recommendedmemes').removeClass('border');
				$('#freshmemes').removeClass('border');
				$('#shuffle').removeClass('border');
			});

			$('#freshmemes').click(function(){
				$('#recommendedmemes').removeClass('borderi');
				ctx.clearRect(0,0,canvas.width,canvas.height);
				ctx.beginPath();
				ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+135,4,$(this).width()+40,canvas.height);
				ctx.rect(0,0,$('#recommendedmemes').width()+$('#trendingmemes').width()+135,canvas.height);
				//ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+43,0,3,canvas.height);
				ctx.rect($('#recommendedmemes').width()+$('#trendingmemes').width()+$(this).width()+155,0,canvas.width,canvas.height);
				ctx.fillStyle="#b522a8";
				ctx.fill();
				$('.recommendedmemes').hide();
				$('.trendingmemes').hide();
				$('.freshmemes').show();
				$(this).addClass('border');
				$('#recommendedmemes').removeClass('border');
				$('#trendingmemes').removeClass('border');
				$('#shuffle').removeClass('border');
			});

			$('#shuffle').click(function(){
				$('#recommendedmemes').removeClass('borderi');
				ctx.clearRect(0,0,canvas.width,canvas.height);
				ctx.beginPath();
				ctx.rect(0,0,canvas.width-$(this).width()-33,canvas.height);
				ctx.rect(canvas.width-$(this).width()-33,4,$(this).width()+23,canvas.height);
				ctx.rect(canvas.width-13,0,3,canvas.height);
				ctx.rect
				ctx.fillStyle="#b522a8";
				ctx.fill();
				$('.recommendedmemes').hide();
				$('.trendingmemes').hide();
				$('.freshmemes').show();
				$(this).addClass('border');
				$('#recommendedmemes').removeClass('border');
				$('#trendingmemes').removeClass('border');
				$('#freshmemes').removeClass('border');
			});
			}

			$('#dropdown').click(function(){
				$('.header2').slideToggle("fast");
			});

			$("[type=text].search").focusin(function(){
		    	$('.website-name,.dropdown,.dp,.notifications,.post-a-meme,.header2,.lower-body').addClass('addBlur');
		 
		    	$(this).addClass('modify-search-box');
		    	$('a').bind('click',false);
		    	$('a').addClass('cursor');
		    });

		    $("[type=text]").focusout(function(){
		    	$('.website-name,.dropdown,.dp,.notifications,.post-a-meme,.header2,.lower-body').removeClass('addBlur');
		    	
		    	//searchboxanimation()
		    	$(this).removeClass('modify-search-box');
		    	
		    	$('a').removeClass('cursor');
		    });
			
    /*
	$('#memes-tab').click(function(){
		$('#memes-tab').addClass('addBorder');
		$('#memes-tab:after').addClass('changeBackground');
		$('.memes-tab-content').show();
		$('.subscriptions-tab-content').hide();
		$('.social-tab-content').hide();
	});

	$('#subscriptions-tab').click(function(){
		$('.memes-tab-content').hide();
		$('.subscriptions-tab-content').show();
		$('.social-tab-content').hide();
	});

	$('#social-tab').click(function(){
		$('.memes-tab-content').hide();
		$('.subscriptions-tab-content').hide();
		$('.social-tab-content').show();
	});
	*/

	if(title=="My Home"){
	var canvas=(document).getElementById('tab-bottom');
	$('.subscriptions-tab-content').hide();
	$('.social-tab-content').hide();
	$('#memes-tab').addClass('addBorder');
	$('#memes-tab:after').css('background','black');
	$('#social-tab:after').hide();
	var ctx=canvas.getContext('2d');
		
	ctx.beginPath();
	ctx.rect(0,4,$('#memes-tab').width()+13.5,canvas.height);
	ctx.rect(0,0,3,canvas.height);
	ctx.rect($('#memes-tab').width()+13.5,0,canvas.width,canvas.height);
	ctx.fillStyle="#b522a8";
	ctx.fill();
	$('#memes-tab').click(function(){
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.rect(0,4,$(this).width()+13.5,canvas.height);
		ctx.rect(0,0,3,canvas.height);
		ctx.rect($(this).width()+13.5,0,canvas.width,canvas.height);
		ctx.fillStyle="#b522a8";
		ctx.fill();
		//$('#recommendedmemes:after').show();
		$('.memes-tab-content').show();
		$('.subscriptions-tab-content').hide();
		$('.social-tab-content').hide();
		$(this).addClass('border');
		$('#subscriptions-tab').removeClass('border');
		$('#social-tab').removeClass('border');
	});

	$('#subscriptions-tab').click(function(){
		$('#memes-tab').removeClass('addBorder');
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.rect($('#memes-tab').width()+116,4,$(this).width()+40,canvas.height);
		ctx.rect(0,0,$('#memes-tab').width()+116,canvas.height);
		//ctx.rect($('#memes-tab').width()+23,0,3,canvas.height);
		ctx.rect($('#memes-tab').width()+$(this).width()+127,0,canvas.width,canvas.height);
		ctx.fillStyle="#b522a8";
		ctx.fill();
		$('.memes-tab-content').hide();
		$('.subscriptions-tab-content').show();
		$('.social-tab-content').hide();
		$(this).addClass('border');
		$('#memes-tab').removeClass('border');
		$('#social-tab').removeClass('border');

	});

	$('#social-tab').click(function(){
		$('#memes-tab').removeClass('addBorder');
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.rect(0,0,canvas.width-$(this).width()-36.5,canvas.height);
		ctx.rect(canvas.width-$(this).width()-36.5,4,$(this).width()+23,canvas.height);
		ctx.rect(canvas.width-13,0,3,canvas.height);
		ctx.rect
		ctx.fillStyle="#b522a8";
		ctx.fill();
		$('.memes-tab-content').hide();
		$('.subscriptions-tab-content').hide();
		$('.social-tab-content').show();
		$(this).addClass('border');
		$('#subscriptions-tab').removeClass('border');
		$('#memes-tab').removeClass('border');

	});
	}
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

	if(title=="Meme Maker")
	{
	var clickno=0,oncedone=0,half_width_pressed=0;
	$('.dragger').hide();
	var width_i=$('#workstation-meme').width();
	var height_i=$('#workstation-meme').height();
	function showbutton(){
		if(clickno===0){
			fromtop = ($('#workstation-meme').height())/2;
			fromleft=($('#workstation-meme').width())/2;
			adjustButtons(fromtop,fromleft);
			$('.dragger').show();
			console.log('hey0');
			if(oncedone===1){
				$('#workstation-meme').resizable("enable");
			}

			$('#workstation-meme').resizable({
				handles:'s',

				resize: function(event,ui){
					if(half_width_pressed===1){
						ui.size.width=width_i/2;
					}
					else{
						ui.size.width=width_i;
					}
					
					fromtop=ui.size.height/2;
					fromleft=ui.size.width/2;
					adjustButtons(fromtop,fromleft);
					console.log('hey');
					oncedone=1;
				}
			});

			clickno=1;
		}
		else if(clickno===1)
		{
			console.log('hey1');
			$('#workstation-meme').resizable("disable");
			$('.dragger').hide();
			clickno=0;

		}
	}

	//console.log('hey');
	document.getElementById('workstation-meme').addEventListener('click',showbutton);

	
	$('#workstation').height($('#workstation-meme').height());

	var fromleft = ($('#workstation-meme').width())/2;

	$('#dragger').css({
		left:fromleft,
	});

	var fromtop = ($('#workstation-meme').height())/2;

	adjustButtons(fromtop,fromleft);

	document.getElementById('half-width-1').addEventListener('click',function(){
		if(half_width_pressed===0){
			$('#workstation-meme').width(width_i/2);
			half_width_pressed=1;
			fromtop = ($('#workstation-meme').height())/2;
			fromleft=($('#workstation-meme').width())/2;
			adjustButtons(fromtop,fromleft);
		}
		else{
			$('#workstation-meme').width(width_i);
			half_width_pressed=0;
			fromtop = ($('#workstation-meme').height())/2;
			fromleft=($('#workstation-meme').width())/2;
			adjustButtons(fromtop,fromleft);
		}
	});

	function adjustButtons(fromtop,fromleft){
		$('#half-width-1,#half-width-2').css({
			top:fromtop,
		});

		$('#dragger').css({
			left:fromleft,
			top:fromtop*2-9,
		});

		$('#half-width-2').css({
			left:fromleft*2-9,
		});
	}
	}
	if(title=="Dedicated meme page")
	{
		$('.right-container').height($('.dedicated-meme').height());
		$('.submit-comment').height($('.comment-input').height());
		/*for(var i=0;i<$('div.comments').length;i++)
		{
			console.log($('div.comments').eq(i).height());
			console.log($('.real-comment').eq(i).height());
			$('div.comments').eq(i).height($('.real-comment').eq(i).height()+70);
			$('.action-link').eq(i).css({
				top:$('.real-comment').eq(i).height()+15,
			});
			$('.comment-info').eq(i).css({
				top:$('.real-comment').eq(i).height()+10,
			});
			$('div.reply-comment').eq(i).css({
				top:$('div.comments').eq(i).height(),
			});
			$('.reply-action').eq(i).css({
				top:$('.real-comment').eq(i).height()+15,
			});
			for(var j=0;j<$('div.reply-comments').eq(i).length;j++)
			{
			}
		}
		$('div.reply-comment').height($('.reply-real-comment').height()+40);
		
		$('#reply-like-link').css({
			top:$('.reply-real-comment').height()+15,
		});
		
		$('.comment-reply-info').css({
			top:$('.reply-real-comment').height()+9,
		});
		
		$('.replies').css({
			top:$('.real-comment').height()+45,
		});*/
		$('.reply-link').click(function(){
			
			$(this).css({
				display: "none",
			});
			
			$(this).next().css({
					display: "none",
				});
			$(this).parent().next().css({
					display: "none",
				});
			$(this).parent().next().next().css({
					display: "none",
				});

			$(this).parent().next().next().next().next().css({
					display: "block",
				});
			$(this).parent().next().next().next().next().next().css({
					display: "block",
				});

			
			setTimeout(function() {
  							$('#text-reply').focus();
						}, 0);
			$('#text-reply').focusout(function(){
				$(this).css({
					display: "none",
				});
				$(this).next().css({
					display: "none",
				});
				$(this).prevAll('.comment-info').css({
					display: "inline-block",
				});
				$(this).parent().children('p').children('.action-link').css({
					display: 'inline-block',
				});
				/*$(this).parent().children('.action-link').css({
					display: 'inline-block',
				});*/
				
			});
		
		});

	}
	if(title=="Settings"){
		console.log($('#userStatus').width());
		
		$('#update-pic').addClass('current-link');
		$('#update-pic').click(function(){
			$('.change-password').hide();
			$('.update-status').hide();
			$('.prof-pic-update').show();
			$(this).addClass('current-link');
			$('#update-stat').removeClass('current-link');
			$('#change-pass').removeClass('current-link');
		});
		$('#change-pass').click(function(){
			$('.change-password').show();
			$('.update-status').hide();
			$('.prof-pic-update').hide();
			$(this).addClass('current-link');
			$('#update-stat').removeClass('current-link');
			$('#update-pic').removeClass('current-link');
		});
		$('#update-stat').click(function(){

			$('.change-password').hide();
			$('.update-status').show();
			$('.prof-pic-update').hide();
			$(this).addClass('current-link');
			$('.edit-status').css({
				left:$('#userStatus').width()+98,
			});
			$('#update-pic').removeClass('current-link');
			$('#change-pass').removeClass('current-link');
		});
		var piccanvas=(document).getElementById('prof-pic');
		var context=piccanvas.getContext('2d');
		var canvas=(document).getElementById('prof-pic-canvas');
		var ctx=canvas.getContext('2d');
		var img= new Image();
		console.log(img);
		img.src="Elon.jpg";
		$(img).on('load',function(){
			var aspect_ratio=this.height/this.width;
			this.width=400;
			piccanvas.width=400;
			this.height=400*aspect_ratio;
			piccanvas.height=this.height;
			context.drawImage(this,0,0,400,piccanvas.height);
			canvas.width=260;
			canvas.height=260;
			ctx.beginPath();
			ctx.arc(130,130,130,0,2*Math.PI);
			ctx.fillStyle='rgba(255,0,0,0)';
			ctx.fill();

			ctx.stroke();
			$(canvas).css({
				left: 60,
				top: 60,
			});
			$(canvas).draggable();
			ctx.fillStyle='rgba(255,0,0,0)';
			ctx.fill();
			$(canvas).mouseover(function(e){
				$(this).css('cursor','move');

				/*$(this).add(canvas).click(function(ev){
					console.log(ev.pageX);
					$(canvas).css({
						left:ev.pageX-730,
						top:ev.pageY-220,
					});
				});*/
			});
		});
	}
	


	/*$('#freshmemes').click(function(){
		$('#recommendedmemes').removeClass('borderi');
		$('.recommendedmemes').hide();
		$('.trendingmemes').hide();
		$('.freshmemes').show();
		$(this).addClass('border');
		$('#recommendedmemes').removeClass('border');
		$('#trendingmemes').removeClass('border');
	});
	/*function searchboxanimation(){
		var elem=document.getElementById('search-box')
		var pos=0;
		elem.style.top=20px;
	};*/

	

});