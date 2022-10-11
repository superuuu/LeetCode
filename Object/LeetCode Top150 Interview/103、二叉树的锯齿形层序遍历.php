<?php
/**
 * 给你二叉树的根节点 root ，返回其节点值的 锯齿形层序遍历 。（即先从左往右，再从右往左进行下一层遍历，以此类推，层与层之间交替进行）。
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
class Solution103 {
    // 0925 复习

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {
        if ($root == null) {
            return [];
        }
        $res = [];
        $level = 0;
        $queue = new SplQueue();
        $queue->enqueue($root);
        while ($count = $queue->count()) {
            $curLevel = [];
            for ($i=0; $i<$count; $i++) {
                $node = $queue->dequeue();
                if(($level & 1) == 0) {
                    array_push($curLevel, $node->val);
                }else{
                    array_unshift($curLevel, $node->val);
                }
                if($node->left != null) $queue->enqueue($node->left);
                if ($node->right != null) $queue->enqueue($node->right);
            }
            $res[] = $curLevel;
            $level++;
        }
        return $res;
    }
}