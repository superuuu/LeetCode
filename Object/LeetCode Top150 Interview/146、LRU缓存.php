<?php
/**
 * 请你设计并实现一个满足  LRU (最近最少使用) 缓存 约束的数据结构。
实现 LRUCache 类：
LRUCache(int capacity) 以 正整数 作为容量 capacity 初始化 LRU 缓存
int get(int key) 如果关键字 key 存在于缓存中，则返回关键字的值，否则返回 -1 。
void put(int key, int value) 如果关键字 key 已经存在，则变更其数据值 value ；如果不存在，则向缓存中插入该组 key-value 。如果插入操作导致关键字数量超过 capacity ，则应该 逐出 最久未使用的关键字。
函数 get 和 put 必须以 O(1) 的平均时间复杂度运行。

 

示例：

输入
["LRUCache", "put", "put", "get", "put", "get", "put", "get", "get", "get"]
[[2], [1, 1], [2, 2], [1], [3, 3], [2], [4, 4], [1], [3], [4]]
输出
[null, null, null, 1, null, -1, null, -1, 3, 4]

解释
LRUCache lRUCache = new LRUCache(2);
lRUCache.put(1, 1); // 缓存是 {1=1}
lRUCache.put(2, 2); // 缓存是 {1=1, 2=2}
lRUCache.get(1);    // 返回 1
lRUCache.put(3, 3); // 该操作会使得关键字 2 作废，缓存是 {1=1, 3=3}
lRUCache.get(2);    // 返回 -1 (未找到)
lRUCache.put(4, 4); // 该操作会使得关键字 1 作废，缓存是 {4=4, 3=3}
lRUCache.get(1);    // 返回 -1 (未找到)
lRUCache.get(3);    // 返回 3
lRUCache.get(4);    // 返回 4

 */

class NodeStruct
{
    public $key;
    public $val;
    public $pre = null;
    public $next = null;

    function __construct($key=0, $value=0) {
        $this->key = $key;
        $this->val = $value;
    }
}

class DoubleNode
{
    private $head;
    private $tail;

    function __construct() {
        $this->head = new NodeStruct();
        $this->tail = new NodeStruct();

        $this->head->next = $this->tail;
        $this->tail->pre  = $this->head;
    }

    function delNode(NodeStruct $node) {
        $node->pre->next = $node->next;
        $node->next->pre = $node->pre;
    }

    function addToHead(NodeStruct $node) {
        $node->pre = $this->head;
        $node->next = $this->head->next;
        $this->head->next->pre = $node;
        $this->head->next = $node;
    }

    function delTail() {
        $this->tail->pre->next = null;
        $this->tail->pre = null;
    }

}

class LRUCache {
    private $size = 0;
    private $capacity = 0;
    private $map = [];
    private $doubleNode = null;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
        $this->doubleNode = new DoubleNode();
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if(isset($this->map[$key])) {
            $this->recently($this->map[$key]);
            return $this->map[$key]->val;
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if (!isset($this->map[$key])) {
            $newNode = new NodeStruct($key, $value);
            $this->doubleNode->addToHead($newNode);
            $this->map[$key] = $newNode;
            $this->size +=1;
            if($this->size > $this->capacity) {
                $this->doubleNode->delTail();
            }
            return;
        }
        $node = $this->map[$key];
        $node->value = $value;
        $this->recently($node);
    }

    function recently(NodeStruct $node) {
        $this->doubleNode->delNode($node);
        $this->doubleNode->addToHead($node);
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */

