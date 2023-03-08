<?php

use classes\product;

require_once('../../config.php');
require_once('classes/product.php');
require_once('form/product_form.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/catalog/edit.php'));
$PAGE->set_pagelayout('standard');
$PAGE->set_title($SITE->fullname);

$action = optional_param('action', null, PARAM_TEXT);
$id = optional_param('id', null, PARAM_INT);
$product = new product($id);


$customdata = [
        'persistent' => $product,  // An instance, or null.
        'userid' => $USER->id         // For the hidden userid field.
];
$productForm = new local_catalog_product_form($PAGE->url->out(false), $customdata);


if (($data = $productForm->get_data())) {

    if (empty($data->id)) {
        $PAGE->set_heading(get_string('addproduct', 'local_catalog'));

        $product = new product(0, $data);
        $product->create();
    } else {
        $product->from_record($data);
        $product->update();
    }

    // We are done, so let's redirect somewhere.
    redirect(new moodle_url('/local/catalog/index.php'));
}

if ($action == 'delete') {
    $product->delete();
    redirect(new moodle_url('/local/catalog/index.php'));
}


echo $OUTPUT->header();
$productForm->display();
echo $DB->get_last_error();
echo $OUTPUT->footer();
