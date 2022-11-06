<?php
/**
 * 实现strStr()函数。

给你两个字符串haystack 和 needle ，请你在 haystack 字符串中找出 needle 字符串出现的第一个位置（下标从 0 开始）。如果不存在，则返回 -1 。

说明：

当needle是空字符串时，我们应当返回什么值呢？这是一个在面试中很好的问题。

对于本题而言，当needle是空字符串时我们应当返回 0 。这与 C 语言的 strstr()以及 Java 的indexOf()定义相符。

示例 1：

输入：haystack = "hello", needle = "ll"
输出：2
示例 2：

输入：haystack = "aaaaa", needle = "bba"
输出：-1

 *
 */

class Solution28
{
    public function deal($haystack, $needle)
    {
        $hLen = strlen($haystack);
        $nLen = strlen($needle);

        if (empty($needle)) {
            return 0;
        }
        if ($nLen > $hLen) {
            return -1;
        }
        // 这个+1 是精髓
        $times = $hLen-$nLen+1;
        for ($index=0; $index<$times; $index++) {
            $flag = true;
            for ($in=0; $in<$nLen; $in++){
                if ($haystack[$in+$index] == $needle[$in]) {
                    continue;
                }else{
                    $flag = false;
                }
            }
            if ($flag) {
                return $index;
            }
        }
        return -1;
    }

    // 还有一种kmp算法解法
}