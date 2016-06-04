<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueLeague extends AbstractMigration
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
            'short_name',
            'middle_name',
            'alias',
            'country',
            'extended',
            'ordering',
            'sports_type_id',
            'checked_out',
            'checked_out_time',
        );
        $rows = $this->fetchAll('SELECT * FROM jos_joomleague_league');
        foreach ($rows as $row_id => $row) {
            foreach ($row as $key => $value) {
                if (in_array($key, $columns)) {
                    $insert[$row_id][$key] = $value;
                }
            }
            unset($insert[$row_id][0]);
        }

        $this->execute('TRUNCATE TABLE fcb_joomleague_league');
        $this->insert('fcb_joomleague_league', $insert);
    }
}
