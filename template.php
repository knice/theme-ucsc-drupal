<?php

function ucsc_form_system_site_information_settings_alter(&$form, &$form_state, $form_id) {
  $form["site_information"]["site_name"]["#description"] =
    "To insert a line break into your site title, use two consecutive spaces.";
}

function ucsc_form_alter(&$form, &$form_state, $form_id) {
  $sitename = "Search " . variable_get('site_name');
  $form['search_block_form']['#attributes']['placeholder'] = t($sitename);
}

?>
