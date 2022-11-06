<?php
/**
 * 给定一棵二叉搜索树，请找出其中第 k 大的节点的值。
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
         private $res = [];
        /**
         * @param TreeNode $root
         * @param Integer $k
         * @return Integer
         */
        function kthLargest($root, $k) {
            $this->help($root);
            $len=count($this->res);
            return $this->res[$len-$k];
        }
    
        function help($root){
            if($root ===null) {
                return [];
            }
            $this->help($root->left);
            $this->res[] = $root->val;
            $this->help($root->right);
        }
    }