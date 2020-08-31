<?php
// 17. 电话号码的字母组合
class Solution {

    
  public $res = [];

  public $str = "";

  public $array = [
      "2" => ["a","b","c"],
      "3" => ["d","e","f"],
      "4" => ["g","h","i"],
      "5" => ["j","k","l"],
      "6" => ["m","n","o"],
      "7" => ["p","q","r","s"],
      "8" => ["t","u","v"],
      "9" => ["w","x","y","z"],
    ];
  /**
   * @param String $digits
   * @return String[]
   
   输入："23"
   输出：["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"].

   */
  function letterCombinations($digits) {
    if (!$digits) return [];
    $this->_dfs($digits, 0);
    return $this->res;
  }
  //深度优先
  private function _dfs($digits, $step) {//走了多少步
    if ($step == strlen($digits)) {//说明已经找完了数字
      $this->res[] = $this->str;
      return;
    }

    $key = substr($digits, $step, 1);//取一个数字
    $chars = $this->array[$key];
    foreach ($chars as $v) {
      //这三行树标准化的写法
      $this->str .= $v;
      $this->_dfs($digits, $step + 1);  //标准化的+1,递推到下一个
      $this->str = substr($this->str, 0, strlen($this->str) - 1);//撤回刚才拼接的最后一个字符
    }
  }
}