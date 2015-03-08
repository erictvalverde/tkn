<?php

function tkn_admin_head() { 
	?>
		<link href="<?php bloginfo('template_url'); ?>/admin/tkn_admin.css" rel="stylesheet" type="text/css" media="all" />
	<?php 
	}
	
	
	$themename = "Tarsila Kruse";
	$shortname = "tkn";

	function tkn_generate_page($options){
		global $themename;
		$i=0;  
		?>
	
	
<div class="tkn_wrap">
    			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
						<h2><?php echo $themename; ?></h2>
						<?php if ( $_REQUEST['saved'] ) { ?><div class="warning">As mudan&ccedil;as foram efetuadas com sucesso!</div><?php } ?>
						<?php if ( $_REQUEST['reset'] ) { ?><div class="warning">Op&ccedil;&otilde;es resetadas com sucesso.</div><?php } ?>	
						<!--START: GENERAL SETTINGS-->
     						
						<?php foreach ($options as $value) { ?>
							<?php if ( $value['type'] <> "heading" ) { ?>
                                                   		<div class="wrap_opts">
                                                   		<?php if ($value['name'] != ""){ ?>
									<h4><?php echo $value['name']; ?></h4>
                                                  		<?php }; ?>
                                                  		<small><?php echo $value['desc']; ?></small>
							<?php } ?>	
							<?php
								switch ( $value['type'] ) {
									case 'text': ?>
		        						<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings($value['id']); } else { echo $value['std']; } ?>" />
									<?php
									break;
									case 'select':
									?>
	            							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                						<?php foreach ($value['options'] as $option) { ?>
	                							<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                						<?php } ?>
	            							</select>
									<?php
									break;
									case 'textarea':
									$ta_options = $value['options'];
									?>
									<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="8"><?php  if( get_settings($value['id']) != "") { echo stripslashes(get_settings($value['id'])); } else { echo $value['std']; } ?></textarea>
									<?php
									break;
									case "radio":
 									foreach ($value['options'] as $key=>$option) { 
										$radio_setting = get_settings($value['id']);
										if($radio_setting != '') {
		    									if ($key == get_settings($value['id']) ) { $checked = "checked=\"checked\""; } else { $checked = ""; }
										} else {
											if($key == $value['std']) { $checked = "checked=\"checked\""; } else { $checked = ""; }
										} ?>
	            								<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
										<?php }
									break;
									case "checkbox":
										if(get_settings($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; }?>
		            							<input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
										<?php
									break;
									case "multicheck":
 										foreach ($value['options'] as $key=>$option) {
	 										$sb_key = $value['id'] . '_' . $key;
											$checkbox_setting = get_settings($sb_key);
 											if($checkbox_setting != '') {
		    										if (get_settings($sb_key) ) { $checked = "checked=\"checked\""; } else { $checked = ""; }
											} else { 
												if($key == $value['std']) { $checked = "checked=\"checked\""; } else { $checked = ""; }
											} ?>
	            									<input type="checkbox" class="checkbox" name="<?php echo $sb_key; ?>" id="<?php echo $sb_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $sb_key; ?>"><?php echo $option; ?></label><br />
										<?php }
									break;
									case "heading": ?>
                                             					</fieldset>
		    								<h3 class="title"><?php echo $value['name']; ?></h3>
										<fieldset class="<?php echo 'section_'.$i; ?>">
										<?php
									break;
									default:
									break;
								} //close switch ?>
								
								<?php if ( $value['type'] <> "heading" ) { ?>
									<?php if ( $value['type'] <> "checkbox" ) { ?><?php } ?></div>
								<?php } $i++; ?>
                                             
							<?php } ?>
                                  			</fieldset>
                                   			<p class="submit">
								<input name="save" type="submit" value="Save changes" />    
								<input type="hidden" name="action" value="save" />
							</p>
							
						<!--END: GENERAL SETTINGS-->
            					</form>
					</div><!-- wrap -->
<?php } //foreach ($options as $value)
	
	$tknoptions = array();	
	$tknoptions[] = array(	"name" => "Primeiro Slides da Homepage", "type" => "heading");
	$tknoptions[] = array(	"name" => "Titulo Slide 1","desc" => "Titulo do primeiro slide na Homepage","id" => $shortname."_slide1_title","std" => "","type" => "text");
	$tknoptions[] = array(	"name" => "Imagem Slide 1","desc" => "Endere&ccedil;o da imagem para o primeiro slide na Homepage (Copiar url quando fizer o upload da imagem)","id" => $shortname."_slide1_img","std" => "","type" => "text");
	$tknoptions[] = array(	"name" => "link Slide 1","desc" => "Link para onde o visitante deve ser levado ao clicar no slide","id" => $shortname."_slide1_link","std" => "","type" => "text");

	$tknoptions[] = array(	"name" => "Segundo Slide da Homepage", "type" => "heading");
	$tknoptions[] = array(	"name" => "Titulo Slide 2","desc" => "Titulo do segundo slide na Homepage","id" => $shortname."_slide2_title","std" => "","type" => "text");
	$tknoptions[] = array(	"name" => "Imagem Slide 2","desc" => "Endere&ccedil;o da imagem para o segundo slide na Homepage (Copiar url quando fizer o upload da imagem)","id" => $shortname."_slide2_img","std" => "","type" => "text");
	$tknoptions[] = array(	"name" => "link Slide 2","desc" => "Link para onde o visitante deve ser levado ao clicar no slide","id" => $shortname."_slide2_link","std" => "","type" => "text");

	$tknoptions[] = array(	"name" => "Terceiro Slide da Homepage", "type" => "heading");
	$tknoptions[] = array(	"name" => "Titulo Slide 3","desc" => "Titulo do terceiro slide na Homepage","id" => $shortname."_slide3_title","std" => "","type" => "text");
	$tknoptions[] = array(	"name" => "Imagem Slide 3","desc" => "Endere&ccedil;o da imagem para o terceiro slide na Homepage (Copiar url quando fizer o upload da imagem)","id" => $shortname."_slide3_img","std" => "","type" => "text");
	$tknoptions[] = array(	"name" => "link Slide 3","desc" => "Link para onde o visitante deve ser levado ao clicar no slide","id" => $shortname."_slide3_link","std" => "","type" => "text");

		
	function tkn_index_options() {
		global $tknoptions;
		tkn_generate_page($tknoptions);
	}
	
	function tkn_add_admin() {
		global $themename,$tknoptions;
		if ( $_GET['page'] == "tkn-options") {
			if ( 'save' == $_REQUEST['action'] ) {
					foreach ($tknoptions as $value) {
						if($value['type'] != 'multicheck'){
							update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
						}else{
							foreach($value['options'] as $mc_key => $mc_value){
								$up_opt = $value['id'].'_'.$mc_key;
								update_option($up_opt, $_REQUEST[$up_opt] );
							}
						}
					}
					foreach ($tknoptions as $value) {
						if($value['type'] != 'multicheck'){
							if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
						}else{
							foreach($value['options'] as $mc_key => $mc_value){
								$up_opt = $value['id'].'_'.$mc_key;						
								if( isset( $_REQUEST[ $up_opt ] ) ) { update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); } 
							}
						}
					}
					header("Location: admin.php?page=tkn-options&saved=true");								
				die;
			}
		}
		add_menu_page("Main Options", "Op&ccedil;&otilde;es da Homepage", 'edit_themes', 'tkn-options', 'tkn_index_options');
	}
	

	add_action('admin_menu', 'tkn_add_admin');
	add_action('admin_head', 'tkn_admin_head');	

?>