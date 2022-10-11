<?php
/**
 * 给你一个二叉树的根节点 root ，判断其是否是一个有效的二叉搜索树。

有效 二叉搜索树定义如下：

节点的左子树只包含 小于 当前节点的数。
节点的右子树只包含 大于 当前节点的数。
所有左子树和右子树自身必须也是二叉搜索树。

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
class Solution98 {
    // 0924 复习 思路：先排序再遍历判断升序

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
        // 中序遍历
        $sort = $this->sort($root);
        $len = count($sort);
        for ($i=0; $i<$len-1; $i++) {
            if ($sort[$i] >= $sort[$i+1]) {
                return false;
            }
        }
        return true;
    }

    function sort($root) {
        if ($root->val == null){
            return [];
        }
        $l = $this->sort($root->left);
        $m[] = $root->val;
        $r = $this->sort($root->right);
        return array_merge($l, $m, $r);
    }





    function isValidBST2($root) {
        return $this->doIt($root, null, null);
    }

    function doIt($root, $max, $min) {
        if($root == null) {
            return true;
        }
        if($max!=null && $root->val >= $max->val) {
            return false;
        }
        if($min!=null && $root->val <= $min->val) {
            return false;
        }
        return $this->doIt($root->left, $root, $min) && $this->doIt($root->right, $max, $root);
    }
}