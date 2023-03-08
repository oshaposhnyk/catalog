<?php

namespace classes;
class product extends \core\persistent {

    /** Table name for the persistent. */
    const TABLE = 'local_catalog_products';

    /**
     * Return the definition of the properties of this model.
     *
     * @return array
     */
    protected static function define_properties() {
        $properties = array(
                'id' => array(
                        'type' => PARAM_INT
                ),
                'title' => array(
                        'type' => PARAM_TEXT
                ),
                'description' => array(
                        'type' => PARAM_RAW
                ),
                'timestart' => [
                        'type' => PARAM_INT
                ],
                'timeend' => [
                        'type' => PARAM_INT
                ],
                'timecreated' => [
                        'type' => PARAM_INT
                ],
                'timemodified' => [
                        'type' => PARAM_INT
                ],
        );

        return $properties;
    }

}