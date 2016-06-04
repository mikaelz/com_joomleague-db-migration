<?php

use Phinx\Migration\AbstractMigration;

class JoomleagueMatchEvent extends AbstractMigration
{
    /**
     * Change Method.
     */
    public function change()
    {
        $insert = array();
        $columns = array(
           'id',
           'match_id',
           'projectteam_id',
           'teamplayer_id',
           'teamplayer_id2',
           'event_time',
           'event_type_id',
           'event_sum',
           'notice',
           'notes',
           'checked_out',
           'checked_out_time',
        );
        $rows = $this->fetchAll('SELECT * FROM jos_joomleague_match_event');
        foreach ($rows as $row_id => $row) {
            foreach ($row as $key => $value) {
                if (in_array($key, $columns)) {
                    $insert[$row_id][$key] = $value;
                }
            }
            unset($insert[$row_id][0]);
        }

        $this->execute('TRUNCATE TABLE fcb_joomleague_match_event');
        $this->insert('fcb_joomleague_match_event', $insert);
    }
}
