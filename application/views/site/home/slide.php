<!-- lay slide -->
<div id='slide'>
	<div id="img-slide" class="sliderContainer" style='width:580px'>
		<div id="HomeSlide" class="royalSlider rsMinW">
		<?php foreach($slide as $list): ?>
			<a href="<?php echo $list->link; ?>" target='_blank'>
				<img class="images_slider" src="<?php echo base_url();?>/upload/slide/<?php echo $list->image_link; ?>" alt="<? echo $list->image_name; ?>"/> 
			</a>
		<?php endforeach; ?>
		</div>
	</div>
	<div class="clear"></div>
</div>