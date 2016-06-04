<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueTeamPlayer extends AbstractMigration
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
            'projectteam_id',
            'person_id',
            'project_position_id',
            'active',
            'jerseynumber',
            'notes',
            'picture',
            'extended',
            'injury',
            'injury_date',
            'injury_end',
            'injury_detail',
            'injury_date_start',
            'injury_date_end',
            'suspension',
            'suspension_date',
            'suspension_end',
            'suspension_detail',
            'susp_date_start',
            'susp_date_end',
            'away',
            'away_date',
            'away_end',
            'away_detail',
            'away_date_start',
            'away_date_end',
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
