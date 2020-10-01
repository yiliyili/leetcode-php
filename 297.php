<?php
// 297. 二叉树的序列化与反序列化
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}


class Codec {
    function __construct() {
        $data = [];
    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root) {
        if (!$root) {
            return '';
        }
        $this->_serializeData($root);
        return implode(',', $this->data);
    }
    //前序遍历,没有的就补充null
    private function _serializeData($root) {
        if ($root == null) {
            $this->data[] = 'null';
        } else {
            $this->data[] = $root->val;
            $this->_serializeData($root->left);
            $this->_serializeData($root->right);
        }
        // var_dump($this->data);
    }

    /**
     * 反序列化
     * @param String $data
     * @return TreeNode
     */
    public function deserialize($data) {
        if (!$data) {
            return null;
        }

        $arr = explode(',', $data);
        return $this->_buildTree($arr);
    }

    private function _buildTree(&$datas) {
        $val  = array_shift($datas);
        // var_dump($datas);
        if ($val == 'null') {
          return null;
        }

        $node = new TreeNode($val);
        $node->left = $this->_buildTree($datas);
        $node->right = $this->_buildTree($datas);

        return $node;
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
$ans = $obj->deserialize($data);
var_dump($ans);

