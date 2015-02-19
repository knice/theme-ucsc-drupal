
<!-- Default homepage template -->

<?php if ($page["above_content"]): ?>
	<div id="above-content" class="grid_12">
		<?php print render($page["above_content"]); ?>
	</div>
	<div class="clear"></div>
<?php endif; ?>

<div class="grid_12">
	<div id="three_column">
		<div class="grid_4 alpha" id="three_column_one">
			<?php print render($page["three_column_one"]); ?>
		</div>
		<div class="grid_4" id="three_column_two">
			<?php print render($page["three_column_two"]); ?>
		</div>
		<div class="grid_4 omega" id="three_column_three">
			<?php print render($page["three_column_three"]); ?>
		</div>
	</div>
	<div class="clear"></div>

	<div id="four_column">
		<div class="grid_3 alpha" id="four_column_one">
			<?php print render($page["four_column_one"]); ?>
		</div>
		<div class="grid_3" id="four_column_two">
			<?php print render($page["four_column_two"]); ?>
		</div>
		<div class="grid_3" id="four_column_three">
			<?php print render($page["four_column_three"]); ?>
		</div>
		<div class="grid_3 omega" id="four_column_four">
			<?php print render($page["four_column_four"]); ?>
		</div>
	</div>
</div>

<?php if($page["below_content"]): ?>
	<div class="clear"></div>
	<div id="below-content" class="grid_12">
		<?php print render($page["below_content"]); ?>
	</div>
<?php endif; ?>