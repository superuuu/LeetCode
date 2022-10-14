<?php
/**
 * 给定一个二叉树的根节点 root ，返回 它的 中序 遍历 。
 * 输入：root = [1,null,2,3]
输出：[1,3,2]
示例 2：

输入：root = []
输出：[]
示例 3：

输入：root = [1]
输出：[1]

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
class Solution94 {
    // 0924 复习，注意递归时先left、root、right顺序

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        if($root == null) {
            return [];
        }
        $l = $this->inorderTraversal($root->left);
        $m[] = $root->val;
        $r = $this->inorderTraversal($root->right);
        return array_merge($l,$m,$r);
    }
}

class Solution94_1 {

    private $data = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        if($root == null) {
            return [];
        }
        $this->inorderTraversal($root->left);
        $this->data[] = $root->val;
        $this->inorderTraversal($root->right);
        return $this->data;
    }
}

// 迭代 中序遍历，先左后跟再右
// 根节点入栈，然后一直寻找左节点，找到左节点后找左节点的左节点，直到为空
// 为空后，弹出栈顶节点元素，返回其值；压入节点右子节点
class Solution_94_3
{
    function inorderTraversal($root) {
        if($root === null){
            return [];
        }
        $res = [];
        $stack = new SplStack();
        //$stack->push($root);
        $cur = $root;
        while($cur || $stack->count()){
            if($cur != null){
                $stack->push($cur);
                $cur=$cur->left;
            }else{
                $cur = $stack->pop();
                $res[] = $cur->val;
                $cur = $cur->right;
            }
        }
        return $res;
    }
}