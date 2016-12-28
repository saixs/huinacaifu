/*����JQ�����������޼�϶�ƶ����
*/    
(function($){
	$.fn.moveXY=function(options)
	{
		var opts=$.extend({}, $.fn.moveXY.defaults, options);
		return this.each(function()
		{
      	    var $this=$(this);
			var $li=$this.find(opts.targetObj),slideSize;
			if(opts.effect=="yToBottom" || opts.effect=="yToTop")
			{
				slideSize=$li.height();	
			}else{
					slideSize=$li.width();
					var _num=$li.length;
					$this.css("width",_num*slideSize);
				 }	 
			$.fn.moveXY.effects[opts.effect]($this,opts,$li,slideSize);		
		});
	};
	
	$.fn.moveXY.defaults=
	{
		targetObj:"li",//�����ƶ���
		effect:"yToBottom",
		speed:1000,		//����Ĭ��ʱ��
		timer:2000		//�Զ�����ʱ��
	};
	
	$.fn.moveXY.effects=
	{
		yToBottom:function($this,opts,$li,slideH){
			var doPlay=function()
			{
				if(!$this.is(":animated"))
				{
					$this.animate({"top":"+"+slideH},opts.speed,function()
					{
				   		var $cl =$this.find(opts.targetObj+":last").clone(true);
				   		$cl.css({opacity:0,filter:'alpha(opacity=0)'});
				   		$this.prepend($cl);	
				   		$this.css("top",0);
				   		$cl.animate({"opacity":1},opts.speed,function(){
				      		$this.find(opts.targetObj+":last").remove();
				   		});
					});			
				}				
			}//�Զ����ź���
			var autoPlay=setInterval(doPlay,opts.timer);
			$li.mouseenter(function(){
				if(autoPlay)
				{
					clearInterval(autoPlay);
				}
			}).mouseleave(function(){
				   if(autoPlay)
					{
						clearInterval(autoPlay);
					}
					autoPlay=setInterval(doPlay,opts.timer);
				});
		},
		yToTop:function($this,opts,$li,slideH){
			var doPlay=function()
			{
				if(!$this.is(":animated"))
				{
				  $this.animate({top: '-'+slideH},opts.speed,function(){
				  	 var $cl =$this.find(opts.targetObj+":first");
				   	 $cl.css({opacity:0,filter:'alpha(opacity=0)'});
				   	 $this.append($cl);
				     $this.css("top",0);
				     $cl.animate({"opacity":1},opts.speed);				   
				   }); 	
				}					
			}//�Զ����ź���
			var autoPlay=setInterval(doPlay,opts.timer);
			$li.mouseenter(function(){
				if(autoPlay)
				{
					clearInterval(autoPlay);
				}
			}).mouseleave(function(){
				   if(autoPlay)
					{
						clearInterval(autoPlay);
					}
					autoPlay=setInterval(doPlay,opts.timer);
				});
		},				
		xToLeft:function($this,opts,$li,slideW){
			var doPlay=function()
			{
				if(!$this.is(":animated"))
				{
					$this.animate({left:"-"+slideW},function(){
					$this.find(opts.targetObj+":first").appendTo($this);
						$this.css({"left":"0"});
					});
				}		
			}
			var autoPlay=setInterval(doPlay,opts.timer);
				$li.mouseenter(function(){
					if(autoPlay)
					{
						clearInterval(autoPlay);
					}
				}).mouseleave(function(){
				   if(autoPlay)
				   {
						clearInterval(autoPlay);
				   }
					autoPlay=setInterval(doPlay,opts.timer);
				});	
		},
		xToRight:function($this,opts,$li,slideW){
			var doPlay=function()
			{
				if(!$this.is(":animated"))
				{
				    $this.find(opts.targetObj+":last").prependTo($this);
					$this.css({"left":-slideW});
					$this.stop().animate({"left":0});
				}	
			}
			var autoPlay=setInterval(doPlay,opts.timer);
				$li.mouseenter(function(){
					if(autoPlay)
					{
						clearInterval(autoPlay);
					}
				}).mouseleave(function(){
				   if(autoPlay)
				   {
						clearInterval(autoPlay);
				   }
					autoPlay=setInterval(doPlay,opts.timer);
				});	
		}	
	};
})(jQuery); 