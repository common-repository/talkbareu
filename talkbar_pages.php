<div class="wrap" style="float: left;">
<div class="icon32" id="icon-options-general"><br/></div><h2>Param&egrave;tres pour l'int&eacute;gration de TalkBar.eu</h2>
<p>Sur cette page, vous pouvez activ&eacute; ou non l'extension <strong>TalkBar.eu</strong> et choisir si oui ou non vous voulez d&eacute;finir un pseudonyme par d&eacute;faut.</p>
<form method="post" action="options.php">
<?php

// New way of setting the fields, for WP 2.7 and newer
if(function_exists('settings_fields'))
{
	settings_fields('talkbar-options');
}
else
{

wp_nonce_field('update-options');

?>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="talkbar_activation,talkbar_mode,talkbar_mode_pseudo" />

<?php

}

?>

<br />

<table class="form-table">
<tr>
<th>Activ&eacute;</th>
<td>
<input type="radio" value="oui" <?php if (get_option('talkbar_activation') == 'oui' || !get_option('talkbar_activation')) echo 'checked="checked"'; ?> name="talkbar_activation" id="talkbar_activation_oui" group="talkbar_activation"/>
<label for="talkbar_activation_oui">Oui</label>&nbsp;
<input type="radio" value="non" <?php if (get_option('talkbar_activation') == 'non') echo 'checked="checked"'; ?> name="talkbar_activation" id="talkbar_activation_non" group="talkbar_activation" />
<label for="talkbar_activation_non">Non</label>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<th scope="row" valign="top">
Pseudonyme de la TalkBar
</th>
<td>
<select name="talkbar_mode">
<option <?php if (get_option('talkbar_mode') == 'libre') echo 'selected="selected"'; ?> value="libre">Libre</option>
<option <?php if (get_option('talkbar_mode') == 'perso') echo 'selected="selected"'; ?> value="perso">Personnalis&eacute;</option>
</select>
<span class="description">Si vous s&eacute;lectionn&eacute; <strong>Personnalis&eacute;</strong>, vous devrez saisir un pseudonyme.</span>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<th scope="row" valign="top">
<label for="talkbar_mode_pseudo">Pseudonyme par <strong>d&eacute;faut</strong></label>
</th>
<td>
<input type="text" value="<?php echo get_option('talkbar_mode_pseudo'); ?>" name="talkbar_mode_pseudo" id="talkbar_mode_pseudo" />
<span class="description">Ne remplissez ce champ seulement si vous avez s&eacute;lectionn&eacute; <strong>Personnalis&eacute;</strong>.<br />Ajouter un di&egrave;se pour ajouter un nombre al&eacute;atoire entre 100 et 999 (ex: guest-# : guest-007).</span>
</td>
</tr>
</table>

<br />

<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" /></p>

</form>
</div>

<div class="wrap" style="float: right; width: 400px; border-left: 1px solid #C6C6C6; border-right: 1px solid #C6C6C6; border-bottom: 1px solid #C6C6C6; padding: 0 20px 20px 20px;">
<div class="icon32" id="icon-users"><br/></div><h2>Faire un don ?</h2>
<p>Pour contribuer au d&eacute;veloppement de plugin Wordpress et de service Web, vous pouvez faire un don &agrave; <a href="http://www.devence.com/" target="_blank">Devence.com</a>.</p>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="LJH8HCXKKZM9A">
<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus s&eacute;curis&eacute;e !">
<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>

<br />

<a href="http://www.devence.com/" target="_blank">Devence.com</a><br />
<a href="http://www.maxence-blog.fr/" target="_blank">Le Blog de Maxence</a><br />
<a href="http://www.talkbar.eu/fr/?talkbar_plugin_wordpress" target="_blank">TalkBar.eu</a><br />

</div>