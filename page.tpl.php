<?php

# If we have a custom CSS, add it.
$ucscv3_css_url = theme_get_setting("ucscv3_css_url");

if ($ucscv3_css_url != "") {
  drupal_add_css(
    $ucsc_css_url,
    array(
      "type" => "external",
    )
  );
}

?>

<div class="outer">
  <div class="wrap">
    <div class="container_12">

      <div class="row">

        <div class="grid_9 alpha">
          <ul class="utility_nav">
            <li class="home"><a href="http://www.ucsc.edu">University Home</a></li>
            <li><a href="http://my.ucsc.edu" title="Go to the MyUCSC portal">MyUCSC</a></li>
            <li><a href="http://www.ucsc.edu/tools/people.html" title="Find People - UCSC People Search">People</a></li>
            <li><a href="http://www.ucsc.edu/tools/calendars.html" title="View UCSC events, academic, and administrative calendars">Calendars</a></li>
            <li><a href="http://www.ucsc.edu/tools/azindex.html" title="A to Z index of important links">A-Z Index</a></li>
          </ul>
        </div>

        <div class="grid_3 omega search">
            <?php print render($page["search"]); ?>
        </div>

      </div>

      <div class="row grid_12">

        <a href="http://www.ucsc.edu" title="Go to UCSC homepage" class="logo"><?php require_once("partials/ucsc-logotype.svg"); ?></a>

        <?php
          ##  Determine site title class from the length of the title string.
          $site_name_length = strlen($site_name);

          if ($site_name_length >= 32) {
            $title_class = "small-type";
          } else {
            $title_class = "large-type";
          }

          $ucsc_site_name = preg_replace("/  /", "<br>", $site_name);
        ?>

        <h1 class="site_title <?php print $title_class; ?>">
            <?php echo l($ucsc_site_name, "<front>", array('attributes' => array('title' => t('Back to homepage')),'html' => TRUE));?>
        </h1>

      </div>

      <div class="row grid_12 alpha main_nav">
        <?php print render($page["main_menu"]); ?>
      </div>

<?php
// Logic to grab the appropriate template partial.
if ($is_front) {

  if (theme_get_setting("ucsc_frontpage_template") == "leftcol") {
    require_once("partials/page-home-left.tpl.php");
  } elseif (theme_get_setting("ucsc_frontpage_template") == "rightcol") {
    require_once("partials/page-home-right.tpl.php");
  } elseif (theme_get_setting("ucsc_frontpage_template") == "department") {
    require_once("partials/page-home-dept.tpl.php");
  } else {
    require_once("partials/page-home-default.tpl.php");
  }
} else {
  require_once("partials/page-internal.tpl.php");
};

?>


      <div class="row footer">

        <?php /* Set classes for footer divs */
          if ($page["footer"]) {
            // Links region is populated
            $footer_grid_class = "grid_7 pull_5";
          }
          else {
            // Links region is empty
            $footer_grid_class = "grid_12";
          }
        ?>

        <?php if($page["footer"]): ?>
          <div class="grid_5 push_7 footer_links">
            <?php print render($page["footer"]); ?>
          </div>
        <?php endif; ?>

        <div class="<?php print $footer_grid_class; ?> campus_info">
          <p>University of California Santa Cruz, 1156 High Street, Santa Cruz, CA 95064</p>
          <p>&copy; <?php print date("Y"); ?> The Regents of the University of California. All Rights Reserved.</p>
        </div>

      </div><!-- /.footer -->

      <div class="row legal">
        <p><a href="http://its.ucsc.edu/terms/">Privacy Policy and Terms of Use</a></p>
      </div>

    </div><!-- /.container_12 -->
  </div><!-- /.wrap -->
</div><!-- /.outer -->
