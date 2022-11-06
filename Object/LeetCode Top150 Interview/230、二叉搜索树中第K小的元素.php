<?php
/**
 * 给定一个二叉搜索树的根节点 root ，和一个整数 k ，请你设计一个算法查找其中第 k 个最小元素（从 1 开始计数）。
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
 *
 * 中序遍历
 *
 */
class Solution230 {

    // 09.22 复习

    private $sort = [];
    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k) {
        $this->help($root);
        return $this->sort[$k-1];
    }

    function help($root) {
        if($root == null) {
            return;
        }
        $this->help($root->left);
        $this->sort[] = $root->val;
        $this->help($root->right);
    }
}