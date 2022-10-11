<?php
/**
 * 给定两个整数数组 preorder 和 inorder ，其中 preorder 是二叉树的先序遍历， inorder 是同一棵树的中序遍历，请构造二叉树并返回其根节点。
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
class Solution {

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        if(!$preorder || !$inorder) {
            return null;
        }
        $tree = new TreeNode($preorder[0]);
        // 根据根节点，从中序数组中找到根节点，划分左右子树
        $midIndex = 0;
        while($inorder[$midIndex] != $preorder[0]) $midIndex++;
        $tree->left = $this->buildTree(array_slice($preorder,1,$midIndex+1), array_slice($inorder,0,$midIndex));
        $tree->right = $this->buildTree(array_slice($preorder,$midIndex+1), array_splice($inorder, $midIndex+1));
        return $tree;
    }
}