<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueMatchStatistic extends AbstractMigration
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
            'match_id',
            'projectteam_id',
            'teamplayer_id',
            'statistic_id',
            'value',
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
