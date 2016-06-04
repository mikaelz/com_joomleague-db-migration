# Joomleague database tables migration

Uses [Phinx](https://github.com/robmorgan/phinx) to migrate data

Just copy files from db/ in Phinx project

```
composer require robmorgan/phinx
```
Update database credentials in `phinx.yml`
```
php vendor/bin/phinx init
```
Copy files from this repos db/ dir to the initiated one
```
php vendor/bin/phinx migrate

Phinx by Rob Morgan - https://phinx.org. version 0.5.3

using config file ./phinx.yml
using config parser yaml
using migration path /srv/http/joomleague/db/migrations
using seed path /srv/http/joomleague/db/seeds
warning no environment specified, defaulting to: development
using adapter mysql
using database joomleague

 == 20160604123452 JoomleagueEventtype: migrating
 == 20160604123452 JoomleagueEventtype: migrated 0.0230s

 == 20160604123536 JoomleagueClub: migrating
 == 20160604123536 JoomleagueClub: migrated 0.0399s

 == 20160604124115 JoomleagueLeague: migrating
 == 20160604124115 JoomleagueLeague: migrated 0.0196s

 == 20160604124314 JoomleagueMatch: migrating
 == 20160604124314 JoomleagueMatch: migrated 1.1430s

 == 20160604124559 JoomleagueMatchEvent: migrating
 == 20160604124559 JoomleagueMatchEvent: migrated 0.1765s

 == 20160604124935 JoomleagueMatchPlayer: migrating
 == 20160604124935 JoomleagueMatchPlayer: migrated 0.6342s

 == 20160604125514 JoomleagueMatchStatistic: migrating
 == 20160604125514 JoomleagueMatchStatistic: migrated 0.7223s

 == 20160604125657 JoomleaguePerson: migrating
 == 20160604125657 JoomleaguePerson: migrated 0.0895s

 == 20160604125945 JoomleaguePosition: migrating
 == 20160604125945 JoomleaguePosition: migrated 0.0197s

 == 20160604130335 JoomleaguePositionStatistic: migrating
 == 20160604130335 JoomleaguePositionStatistic: migrated 0.0297s

 == 20160604131015 JoomleagueProject: migrating
 == 20160604131015 JoomleagueProject: migrated 0.0296s

 == 20160604131443 JoomleagueProjectPosition: migrating
 == 20160604131443 JoomleagueProjectPosition: migrated 0.0296s

 == 20160604131545 JoomleagueProjectTeam: migrating
 == 20160604131545 JoomleagueProjectTeam: migrated 0.0997s

 == 20160604132018 JoomleagueRound: migrating
 == 20160604132018 JoomleagueRound: migrated 0.1131s

 == 20160604132119 JoomleagueSeason: migrating
 == 20160604132119 JoomleagueSeason: migrated 0.0196s

 == 20160604132222 JoomleagueSportsType: migrating
 == 20160604132222 JoomleagueSportsType: migrated 0.0198s

 == 20160604132321 JoomleagueStatistic: migrating
 == 20160604132321 JoomleagueStatistic: migrated 0.0298s

 == 20160604132518 JoomleagueTeam: migrating
 == 20160604132518 JoomleagueTeam: migrated 0.0197s

 == 20160604132620 JoomleagueTeamPlayer: migrating
 == 20160604132620 JoomleagueTeamPlayer: migrated 0.2255s

All Done. Took 3.4983s

```
