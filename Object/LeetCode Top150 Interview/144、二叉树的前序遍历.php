<?php

/**
 * 144. 二叉树的前序遍历
 * 给你二叉树的根节点 root ，返回它节点值的 前序 遍历。
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
class Solution144 {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        if($root === null) {
            return [];
        }
        $res = [];
        $stack = new SplStack();
        $stack->push($root);
        while($stack->count()){
            $cur = $stack->pop();
            $res[] = $cur->val;
            if($cur->right!==null) {
                $stack->push($cur->right);
            }
            if($cur->left!==null){
                 $stack->push($cur->left);
            }
        }
        return $res;
    }

    private $res = [];

    function pre2($root){
        if($root === null) {
            return $this->res;
        }
        $this->help($root);
        return $this->res;
    }
    function help($root){
        if($root === null) {
            return [];
        }
        $this->res[] = $root->val;
        $this->help($root->left);
        $this->help($root->right);
    }
}