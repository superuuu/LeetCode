<?php
/**
 * 给你一个二叉树的根节点 root ， 检查它是否轴对称。
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
class Solution101 {
    // 0924 复习，递归注意判等节点的位置，是对称的l->l == r->r, l->r==r->l
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        if($root == null) {
            return true;
        }
        return $this->doIt($root->left, $root->right);
    }

    function doIt($l,$r) {
        if($l == null && $r == null) {
            return true;
        }
        if($l == null || $r == null) {
            return false;
        }
        if($l->val != $r->val) {
            return false;
        }
        return $this->doIt($l->left, $r->right) && $this->doIt($l->right, $r->left);
    }
}