<?php
/**
 *
 * 给你一个 32 位的有符号整数 x ，返回将 x 中的数字部分反转后的结果。
 * 如果反转后整数超过 32 位的有符号整数的范围 [−231,  231 − 1] ，就返回 0。
 * 假设环境不允许存储 64 位整数（有符号或无符号）。
 *
 * 示例 1：
 * 输入：x = 123输出：321
 *

 * 示例 2：
 * 输入：x = -123
 * 输出：-321

 */

class Solution7 {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $x = strval($x);
        $minus = 1;
        if($x[0]=='-'){
            $minus = -1;
            $x = substr($x,1);
        }
        $len = strlen($x);
        $res = 0;
        for ($i=0; $i<$len; $i++) {
            $res += $x[$i] * pow(10,$i);
        }
        $res *= $minus;
        $max = pow(2,31)-1;
        $min = -pow(2,31);
        if ($res < $min) {
            return $min;
        }
        if ($res > $max) {
            return $max;
        }
        return $res;
    }
}