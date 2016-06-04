<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueClub extends AbstractMigration
{
    /**
     * Change Method.
     */
    public function change()
    {
        $insert = array();
        $columns = array(
            'id',
            'name',
            'alias',
            'address',
            'zipcode',
            'location',
            'state',
            'country',
            'founded',
            'email',
            'website',
            'president',
            'logo_big',
            'logo_middle',
            'logo_small',
            'ordering'
        );
        $rows = $this->fetchAll('SELECT * FROM jos_joomleague_club');
        foreach ($rows as $row_id => $row) {
            foreach ($row as $key => $value) {
                if (in_array($key, $columns)) {
                    $insert[$row_id][$key] = $value;
                }
            }
            unset($insert[$row_id][0]);
        }

        $this->execute('TRUNCATE TABLE fcb_joomleague_club');
        $this->insert('fcb_joomleague_club', $insert);
    }
}
