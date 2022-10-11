<?php
/**
 * 给你一个整数数组 nums ，其中元素已经按 升序 排列，请你将其转换为一棵 高度平衡 二叉搜索树。
 * 高度平衡 二叉树是一棵满足「每个节点的左右两个子树的高度差的绝对值不超过 1 」的二叉树。
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution108 {

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        return $this->help($nums, 0, count($nums)-1);
    }

    function help($nums, $left, $right) {
        if($left > $right) {
            return;
        }
        $mid = $left + round(($right-$left)/2);
        $tree = new TreeNode($nums[$mid]);
        $tree->left = $this->help($nums, $left, $mid-1);
        $tree->right = $this->help($nums, $mid+1, $right);
        return $tree;
    }
}