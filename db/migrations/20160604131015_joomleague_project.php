<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueProject extends AbstractMigration
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
            'name',
            'alias',
            'league_id',
            'season_id',
            'master_template',
            'sub_template_id',
            'extension',
            'project_type',
            'teams_as_referees',
            'sports_type_id',
            'start_date',
            'start_time',
            'current_round_auto',
            'current_round',
            'auto_time',
            'game_regular_time',
            'game_parts',
            'halftime',
            'points_after_regular_time',
            'use_legs',
            'allow_add_time',
            'add_time',
            'points_after_add_time',
            'points_after_penalty',
            'fav_team',
            'fav_team_color',
            'fav_team_text_color',
            'template',
            'enable_sb',
            'sb_catid',
            'extended',
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
