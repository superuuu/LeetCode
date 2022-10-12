<?php

/**
 * 剑指 Offer 28. 对称的二叉树
 * 请实现一个函数，用来判断一棵二叉树是不是对称的。如果一棵二叉树和它的镜像一样，那么它是对称的。
 * 例如，二叉树 [1,2,2,3,4,4,3] 是对称的。

    1
   / \
  2   2
 / \ / \
3  4 4  3
但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:

    1
   / \
  2   2
   \   \
   3    3

 

示例 1：

输入：root = [1,2,2,3,4,4,3]
输出：true
示例 2：

输入：root = [1,2,2,null,3,null,3]
输出：false
 */

 /**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        if($root === null) {
            return true;
        }
        return $this->help($root->left, $root->right);
    }

    function help($l, $r) {
        if($l === null &&$r === null) {
            return true;
        }
        if($l === null || $r === null) {
            return false;
        }
        if($l->val != $r->val) {
            return false;
        }
        return $this->help($l->left, $r->right) &&$this->help($l->right, $r->left);
    }
}

// 还是递归，说实话，递归真香，哈哈哈