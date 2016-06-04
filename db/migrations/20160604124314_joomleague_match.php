<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueMatch extends AbstractMigration
{
    /**
     * Change Method.
     */
    public function change()
    {
        $insert = array();
        $columns = array(
           'id',
           'round_id',
           'match_number',
           'projectteam1_id',
           'projectteam2_id',
           'playground_id',
           'match_date',
           'time_present',
           'team1_result',
           'team2_result',
           'team1_bonus',
           'team2_bonus',
           'team1_legs',
           'team2_legs',
           'team1_result_split',
           'team2_result_split',
           'match_result_type',
           'team_won',
           'team1_result_ot',
           'team2_result_ot',
           'team1_result_so',
           'team2_result_so',
           'alt_decision',
           'team1_result_decision',
           'team2_result_decision',
           'decision_info',
           'cancel',
           'cancel_reason',
           'count_result',
           'crowd',
           'summary',
           'show_report',
           'preview',
           'match_result_detail',
           'new_match_id',
           'old_match_id',
           'extended',
           'published',
           'modified',
           'modified_by',
           'checked_out',
           'checked_out_time',
        );
        $rows = $this->fetchAll('SELECT * FROM jos_joomleague_match');
        foreach ($rows as $row_id => $row) {
            foreach ($row as $key => $value) {
                if (in_array($key, $columns)) {
                    $insert[$row_id][$key] = $value;
                }
            }
            unset($insert[$row_id][0]);
        }

        $this->execute('TRUNCATE TABLE fcb_joomleague_match');
        $this->insert('fcb_joomleague_match', $insert);
    }
}
