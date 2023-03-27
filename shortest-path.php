<?php
require_once 'path-finder.php';
// Define the map
$map = array(
  array(true, true, true, true, true),
  array(true, false, false, false, true),
  array(true, true, true, true, true),
  array(true, true, true, true, true),
  array(true, true, true, true, true)
);

// Get the start vector and end vector from command line arguments
if (count($argv) !== 3) {
    echo "Usage: php shortest-path.php start_vector end_vector\n";
    exit();
  }
  
  $start_string = $argv[1];
  $end_string = $argv[2];
  
  // Validate the start and end vectors
  $start = explode(',', $start_string);
  $end = explode(',', $end_string);
  
  if (count($start) !== 2 || count($end) !== 2) {
    echo "Error: start_vector and end_vector must be in the format x,y\n";
    exit();
  }
  
  $start[0] = (int) $start[0];
  $start[1] = (int) $start[1];
  $end[0] = (int) $end[0];
  $end[1] = (int) $end[1];
  
  // Find the shortest path between the start and end vectors
  $distance = shortestPath($map, $start, $end);

if ($distance !== -1) {
  echo "Shortest distance: $distance\n";
} else {
  echo "No path found\n";
}
