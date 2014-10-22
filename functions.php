<?php

require_once("config.php");

function printTableBody($limit)
{
  global $db;

  if (!is_int($limit))
    return;

  $query = sprintf("SELECT t1.id, t2.title, COUNT(*) AS abandoned_times, COUNT(t1.quest_complete_time) AS completed_times, t1.core_hash, t1.core_revision " .
                   "FROM (SELECT id, quest_complete_time, core_hash, core_revision FROM 335_characters.quest_tracker WHERE quest_abandon_time IS NOT NULL) AS t1 " .
                   "JOIN (SELECT id, title FROM 335_world.quest_template) AS t2 " .
                   "ON t1.id = t2.id " .
                   "GROUP BY t1.id " .
                   "ORDER BY COUNT(*) DESC
                   LIMIT 0, %d",
                  $limit);

  $result = $db->query($query);

  if (!$result)
    die("Error querying: " . $query);

  while (($row = $result->fetch_array()) != null)
  {
    printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s <a href=\"https://github.com/TrinityCore/TrinityCore/commit/%s\">%s</a></td></tr>",
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
