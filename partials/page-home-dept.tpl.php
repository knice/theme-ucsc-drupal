
<!-- Default homepage template -->

<?php if ($page["above_content"]): ?>
	<div class="grid_12 above_content">
		<?php print render($page["above_content"]); ?>
	</div>
	<div class="clear"></div>
<?php endif; ?>

<div class="grid_12">
	<div class="three_column">
		<div class="grid_4 alpha three_column_one">
			<?php print render($page["three_column_one"]); ?>
		</div>
		<div class="grid_4 three_column_two">
			<?php print render($page["three_column_two"]); ?>
		</div>
		<div class="grid_4 omega three_column_three">
			<?php print render($page["three_column_three"]); ?>
		</div>
	</div>
	<div class="clear"></div>

	<div class="three combined light">
		<div class="grid_4 alpha">
			<?php print render($page["dept_column_one"]); ?>
		</div>
		<div class="grid_4">
			<?php print render($page["dept_column_two"]); ?>
		</div>
		<div class="grid_4 omega">
			<?php print render($page["dept_column_three"]); ?>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php if($page["below_content"]): ?>
	<div class="clear"></div>
	<div class="grid_12 below_content">
		<?php print render($page["below_content"]); ?>
	</div>
<?php endif; ?>