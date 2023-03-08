<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');
class local_catalog_product_delete_form extends moodleform {

    /**
     * Define the form.
     */
    public function definition() {
        global $DB;

        $mform = $this->_form;

        $productid = $this->_customdata['productid'];
        $product = $DB->get_record('local_catalog_products', array('id' => $productid));

        $mform->addElement('html', '<p>'.get_string('deleteconfirmation', 'local_catalog', $product->title).'</p>');
        $mform->addElement('hidden', 'id', $productid);
        $mform->setType('id', PARAM_INT);

        $this->add_action_buttons(false, get_string('delete', 'local_catalog'));
    }
}

