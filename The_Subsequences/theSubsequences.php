<?php 
// TheSubsequences Class with a public method called count(), takes three integer parameters A, B, and C and returns an integer representing the count of numbers between A and B
class TheSubsequences {
    public function count(int $A, int $B, int $C): int {
        $count = 0;
        $cDigits = $this->split($C);
        for ($i = $A; $i <= $B; $i++) {
            $xDigits = $this->split($i);
            if ($this->isSubsequence($cDigits, $xDigits)) {
                $count++;
            }
        }
        return $count;
    }
    //The split() method takes an integer n and returns an array of its digits as strings.
    //converts n to a string, then uses the str_split() function to split the string into an array of characters
    
    private function split(int $n): array {
        return str_split((string) $n);
    }
    
    // The isSubsequence() method takes two arrays subseq and seq and returns a boolean value indicating whether subseq is a subsequence of seq.
    // It uses two pointers i and j to iterate over seq and subseq, and moves j only when it matches the current element of seq.
    private function isSubsequence(array $subseq, array $seq): bool {
        $n = count($subseq);
        $m = count($seq);
        $j = 0;
        for ($i = 0; $i < $m && $j < $n; $i++) {
            if ($subseq[$j] == $seq[$i]) {
                $j++;
            }
        }
        return $j == $n;
    }
}
//The count() method initializes a counter variable count to zero, splits C into an array of digits using the split() method, and then iterates over all integers between A and B inclusive.
// For each integer i, it splits i into an array of digits using the split() method and checks whether subseq is a subsequence of seq using the isSubsequence() method. If subseq is a subsequence of seq, it increments count. Finally, it returns count.

//Test Cases:
$theSubsequences = new TheSubsequences();

//Test Case 1:
$result = $theSubsequences->count(26,69,3);
echo $result; // outputs 13

//Test Case 2:
$result = $theSubsequences->count(11,100,4);
echo $result; // outputs 18

//Test Case 3:
$result = $theSubsequences->count(77,78,4);
echo $result; // outputs 0

//Test Case 4:
$result = $theSubsequences->count(13834,26066,1380);
echo $result; // outputs 14

//Test Case 5:
$result = $theSubsequences->count(1,1000000,1);
echo $result; // outputs 468560

//Test Case 6:
$result = $theSubsequences->count(25272, 31576, 757);
echo $result; // outputs 33

//Test Case 7:
$result = $theSubsequences->count(23059, 27967, 62);
echo $result; // outputs 383

//Test Case 8:
$result = $theSubsequences->count(6122, 30043, 8);
echo $result; // outputs 8674

//Test Case 9:
$result = $theSubsequences->count(10, 999999, 46);
echo $result; // outputs 114265

//Test Case 10:
$result = $theSubsequences->count(9, 6405, 95);
echo $result; // outputs 172

?>