<?php
/**
 * 给定一个二叉树，找出其最大深度。

二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。

说明: 叶子节点是指没有子节点的节点。

示例：
给定二叉树 [3,9,20,null,null,15,7]，

3
/ \
9  20
/  \
15   7
返回它的最大深度 3 。

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
class Solution104 {
    // 0925 复习

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if($root == null) {
            return 0;
        }
        $l = $this->maxDepth($root->left);
        $r = $this->maxDepth($root->right);
        return max($l, $r) + 1;
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth2($root) {
        if($root == null) {
            return 0;
        }
        $depth = 1;
        $pnodes = [$root];
        while($pnodes) {
            $nodes = [];
            foreach($pnodes as $pnode) {
                if($pnode->left) {
                    $nodes[] = $pnode->left;
                }
                if($pnode->right) {
                    $nodes[] = $pnode->right;
                }
            }
            if(!$nodes) return $depth;
            $pnodes = $nodes;
            $depth++;
        }
        return $depth;
    }

}