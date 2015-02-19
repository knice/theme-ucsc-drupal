<!-- Right column homepage template -->

	<div class="grid_9 alpha">

		<h1 id="page-title"><?php print $title; ?></h1>

		<?php if($page["above_content"]): ?>
		  <div id="above-content" class="grid_12">
		    <?php print render($page["above_content"]); ?>
		  </div>
		<?php endif; ?>
		<div id="content">
			<?php if ($show_messages && $messages): print render($messages); endif; ?>
			<?php if($page["help"]): print '<div class="help">' . render($page["help"]) . '</div>'; endif; ?>
			<?php print render($tabs); ?>
			<?php print render($action_links); ?>
			<?php print render($page["content"]); ?>
			<div class="clear"></div>
		</div>
		<?php if($page["below_content"]): ?>
		    <div id="below-content">
		        <?php print render($page["below_content"]); ?>
		        <div class="clear"></div>
		    </div>
		<?php endif; ?>
	</div>

	<div class="grid_3" id="right-content">
		<?php print render($page["sidebar_first"]); ?>
	</div>
