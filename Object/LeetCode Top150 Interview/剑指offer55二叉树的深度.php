<?php

/**
 * 输入一棵二叉树的根节点，求该树的深度。从根节点到叶节点依次经过的节点（含根、叶节点）形成树的一条路径，最长路径的长度为树的深度。
 * 例如：给定二叉树 [3,9,20,null,null,15,7]，
 * 
 * 返回它的最大深度 3
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
class Solution55_1 {

    /**
     * 递归
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if($root === null) {
            return 0;
        }
        $l = $this->maxDepth($root->left);
        $r = $this->maxDepth($root->right);
        return max($l, $r)+1;
    }
}

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution55_2 {
    private $arr = [];
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if($root === null) {
            return 0;
        }
        $this->help($root, 0);
        return count($this->arr);
    }

    function help($root, $level) {
        if($root === null) {
            return ;
        }
        $this->arr[$level][] = $root->val;
        $this->help($root->left, $level+1);
        $this->help($root->right, $level+1);
    }
}

// 非递归
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution_55_3 {
    private $arr = [];
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if($root === null) {
            return 0;
        }
        $len = 1;
        //$stack = new SplStack();
        //$stack->push($root);
        $arr = [$root];
        while($count = count($arr)){
            $curLevel = [];
            for($i=0; $i<$count; $i++){
                $curNode = $arr[$i];
                if($curNode->left) {
                    $curLevel[] = $curNode->left;
                }
                if($curNode->right) {
                    $curLevel[] = $curNode->right;
                }
            }
            if($curLevel) {
                $len++;
            }
            $arr = $curLevel;
        }
        return $len;
    }
}