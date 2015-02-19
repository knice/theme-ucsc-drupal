<?php

function ucscv2_form_system_theme_settings_alter(&$form, &$form_state) {
  ################################################################################
  # basic UCSCv2 settings                                                        #
  ################################################################################

  $form["ucscv2"] = array(
    "#type" => "fieldset",
    "#title" => "UCSCv2 Settings",
    "#description" => "<p>These settings control the appearance and functionality of the UCSCv2 theme.</p>",
  );

    $form["ucscv2"]["ucscv2_frontpage_template"] = array(
    "#type" => "radios",
    "#title" => t("Choose a template to use for your home page."),
    "#default_value" => (theme_get_setting("ucscv2_frontpage_template") == "" ? "default" : theme_get_setting("ucscv2_frontpage_template")),
    "#options" => array(
      "default" => "Division",
      "department" => "Department",
      "leftcol" => "Left Column",
      "rightcol" => "Right Column",
      ),
      "#required" => true,
  );

  $form["ucscv2"]["ucscv2_google_cse"] = array(
    "#type" => "textfield",
    "#title" => t("Google Custom Search Engine ID"),
    "#default_value" => theme_get_setting("ucscv2_google_cse"),
  );

  $form["ucscv2"]["ucscv2_google_url"] = array(
    "#type" => "textfield",
    "#title" => t("Google Custom Search Engine URL"),
    "#default_value" => theme_get_setting("ucscv2_google_url"),
  );

  $form["ucscv2"]["ucscv2_css_url"] = array(
    "#type" => "textfield",
    "#title" => t("Supplementary CSS URL"),
    "#default_value" => theme_get_setting("ucscv2_css_url"),
  );

  ################################################################################
  # add a section to the theme settings page that controls which pages on the    #
  # site are full-width and which are fixed-width                                #
  ################################################################################

  $form["ucscv2"]["ucscv2_fixed_width_default"] = array(
    "#type" => "radios",
    "#title" => t("Show fixed width on specific pages"),
    "#default_value" => (theme_get_setting("ucscv2_fixed_width_default") == "" ? "all" : theme_get_setting("ucscv2_fixed_width_default")),
    "#options" => array(
      "all" => "All pages except those listed",
      "listed" => "Only the listed pages",
    ),
    "#required" => true,
  );

  $form["ucscv2"]["ucscv2_fixed_width_exceptions"] = array(
    "#type" => "textarea",
    "#title" => t("Site Width Exceptions"),
    "#default_value" => theme_get_setting("ucscv2_fixed_width_exceptions"),
    "#description" => "Specify pages by using their paths. Enter one path per line. The '*' character is a wildcard. Example paths are blog for the blog page and blog/* for every personal blog. <front> is the front page.",
  );

  ################################################################################
  # these fields control how the default drupal logo fields are mixed with the   #
  # ucscv2 logo link field                                                       #
  ################################################################################

  $form["logo"]["settings"]["logo_path"]["#weight"] = 9;

  $form["logo"]["settings"]["ucscv2_logo_link"] = array(
    "#type" => "textfield",
    "#title" => t("Optional URL for custom logo"),
    "#default_value" => theme_get_setting("ucscv2_logo_link"),
    "#weight" => 10,
  );

  $form["logo"]["settings"]["logo_upload"]["#weight"] = 11;

  return $form;
}

?>
