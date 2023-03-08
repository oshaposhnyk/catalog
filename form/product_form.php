<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');
class local_catalog_product_form extends \core\form\persistent {

    protected static $persistentclass = 'classes\product';

    public function definition() {
        $mform = $this->_form;

        $mform->addElement('text', 'title', 'Product title:');
        $mform->setType('title', PARAM_TEXT);
        $mform->addRule('title', 'Title is required', 'required', null, 'client');

        $mform->addElement('textarea', 'description', 'Product description:');
        $mform->setType('description', PARAM_RAW);
        $mform->addRule('description', 'Description is required', 'required', null, 'client');

        $mform->addElement('date_time_selector', 'timestart', 'Start time:');
        $mform->addRule('timestart', 'Start time is required', 'required', null, 'client');

        $mform->addElement('date_time_selector', 'timeend', 'End time:');
        $mform->addRule('timeend', 'End time is required', 'required', null, 'client');

        $mform->addElement('hidden', 'action', '');
        $mform->setType('action', PARAM_TEXT);

        $mform->addElement('hidden', 'id', '');
        $mform->setType('id', PARAM_INT);

        $this->add_action_buttons(false, 'Save');
        $mform->addElement('submit', 'cancel', 'Cancel', array('onclick' => "window.location.href='". new moodle_url('/local/catalog/index.php') . "'; return false;"));
    }
}
