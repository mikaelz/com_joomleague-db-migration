<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueProjectTeam extends AbstractMigration
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
            'project_id',
            'team_id',
            'division_id',
            'start_points',
            'points_finally',
            'neg_points_finally',
            'matches_finally',
            'won_finally',
            'draws_finally',
            'lost_finally',
            'homegoals_finally',
            'guestgoals_finally',
            'diffgoals_finally',
            'is_in_score',
            'use_finally',
            'info',
            'picture',
            'notes',
            'standard_playground',
            'reason',
            'extended',
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
