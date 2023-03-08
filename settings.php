<?php

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_catalog', 'Manage Products');

    $settings->add(new admin_setting_heading('local_catalog_settings', '', get_string('local_catalog_settings', 'local_catalog')));

    $url = new moodle_url('/local/catalog/index.php');
    $link = html_writer::link($url, get_string('manageproducts', 'local_catalog'));

    $settings->add(new admin_setting_heading('local_catalog_manage_products', '', $link));

    $ADMIN->add('localplugins', $settings);
}
