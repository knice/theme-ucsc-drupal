
<!-- Internal page template -->

	<?php if ($breadcrumb != ""): ?>
	<div class="breadcrumbs" class="grid_12">
	<?php print render($breadcrumb); ?>
	</div>
	<?php endif; ?>


	<?php if ($page["sidebar_first"]) { ?>
		 <div class="grid_9 push_3">
	<?php } else { ?>
		<div class="grid_12">
	<?php } ?>

		<h1 class="page_title"><?php print $title; ?></h1>
	
	<?php if($page["above_content"]): ?>
	  <div class="above_content" class="grid_12">
	    <?php print render($page["above_content"]); ?>
	  </div>
	<?php endif; ?>


	<div class="content">
		<?php if ($show_messages && $messages): print render($messages); endif; ?>
		<?php if($page["help"]): print '<div class="help">' . render($page["help"]) . '</div>'; endif; ?>
		<?php print render($tabs); ?>
		<?php print render($action_links); ?>
		<?php print render($page["content"]); ?>
		<div class="clear"></div>
	</div>


	<?php if($page["below_content"]): ?>
	    <div class="below_content">
	        <?php print render($page["below_content"]); ?>
	        <div class="clear"></div>
	    </div>
	<?php endif; ?>

	</div>

	<?php if ($page["sidebar_first"]) { ?>
	<div class="grid_3 pull_9 left_content">
		<?php print render($page["sidebar_first"]); ?>
	</div>
	<?php } ?>
