<?php
/**
 * 示例 1：

输入：x = 2.00000, n = 10
输出：1024.00000
示例 2：

输入：x = 2.10000, n = 3
输出：9.26100
示例 3：

输入：x = 2.00000, n = -2
输出：0.25000
解释：2-2 = 1/22 = 1/4 = 0.25
 

提示：

-100.0 < x < 100.0
-231 <= n <= 231-1
-104 <= xn <= 104

 *
 */

class Solution50 {
    // 0926 复习

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        return $n > 0 ? $this->help($x, $n) : 1/$this->help($x, $n);
    }

    function help($x, $n) {
        $n = abs($n);
        $result = 1.0;
        $base = $x;
        while($n){
            if($n % 2 == 1) {
                $result *= $base;
            }
            $base *= $base;
            $n = (int)$n/2;
        }
        return $result;
    }
}