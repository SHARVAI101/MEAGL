$(document).ready(function(){
	$('.trendingmemes').hide();
	$('.freshmemes').hide();
	$('.notifications-column').hide();
	$('.notif').removeClass('addBackground');
	$('#hotmemes').addClass('borderi');
	$('.subscriptions-tab-content').hide();
	$('.social-tab-content').hide();
	$('#memes-tab').addClass('addBorder');
	$('#memes-tab:after').css('background','black');
	$('#social-tab:after').hide();
	//$('.notif-meme-heading').hide();
	
	var canvas=(document).getElementById('tab-bottom');
	
	var ctx=canvas.getContext('2d');
	
	ctx.beginPath();
		ctx.rect(0,4,$('#hotmemes').width()+13.5,canvas.height);
		ctx.rect(0,0,3,canvas.height);
		ctx.rect($('#hotmemes').width()+13.5,0,canvas.width,canvas.height);
		ctx.fillStyle="#b522a8";
		ctx.fill();
	$('#notifications').click(function(){
		$('.notif').removeClass('addBackground');
		$('.notifications-column').slideToggle();
	});

	$('.notif').hover(function(){
		$('.notif').removeClass('addBackground');
		$(this).addClass('addBackground');
	});

	$('.notif-link').click(function(){
		$('.hotmemes,.trendingmemes,.freshmemes,.tabs').hide();
		$('.notif-memes').show();
		$(this).addClass('notif-meme-heading');

		
		
	});

	$('#hotmemes').click(function(){
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.rect(0,4,$(this).width()+13.5,canvas.height);
		ctx.rect(0,0,3,canvas.height);
		ctx.rect($(this).width()+13.5,0,canvas.width,canvas.height);
		ctx.fillStyle="#b522a8";
		ctx.fill();
		$('#hotmemes:after').show();
		$('.hotmemes').show();
		$('.trendingmemes').hide();
		$('.freshmemes').hide();
		$(this).addClass('border');
		$('#trendingmemes').removeClass('border');
		$('#freshmemes').removeClass('border');
		$('#shuffle').removeClass('border');
	});

	$('#trendingmemes').click(function(){
		$('#hotmemes').removeClass('borderi');
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.rect($('#hotmemes').width()+64.5,4,$(this).width()+40,canvas.height);
		ctx.rect(0,0,$('#hotmemes').width()+64.5,canvas.height);
		ctx.rect($('#hotmemes').width()+23,0,3,canvas.height);
		ctx.rect($('#hotmemes').width()+$(this).width()+84.5,0,canvas.width,canvas.height);
		ctx.fillStyle="#b522a8";
		ctx.fill();
		$('.hotmemes').hide();
		$('.trendingmemes').show();
		$('.freshmemes').hide();
		$(this).addClass('border');
		$('#hotmemes').removeClass('border');
		$('#freshmemes').removeClass('border');
		$('#shuffle').removeClass('border');
	});

	$('#freshmemes').click(function(){
		$('#hotmemes').removeClass('borderi');
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.rect($('#hotmemes').width()+$('#trendingmemes').width()+135,4,$(this).width()+40,canvas.height);
		ctx.rect(0,0,$('#hotmemes').width()+$('#trendingmemes').width()+135,canvas.height);
		//ctx.rect($('#hotmemes').width()+$('#trendingmemes').width()+43,0,3,canvas.height);
		ctx.rect($('#hotmemes').width()+$('#trendingmemes').width()+$(this).width()+155,0,canvas.width,canvas.height);
		ctx.fillStyle="#b522a8";
		ctx.fill();
		$('.hotmemes').hide();
		$('.trendingmemes').hide();
		$('.freshmemes').show();
		$(this).addClass('border');
		$('#hotmemes').removeClass('border');
		$('#trendingmemes').removeClass('border');
		$('#shuffle').removeClass('border');
	});

	$('#shuffle').click(function(){
		$('#hotmemes').removeClass('borderi');
		ctx.clearRect(0,0,canvas.width,canvas.height);
		ctx.beginPath();
		ctx.rect(0,0,canvas.width-$(this).width()-31,canvas.height);
		ctx.rect(canvas.width-$(this).width()-31,4,$(this).width()+23,canvas.height);
		ctx.rect(canvas.width-11,0,3,canvas.height);
		ctx.rect
		ctx.fillStyle="#b522a8";
		ctx.fill();
		$('.hotmemes').hide();
		$('.trendingmemes').hide();
		$('.freshmemes').show();
		$(this).addClass('border');
		$('#hotmemes').removeClass('border');
		$('#trendingmemes').removeClass('border');
		$('#freshmemes').removeClass('border');
	});

	$('#dropdown').click(function(){
		$('.header2').slideToggle("fast");
	});

	$("[type=text]").focusin(function(){
    	$('.website-name,.dropdown,.dp,.notifications,.post-a-meme,.header2,.lower-body').addClass('addBlur');
 
    	for(var i=500;i>=400;i--)
    	{
    		setTimeout(function(){$('#search-box').css({
    		left:i,
    		});},50);
    		
    	}
    	for(var i=185;i<400;i++)
    	{
    		setTimeout(function(){$('.search').css({
    		width:i,
    		});},50);	
    	}
    	//$(this).addClass('modify-search-box');
    	$('a').bind('click',false);
    	$('a').addClass('cursor');
    });

    $("[type=text]").focusout(function(){
    	$('.website-name,.dropdown,.dp,.notifications,.post-a-meme,.header2,.lower-body').removeClass('addBlur');
    	$('#search-box').css({
    		left:500,
    	});
    	for(var i=399;i>=185;i--)
    	{
    		setTimeout(function(){$('.search').css({
    		width:i,
    		});},50);	
    	}
    	//searchboxanimation()
    	//$(this).removeClass('modify-search-box');
    	
    	$('a').removeClass('cursor');
    });
	

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

////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////


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
	
	
	


	/*$('#freshmemes').click(function(){
		$('#hotmemes').removeClass('borderi');
		$('.hotmemes').hide();
		$('.trendingmemes').hide();
		$('.freshmemes').show();
		$(this).addClass('border');
		$('#hotmemes').removeClass('border');
		$('#trendingmemes').removeClass('border');
	});
	/*function searchboxanimation(){
		var elem=document.getElementById('search-box')
		var pos=0;
		elem.style.top=20px;
	};*/

	

});