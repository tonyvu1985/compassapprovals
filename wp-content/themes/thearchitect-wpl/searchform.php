<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div>
		<input type="text" value="<?php _e('Search for...', 'thearchitect-wpl'); ?>" name="s" id="s" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
		<input type="submit" id="searchsubmit" value="<?php _e('Search', 'thearchitect-wpl'); ?>" />
	</div>
</form>
