<?php
/**
 * 给你二叉树的根节点 root ，返回其节点值的 层序遍历 。 （即逐层地，从左到右访问所有节点）。
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
class Solution102 {
    // 0924 复习，注意递归调用时层序的+1
    private $result = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if($root == null) {
            return [];
        }
        $this->doIt($root, 0);
        return $this->result;
    }

    function doIt($root, $level){
        if($root == null) return;
        $this->result[$level][] = $root->val;
        $this->doIt($root->left, $level+1);
        $this->doIt($root->right, $level+1);
    }
}