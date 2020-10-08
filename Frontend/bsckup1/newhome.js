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
		$('#hotmemes').removeClass('borderi');
		$('#hotmemes:after').show();
		$('.hotmemes').show();
		$('.trendingmemes').hide();
		$('.freshmemes').hide();
		$(this).addClass('border');
		$('#trendingmemes').removeClass('border');
		$('#freshmemes').removeClass('border');
	});

	$('#trendingmemes').click(function(){
		$('#hotmemes').removeClass('borderi');
		$('.hotmemes').hide();
		$('.trendingmemes').show();
		$('.freshmemes').hide();
		$(this).addClass('border');
		$('#hotmemes').removeClass('border');
		$('#freshmemes').removeClass('border');
	});

	$('#freshmemes').click(function(){
		$('#hotmemes').removeClass('borderi');
		$('.hotmemes').hide();
		$('.trendingmemes').hide();
		$('.freshmemes').show();
		$(this).addClass('border');
		$('#hotmemes').removeClass('border');
		$('#trendingmemes').removeClass('border');
	});

	$('#dropdown').click(function(){
		$('.header2').slideToggle("fast");
	});

	$("[type=text]").focusin(function(){
    	$('.website-name,.dropdown,.dp,.notifications,.post-a-meme,.header2,.lower-body').addClass('addBlur');
    	//searchboxanimation()
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
	console.log('heyacanvas');
	var canvas=(document).getElementById('canvas');
	ctx=canvas.getContext('2d');
	ctx.font='32pt Arial';
	var img= new Image();
	img.src="https://imgflip.com/s/meme/Creepy-Condescending-Wonka.jpg";
	img.addEventListener("load",function(){
		canvas.width=this.width;
		canvas.height=this.height;
		ctx.drawImage(this,0,0);

	});
	


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