<?php
/**
 * 给定一个数组 prices ，它的第i 个元素prices[i] 表示一支给定股票第 i 天的价格。
 * 你只能选择 某一天 买入这只股票，并选择在 未来的某一个不同的日子 卖出该股票。设计一个算法来计算你所能获取的最大利润。
 * 返回你可以从这笔交易中获取的最大利润。如果你不能获取任何利润，返回 0 。
 */

class Solution121 {

    /**
     * @param Integer[] $prices
     * @return Integer
     * 超时了
     */
    function maxProfit($prices) {
        $max = 0;
        $len = count($prices);
        for ($i=0;$i<$len;$i++) {
            for ($j=$i+1; $j<$len; $j++) {
                if($prices[$j]-$prices[$i] > $max) {
                    $max = $prices[$j]-$prices[$i];
                }
            }
        }
        return $max;
    }

    function maxProfit_2($prices) {
        $minPrice = $prices[0];
        $len = count($prices);
        $max = 0;
        for ($i=0; $i<$len; $i++) {
            $minPrice = $prices[$i] < $minPrice ? $prices[$i] : $minPrice;
            if ($prices[$i] - $minPrice > $max) {
                $max = $prices[$i] - $minPrice;
            }
        }
        return $max;
    }
}