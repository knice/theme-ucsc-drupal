
<!-- Default homepage template -->
<main id="main-content">

<?php if ($page["above_content"]): ?>
	<div class="row grid_12 above_content">
		<?php print render($page["above_content"]); ?>
	</div>
<?php endif; ?>


	<div class="row grid_12 three_column">
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

	<div class="row four_column">
		<div class="grid_3 alpha four_column_one">
			<?php print render($page["four_column_one"]); ?>
		</div>
		<div class="grid_3 four_column_two">
			<?php print render($page["four_column_two"]); ?>
		</div>
		<div class="grid_3 four_column_three">
			<?php print render($page["four_column_three"]); ?>
		</div>
		<div class="grid_3 omega four_column_four">
			<?php print render($page["four_column_four"]); ?>
		</div>
	</div>

<?php if($page["below_content"]): ?>
	<div class="row grid_12 below_content">
		<?php print render($page["below_content"]); ?>
	</div>
<?php endif; ?>

</main>
