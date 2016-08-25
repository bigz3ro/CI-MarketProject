<meta http-equiv="Content-Type" content="text/html ;charset=utf-8" />
<!-- the CSS -->
<link type="text/css" href="<?php echo public_url(); ?>/site/css/reset.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url(); ?>/site/css/style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url(); ?>/site/css/menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url(); ?>/site/css/input.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url(); ?>/site/css/product.css" rel="stylesheet" />
<link type="text/css" href="<?php echo public_url(); ?>/site/css/slide-flim.css" rel="stylesheet" />
<!-- End CSS -->

<!-- the Javascript -->

<script type="text/javascript" src="<?php echo public_url(); ?>/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>/js/jquery/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url(); ?>/js/jquery/jquery-ui/custom-theme/jquery-ui-1.8.21.custom.css" type="text/css">

<script src="<?php echo public_url(); ?>/site/js/script.js"></script>

<!-- raty -->
<script type="text/javascript" src="<?php echo public_url(); ?>/site/raty/jquery.raty.min.js"></script>
<script type="text/javascript">
	$(function() {
		$.fn.raty.defaults.path = '<?php echo base_url('public/site/raty/img/');?>'
		$('.raty').raty({
		score: function() {
			return $(this).attr('data-score');
		},
		readOnly  : true,
		});
	});
</script>
<style>.raty img{width:16px !important;height:16px; !important;}</style>
<!--End raty -->

<!-- End Javascript -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#back_to_top').click(function() {
		$('html, body').animate({scrollTop:0},"slow");
		});
		// go top
		$(window).scroll(function() {
		if($(window).scrollTop() != 0) {
		$('#back_to_top').fadeIn();
		} else {
		$('#back_to_top').fadeOut();
		}
		});
	});
</script>

<!-- Slider -->
<script src="<?php echo public_url(); ?>/site/royalslider/jquery.royalslider.min.js"></script>
<link type="text/css" href="<?php echo public_url(); ?>/site/royalslider/royalslider.css" rel="stylesheet">
<link type="text/css" href="<?php echo public_url(); ?>/site/royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">
<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		$("#HomeSlide").royalSlider({
			arrowsNav:true,
			loop:false,
			keyboardNavEnabled:true,
			controlsInside:false,
			imageScaleMode:"fill",
			arrowsNavAutoHide:false,
			autoScaleSlider:true,
			autoScaleSliderWidth:580,//chiều rộng slide
			autoScaleSliderHeight:205,//chiều cao slide
			controlNavigation:"bullets",
			thumbsFitInViewport:false,
			navigateByClick:true,
			startSlideId:0,
			autoPlay:{enabled:true, stopAtAction:false, pauseOnHover:true, delay:5000},
			transitionType:"move",
			slideshowEnabled:true,
			slideshowDelay:5000,
			slideshowPauseOnHover:true,
			slideshowAutoStart:true,
			globalCaption:false
		});
	});
})(jQuery);
</script>

<!-- End slider -->
<style>
#back_to_top {
bottom: 10px;
color: #666;
cursor: pointer;
padding: 5px;
position: fixed;
right: 55px;
text-align: center;
text-decoration: none;
width: auto;
}
#HomeSlide.royalSlider {
	width: 100%;
	height: 205px;
	overflow:hidden;
}
div#img-slide{
	width: 100% !important;
}
.images_slider{
	width: 100%;
	height: 100%;
}
</style>

<title>Go market</title>