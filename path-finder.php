<?php

function shortestPath(array $A, array $P, array $Q) {
    $height = count($A);
    $width = count($A[0]);

    $startX = $P[0];
    $startY = $P[1];
    
    $endX = $Q[0];
    $endY = $Q[1];

     // Check if start and end vectors are integers
     if (!is_int($startX) || !is_int($startY) || !is_int($endX) || !is_int($endY)) {
        throw new Exception("Error: start_vector and end_vector values must be integers");
    }

    // Check if start and end vectors are within bounds
    if ($startX < 0 || $startY < 0 || $startX >= $width || $startY >= $height) {
        throw new Exception("Error: start_vector is out of bounds");
    }
    
    if ($endX < 0 || $endY < 0 || $endX >= $width || $endY >= $height) {
        throw new Exception("Error: end_vector is out of bounds");
    }
    
    $visited = array_fill(0, $height, array_fill(0, $height, false));
    $queue = array(array('x' => $P[0], 'y' => $P[1], 'distance' => 0));
  
    while (!empty($queue)) {
      $cell = array_shift($queue);
      $x = $cell['x'];
      $y = $cell['y'];
      $distance = $cell['distance'];
  
      if ($x === $Q[0] && $y === $Q[1]) {
        return $distance;
      }
  
      if ($visited[$x][$y]) {
        continue;
      }
  
      $visited[$x][$y] = true;
  
      // Check neighbors
      $neighbors = array(
        array('dx' => -1, 'dy' => 0),
        array('dx' => 1, 'dy' => 0),
        array('dx' => 0, 'dy' => -1),
        array('dx' => 0, 'dy' => 1)
      );
      foreach ($neighbors as $n) {
        $nx = $x + $n['dx'];
        $ny = $y + $n['dy'];
        if ($nx < 0 || $nx >= $height || $ny < 0 || $ny >= $height) {
          continue; // Out of bounds
        }
        if (!$A[$nx][$ny] || $visited[$nx][$ny]) {
          continue; // Wall or already visited
        }
        array_push($queue, array('x' => $nx, 'y' => $ny, 'distance' => $distance + 1));
      }
    }
  
    // No path found
    return -1;
  }