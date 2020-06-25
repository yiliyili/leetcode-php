<?php
// 22. 括号生成
class Solution
{

    /**
     * @param Integer $n
     * @return String[]

    给出 n 代表生成括号的对数，请你写出一个函数，使其能够生成所有可能的并且有效的括号组合。

    例如，给出 n = 3，生成结果为：
    [
    "((()))",
    "(()())",
    "(())()",
    "()(())",
    "()()()"
    ]
     */
    public $list = [];

    public function generateParenthesis($n)
    {
        $this->gen(0, 0, $n, "");
        return $this->list;
    }
    //在回溯的基础上进行剪枝
    private function gen($left, $right, $num, $result)
    {
        if ($left == $num && $right == $num) {
            array_push($this->list, $result);
            return;
        }
        //左括号有了几个
        if ($left < $num) {
            $this->gen($left + 1, $right, $num, $result . "(");
        }
        //左括号数目一定要大于右括号的时候,才可以加右括号,剪枝
        if ($right < $num && $left > $right) {
            $this->gen($left, $right + 1, $num, $result . ")");
        }
    }
}
