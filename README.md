# Oxbury Pathfind
Imagine representing a grid-shaped game map as a 2-dimensional array. Each value of this array is
boolean `true` or `false` representing whether that part of the map is passable (a floor) or blocked
(a wall).
Write a function that takes such a 2-dimensional array `A` and 2 vectors `P` and `Q`, with `0,0` being the top left corner of the map and returns the distance of the shortest path between those points, respecting the walls in the map.
eg. Given the map (where `.` is passable - `true`, and `#` is blocked - `false`)
```
. P . . .
. # # # .
. . . . .
. . Q . .
. . . . .
```

then `pathfind(A, P, Q)` should return `6`.

_Please avoid using libraries to implement the algorithmic side of this challenge, other libraries (such as PHPUnit or Jest for testing) are welcome._

## Comments Section
### What I'm Pleased With
The algorithm correctly computes the shortest path between two points and can handle relatively large maps without performance issues.
The code is well organised and the tests ensure correct functionality of the path finder script.
### What I Would Have Done With More Time
The tests could be more extensive so I would add more cases to the asserts and also add more tests for using the shortest-path script with arguments instead of just directly testing the path-finder.
The naming conventions used for functions and variables could get confusing if implemented into a larger codebase so I would modify those with scalability in mind.
