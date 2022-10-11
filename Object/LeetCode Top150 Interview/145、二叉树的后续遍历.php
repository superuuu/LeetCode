<?php

/**
 * 145. 二叉树的后序遍历
 * 给你一棵二叉树的根节点 root ，返回其节点值的 后序遍历 。
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
    // 保存输出结果
    private $res = [];


    /**
     * 方法一：递归
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        if($root === null) {
            return [];
        }
        $this->help($root);
        return $this->res;
    }
    function help($root){
        if($root === null) {
            return [];
        }
        $this->help($root->left);
        $this->help($root->right);
        $this->res[] = $root->val;
    }

    /**
     * 方法二，借助栈实现
     */
    function postorderTraversal2($root) {
        if($root === null) {
            return [];
        }
        $res = [];
        $stack = new SplStack();
        $stack->push($root);
        while($stack->count()){
            $cur = $stack->pop();
            array_unshift($res, $cur->val);
            if($root->left !== null) {
                $stack->push($root->left);
            }
            if($root->right !== null) {
                $stack->push($root->right);
            }
        }
        return $res;
    }
}