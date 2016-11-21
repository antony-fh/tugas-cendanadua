<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            	<?php foreach($menu_items as $menu_item => $value):?>   
            		<li<?php if($this->uri->segment(1) == $menu_item):?> class="active"><?php else:?>><?php endif;?><a href="<?=site_url($menu_item)?>"><?=$value?></a></li>
            	<?php endforeach;?>
          </ul>
</div>