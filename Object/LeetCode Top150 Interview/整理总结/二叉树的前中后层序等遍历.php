<?php
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
class SolutionAll
{
    private $res = [];


    /**
     * 前序遍历 迭代
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        if($root === null){
            return [];
        }
        $res = [];
        $stack = new SplStack();
        $cur = $root;
        while($stack->count() || $cur) {
            while($cur) {
                $res[] = $cur->val;
                $stack->push($cur);
                $cur = $cur->left;
            }
            $cur = $stack->pop();
            $cur = $cur->right;
        }
        return $res;
    }
    /**
     * 前序遍历 迭代2
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal2($root) {
        if($root === null) {
            return [];
        }
        $res = [];
        $stack = new SplStack();
        $stack->push($root);
        while($stack->count()){
            $node = $stack->pop();
            $res[] = $node->val;
            if($node->right) {
                $stack->push($node->right);
            }
            if($node->left) {
                $stack->push($node->left);
            }
        }
        return $res;
    }

    /**
     * 前序遍历 递归
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal1($root) {
        if($root == null) {
            return [];
        }
        $this->help1($root);
        return $this->res;
    }
    function help1($root){
        if($root == null) {
            return;
        }
        $this->res[] = $root->val;
        $this->help($root->left);
        $this->help($root->right);
    }

    /**
     * 中序遍历 迭代
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        if($root == null){
            return [];
        }
        $res = [];
        $stack = new SplStack();
        $cur = $root;
        while($stack->count() || $cur){
            while($cur) {
                $stack->push($cur);
                $cur = $cur->left;
            }
            $cur = $stack->pop();
            $res[] = $cur->val;
            $cur = $cur->right;
        }
        return $res;
    }

    /**
     * 中序递归 递归
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal2($root) {
        if($root == null){
            return [];
        }
        $this->help($root);
        return $this->res;
    }
    function help($root){
        if($root===null){
            return;
        }
        $this->help($root->left);
        $this->res[] = $root->val;
        $this->help($root->right);
    }

    /**
     * 后序遍历 迭代
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal1($root) {
        if($root === null) {
            return [];
        }
        $res = [];
        $stack = new SplStack();
        $stack->push($root);
        while($stack->count()) {
            $node = $stack->pop();
            array_unshift($res, $node->val);
            //$res[] = $node->val;
            if($node->left) {
                $stack->push($node->left);
            }
            if($node->right) {
                $stack->push($node->right);
            }
        }
        return $res;
    }

    /**
     * 后序遍历 递归
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        if($root === null) {
            return [];
        }
        $res = [];
        $stack = new SplStack();
        $stack->push($root);
        while($stack->count()) {
            $node = $stack->pop();
            array_unshift($res, $node->val);
            //$res[] = $node->val;
            if($node->left) {
                $stack->push($node->left);
            }
            if($node->right) {
                $stack->push($node->right);
            }
        }
        return $res;
    }

    /**
     * 二叉树的层序遍历 递归
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if($root == null){
            return [];
        }
        $this->help3($root, 0);
        return $this->res;
    }
    function help3($root, $level){
        if($root === null ){
            return;
        }
        $this->res[$level][] = $root->val;
        $this->help($root->left, $level+1);
        $this->help($root->right, $level+1);
    }

    /**
     * 二叉树的层序遍历 迭代
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder2($root){
        if($root == null){
            return [];
        }
        $res = [];
        $quequ = new SplQueue();
        $quequ->enqueue($root);
        while($quequ->count()){
            $curLevel = [];
            $count = $quequ->count();
            for($i=0; $i<$count; $i++){
                $node = $quequ->dequeue();
                $curLevel[] = $node->val;
                if($node->left) {
                    $quequ->enqueue($node->left);
                }
                if($node->right) {
                    $quequ->enqueue($node->right);
                }
            }
            $res [] = $curLevel;
        }
        return $res;
    }
}