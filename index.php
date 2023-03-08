<?php

require_once('../../config.php');
require "table/product_table.php";

$context = context_system::instance();
require_capability('local/catalog:manageproducts', $context);

$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/catalog/index.php'));
$PAGE->set_pagelayout('standard');
$PAGE->set_title($SITE->fullname);

$table = new product_table_sql('unique_id', 'local_catalog_products_table');

$table->define_baseurl(new moodle_url('/local/catalog/index.php'));

$table->set_sql('*', '{local_catalog_products}', '1=1');
$table->define_columns(array(
        'id',
        'title',
        'timecreated',
        'actions'
));
$table->define_headers(array(
        get_string('id', 'local_catalog'),
        get_string('producttitle', 'local_catalog'),
        get_string('createdat', 'local_catalog'),
        get_string('actions', 'local_catalog')

));
$table->sortable(true, 'id', SORT_ASC);

$table->no_sorting('actions');


$table->column_class('id', 'align-center');
$table->column_class('timecreated', 'align-center');
$table->column_class('actions', 'align-center');



$table->setup();


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('producttable', 'local_catalog'));
echo $table->out(25, true);
echo html_writer::link(new moodle_url('/local/catalog/edit.php', array('action' => 'create')), get_string('addproduct', 'local_catalog'), array('class' => 'btn btn-primary'));
echo $OUTPUT->footer();
