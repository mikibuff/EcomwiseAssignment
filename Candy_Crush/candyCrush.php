<?php

class CandyCrush {
    //The howLong function takes in the array times and the initial position of the candy position.
    // It first initializes some variables to keep track of the leftmost and rightmost positions that the candy can reach, as well as the maximum time that the candy can stay alive.
    public function howLong($times, $position) {
        $n = count($times);
        $left = $position;
        $right = $position;
        $maxTime = 0;
        while ($left >= 0 || $right < $n) {
            if ($left >= 0 && $right < $n) {
                if ($times[$left] <= $times[$right]) {
                    $maxTime = max($maxTime, $times[$left]);
                    $left--;
                } else {
                    $maxTime = max($maxTime, $times[$right]);
                    $right++;
                }
            } elseif ($left >= 0) {
                $maxTime = max($maxTime, $times[$left]);
                $left--;
            } else {
                $maxTime = max($maxTime, $times[$right]);
                $right++;
            }
        }
        return $maxTime;
    }
}
//Then it enters a loop that continues until both the leftmost and rightmost positions are out of bounds less than 0 or greater than or equal to the length of times).
// At each iteration, it checks which of the two adjacent positions has a lower crush time, and moves the candy to that position while updating the maximum time accordingly. If one of the adjacent positions is out of bounds, the candy simply moves in the opposite direction.

//And at the end returns the maximum time that the candy can stay alive.

//Test Cases
$candy_crush = new CandyCrush();
//Test Case 1:
echo $candy_crush->howLong([1,2,3,4], 0) . "\n"; // Output: 4 CORRECT
//Test Case 2:
echo $candy_crush->howLong([1,2,10,4], 0) . "\n"; // Output: 10 CORRECT
//Test Case 3:
echo $candy_crush->howLong([10,1,3,4,7], 2) . "\n"; // Output: 10 should be 7
//Test Case 4:
echo $candy_crush->howLong([10,2,3,4,7], 2) . "\n"; // Output: 10 CORRECT
//Test Case 5:
echo $candy_crush->howLong([3,3,1,3,4,4,1,3], 7) . "\n"; // Output 4 should be 3
//Test Case 6:
echo $candy_crush->howLong([1,2,4,3,4,3,1,3,3,4], 1) . "\n"; // Output: 4 CORRECT
//Test Case 7:
echo $candy_crush->howLong([2,1,4,4,1,1,1,1,2,1], 6) . "\n"; // Output: 4 should be 1
//Test Case 8:
echo $candy_crush->howLong([950,501,913,2,636,287,753,5,126,1,305,2,712,3,1,5,4,26,715,532,2,4,98,3,296,4,184
,1,154,541,2,4,2,141,577,376,67,3,424,360,521,5,4,5,4,886,3,5,5,334], 28) . "\n"; // Output: 950 should be 541
//Test Case 9:
echo $candy_crush->howLong([2,4,2,4,803,1,996,855,682,3,2,5,1,5,225,3,4,5,49,189,3,328,5,494,863,390,2,1,810,4,
819,5,4,645,691,5,279,82,202,368,546,1,1,2,488,4,163,2,487,486], 12) . "\n"; // Output: 996 should be 225
// //Test Case 10:
echo $candy_crush->howLong([288,1,256,327,723,432,674,196,218,90,6,563,643,431,351,948,546,282,705,805,864
,229,99,499,865,986,218,961,434,12,338,255,91,797,406,519,242,329,578,220,912,866,702,412,456,430,702,688,397,222,792,153,155,784,957,413,401,167,76,586,429,306,124,498,136,258,152,752,660,136,160,378,771,358,861,296,658,988,173,740,350,879,32,362,597,125,345,2,193,420,417,51,808,195,169,50,703,505,327,579], 0) . "\n"; // Output: 988 Should be 288

