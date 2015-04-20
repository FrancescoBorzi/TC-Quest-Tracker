<?php

require_once("config.php");

function printTableBody($limit)
{
  global $db, $characters_db, $world_db, $url;

  if (!is_int($limit))
    return;

  $query = sprintf("SELECT t1.id, t2.title, COUNT(t1.quest_abandon_time) AS abandoned_times, COUNT(t1.quest_complete_time) AS completed_times, t1.core_hash, t1.core_revision " .
                   "FROM (SELECT id, quest_abandon_time, quest_complete_time, core_hash, core_revision FROM %s.quest_tracker) AS t1 " .
                   "JOIN (SELECT id, title FROM %s.quest_template) AS t2 " .
                   "ON t1.id = t2.id " .
                   "GROUP BY t1.id " .
                   "HAVING abandoned_times > 0 " .
                   "ORDER BY COUNT(*) DESC " .
                   "LIMIT 0, %d",
                   $characters_db,
                   $world_db,
                   $limit);

  $result = $db->query($query);

  if (!$result)
    die("Error querying: " . $query);

  while (($row = $result->fetch_array()) != null)
  {
    printf("<tr><td><strong>%s</strong></td><td><a href=\"%s%s\">%s</a></td><td>%s</td><td>%s</td><td>%s <a href=\"https://github.com/TrinityCore/TrinityCore/commit/%s\">%s</a></td></tr>",
           $row['id'],
           $url,
           $row['id'],
           $row['title'],
           $row['abandoned_times'],
           $row['completed_times'],
           $row['core_revision'],
           substr($row['core_hash'], 0, -1),
           $row['core_hash']);
  }
}

?>
