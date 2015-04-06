# DEPRECATED - AS of v.5 ASKS has an installer. #

Currently there is not an install script, so the database has to be created manually.

3 tables:
games
players
scores

All columns are VARCHAR unless otherwise noted:
games:
-gameid
-gamename
-livespercredit
-gametype

players:


scores:
-scoreid
-score (int)
-gameid
-playerid
-date