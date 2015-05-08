<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module; ?> inner">

<?php

if ($block->subject) {
  if ((substr($block->region, 0, 13) == "three_column_") or (substr($block->region, 0, 12) == "four_column_")) {
    if (strpos($block->subject, " ") > 0) {
      preg_match(
        "/^(.*) (.*)$/",
        $block->subject,
        $matches
      );

      $block_title =
        $matches[1] .
        " <span>" .
        $matches[2] .
        "</span>";
    } else {
      $block_title = $block->subject;
    }
  } else {
    $block_title = $block->subject;
  }

  echo "<h2 class=\"block-title\">" . $block_title . "</h2>\n";
}

?>

	<div class="block-content">
		<?php print $content; ?>
	</div>

</div>
