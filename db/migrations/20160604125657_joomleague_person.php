<?php

use Phinx\Migration\AbstractMigration;

class JoomleaguePerson extends AbstractMigration
{
    /**
     * Change Method.
     */
    public function change()
    {
        $table = strtolower(preg_replace('/[A-Z]/', '_$0', get_class($this)));
        $insert = array();
        $columns = array(
            'id',
            'firstname',
            'lastname',
            'nickname',
            'alias',
            'country',
            'knvbnr',
            'birthday',
            'height',
            'weight',
            'picture',
            'show_pic',
            'show_persdata',
            'show_teamdata',
            'show_on_frontend',
            'info',
            'notes',
            'phone',
            'mobile',
            'email',
            'website',
            'address',
            'zipcode',
            'location',
            'state',
            'address_country',
            'extended',
            'position_id',
            'published',
            'ordering',
            'checked_out',
            'checked_out_time',
        );
        $rows = $this->fetchAll('SELECT * FROM jos'.$table);
        foreach ($rows as $row_id => $row) {
            foreach ($row as $key => $value) {
                if (in_array($key, $columns)) {
                    $insert[$row_id][$key] = $value;
                }
            }
            unset($insert[$row_id][0]);
        }

        $this->execute('TRUNCATE TABLE fcb'.$table);
        $this->insert('fcb'.$table, $insert);
    }
}
