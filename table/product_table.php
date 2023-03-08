<?php

require "$CFG->libdir/tablelib.php";

class product_table_sql extends table_sql {
    function col_actions($row){

        if ($row) {
            $edit_url = new moodle_url('/local/catalog/edit.php', array('id' => $row->id));
            $edit_link = html_writer::link($edit_url, get_string('edit', 'local_catalog'));

            $delete_url = new moodle_url('/local/catalog/edit.php', array('id' => $row->id, 'action' => 'delete'));
            $delete_link = html_writer::link($delete_url, get_string('delete', 'local_catalog'));

            $actions = $edit_link . ' | ' . $delete_link;

            return $actions;
        }
        return "-";
    }
}