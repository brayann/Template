<?php

	echo $this->session->flashdata('msg');
	
	if ( !$templates ) :
		echo 'No Templates Yet';
	
	else : 
?>
		<h3><?php echo $theme; ?></h3>
		<form action="<?php echo site_url() . '/site/change_template'; ?>" method="POST">

			<div id="show_templates">

				<ul id="template_list">

					<?php foreach($templates->result() as $template ) : ?>

						<li>

							<input type="radio" name="template_id" value="<?php echo $template->template_id; ?>" />
							<img src="<?=base_url()?>templates/<?php echo $template->path . '/' . $template->preview_image?>" />

						</li>

					<?php endforeach; ?>

				</ul>

			</div>

			<p class="wrapper" style="text-align:center;"><input type="submit" name="Enviar" value="Trocar Template" /></p>

		</form>
		
		<script type="text/javascript">
		
			$("ul#template_list li").click(function () {
				
				$(this).parent().find("li").removeClass("border-selected");
				$(this).addClass("border-selected");
				
				$(this).children("input[name=template_id]").attr("checked","checked");
			
			});
					
		</script>

<?php endif; ?>