<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueEventtype extends AbstractMigration
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
            'icon',
            'parent',
            'splitt',
            'direction',
            'double',
            'sports_type_id',
            'published',
            'ordering',
            'checked_out',
            'checked_out_time',
        );
        $rows = $this->fetchAll('SELECT * FROM jos_joomleague_eventtype');
        foreach ($rows as $row_id => $row) {
            foreach ($row as $key => $value) {
                if (in_array($key, $columns)) {
                    $insert[$row_id][$key] = $value;
                }
            }
            unset($insert[$row_id][0]);
        }

        $this->execute('TRUNCATE TABLE fcb_joomleague_eventtype');
        $this->insert('fcb_joomleague_eventtype', $insert);
    }
}
