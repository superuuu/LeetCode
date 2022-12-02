<?php
/**
 * 给定一个 n叉树的根节点root，返回 其节点值的 后序遍历 。
 * n 叉树 在输入中按层序遍历进行序列化表示，每组子节点由空值 null 分隔（请参见示例）。
 * 输入：root = [1,null,3,2,4,null,5,6]
 * 输出：[5,6,3,2,4,1]
 */

/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution590 {
    private $res = [];
    /**
     * @param Node $root
     * @return integer[]
     */
    function postorder($root) {
        if(!$root) {
            return $this->res;
        }
        $this->help($root);
        return $this->res;
    }

    function help($root) {
        if(!$root) return;
        foreach($root->children as $child) {
            $this->help($child);
        }
        $this->res[] = $root->val;
    }

    /**
     * @desc 迭代搞起来
     * @param Node $root
     * @return integer[]
     */
    function postorder2($root) {
        if(!$root) {
            return $this->res;
        }
        $stack = [];
        array_push($stack, $root);
        while($stack){
            $node = array_pop($stack);
            array_unshift($this->res, $node->val);
            foreach($node->children as $child) {
                array_push($stack, $child);
            }
        }
        return $this->res;
    }
}