<?php
// 297. 二叉树的序列化与反序列化  广度优先bfs
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

class Codec {
    function __construct() {

    }

    /**
     * @param TreeNode $root
     * @return String
     */
     // BFS
    function serialize($root) {
        if (!$root) {
            return '';
        };

        $queue = new SplQueue();
        $queue->enqueue($root);
        $result = [];

        while(!$queue->isEmpty()) {
            $node = $queue->dequeue();
            if ($node) {
                $result[] = $node->val;
                $queue->enqueue($node->left);
                $queue->enqueue($node->right);
            } else {
                $result[] = 'X';
            }

        }
        return implode(',', $result);


    }

    /**
     * 也是使用bfs
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data) {
        $n = strlen($data);
        if ($n == 0) return null;

        $data = explode(',', $data);
        $root = new TreeNode($data[0]);
        $queue = new SplQueue();
        $queue->enqueue($root);
        $index = 1;

        while(!$queue->isEmpty()){
            // 由于空节点也添加进了数组，所以数组内连续三个节点的顺序肯定是 父节点->左子节点-> 右子节点
            $node = $queue->dequeue();
            $val = $data[$index];

            if ($val != 'X'){
                $node->left = new TreeNode($val);
                $queue->enqueue($node->left);
            }
            $index++;
            $val = $data[$index];

            if ($val != 'X'){
                $node->right = new TreeNode($val);
                $queue->enqueue($node->right);
            }
            $index++;
        }
        return $root;
    }


}


//    1
//   / \
//  2   3
//     / \
//    4   5

// 测试
$a = new TreeNode(1);
$b = new TreeNode(2);
$c = new TreeNode(3);
$d = new TreeNode(4);
$e = new TreeNode(5);

$a->left = $b;
$a->right = $c;
$c->left = $d;
$c->right = $e;


$obj = new Codec;
$data = $obj->serialize($a);
echo $data;
// $ans = $obj->deserialize($data);

