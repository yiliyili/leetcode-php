<?php
class TrieNode
{
    public $char;
    public $is_end = false;//是不是一个单词的结束
    public $children;

    public function __construct()
    {
        $this->children = [];
    }
}
// 208. 实现 Trie (前缀树)
class Trie
{
    public $root;
    /**
     * Initialize your data structure here.
     * @github https://github.com/yumindayu/leetcode-php
     */
    public function __construct()
    {
        $this->root = new TrieNode();
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    // 更好的C:\myshop\daimapianduan\phpalgo\leetcode208.php
    public function insert($word)
    {
        // apple
        // app
        $root = $this->root;
        for ($i = 0; $i < strlen($word); $i++) {
            if (!isset($root->children[$word[$i]])) {//有没有这个字符
                $root->children[$word[$i]]       = new TrieNode();
                $root->children[$word[$i]]->char = $word[$i];
            }
            //其实可以拿到循环外做判断
            if ($i == strlen($word) - 1) {
                $root->children[$word[$i]]->is_end = true;//这个字符是单词结尾
            }
            $root = $root->children[$word[$i]];//移动到下一个节点
        }
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    public function search($word)
    {
        // apple
        $root = $this->root;
        return $this->_search($root, $word);
    }

    //复杂,题解中有更简单方式
    public function _search($root, $word)
    {
        if ($word == "") {
            return false;
        }
        for ($i = 0; $i < strlen($word); $i++) {
            if (isset($root->children[$word[$i]])) {
                if (strlen($word) == 1 && $root->children[$word[$i]]->is_end == true) {
                    return true;
                }
                return $this->_search($root->children[$word[$i]], substr($word, $i + 1));
            }
        }
        return true;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    public function startsWith($prefix)
    {
        //app
        $this->_check($this->root, $prefix);
    }

    public function _check($root, $prefix)
    {
        for ($i = 0; $i < strlen($prefix); $i++) {
            if (isset($root->children[$word[$i]])) {
                return $this->_check($root->children[$word[$i]], substr($prefix, $i + 1));
            }
            return false;
        }
        return true;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */
