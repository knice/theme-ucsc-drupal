<?php

function ucscv3_form_system_site_information_settings_alter(&$form, &$form_state, $form_id) {
  $form["site_information"]["site_name"]["#description"] =
    "To insert a line break into your site title, use two consecutive spaces.";
}

function ucscv3_form_alter(&$form, &$form_state, $form_id) {
  $sitename = "Search " . variable_get('site_name');
  $form['search_block_form']['#attributes']['placeholder'] = t($sitename);
}


function ucscv3_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('Path to this page') . '</h2>';
    $crumbs = '<ul class="breadcrumb">';
    $array_size = count($breadcrumb);
    $i = 0;
    while ( $i < $array_size) {
      $crumbs .= '<li>' . $breadcrumb[$i] . '</li>';
      $i++;
    }
    $crumbs .= '</ul>';
    return $crumbs;
  }
}

?>
