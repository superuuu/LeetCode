<?php
/**
 * 给定一个完美二叉树，其所有叶子节点都在同一层，每个父节点都有两个子节点。二叉树定义如下：

struct Node {
int val;
Node *left;
Node *right;
Node *next;
}
填充它的每个 next 指针，让这个指针指向其下一个右侧节点。如果找不到下一个右侧节点，则将 next 指针设置为 NULL。
初始状态下，所有next 指针都被设置为 NULL。
 */
/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution116 {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if(empty($root)) return $root;
        $queue = new SplQueue();
        $queue->enqueue($root);
        while(!$queue->isEmpty()) {
            $size = $queue->count();
            $pre = null;
            for ($i=0;$i<$size;$i++) {
                $item = $queue->dequeue();
                if ($item->left) {
                    $queue->enqueue($item->left);
                }
                if ($item->right) {
                    $queue->enqueue($item->right);
                }
                if ($pre == null) {
                    $pre = $item;
                } else{
                    $pre->next = $item;
                    $pre = $item;
                }
            }
            $pre->next = null;
        }
        return $root;
    }
}