<?php
// 289. 生命游戏
class Solution
{
// 1 即为活细胞（live），或 0 即为死细胞（dead）
    /**
     * @param Integer[][] $board
     * @return NULL
     * @github https://github.com/yumindayu/leetcode-php
     */
    //不使用递归
    public function gameOfLife(&$board)
    {
        $m = count($board);
        $n = count($board[0]);
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                //0死细胞 变活 改成2
                //1活细胞 变死 改成3
                if ($board[$i][$j] == 0) {
                    $count = $this->checkLive($board, $i, $j, $m, $n);
                    if ($count == 3) {
                        $board[$i][$j] = 2;//改为活细胞状态
                    }
                } else {
                    $count = $this->checkLive($board, $i, $j, $m, $n);
                    if ($count < 2 || $count > 3) {
                        $board[$i][$j] = 3;
                    }
                }
            }
        }
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($board[$i][$j] == 2) {
                    $board[$i][$j] = 1;
                }
                if ($board[$i][$j] == 3) {
                    $board[$i][$j] = 0;
                }
            }
        }
    }

    public function checkLive($board, $row, $col, $m, $n)
    {
        $live_count = 0;
        $live_count += $this->count($board, $row - 1, $col, $m, $n);
        $live_count += $this->count($board, $row + 1, $col, $m, $n);
        $live_count += $this->count($board, $row, $col - 1, $m, $n);
        $live_count += $this->count($board, $row, $col + 1, $m, $n);
        $live_count += $this->count($board, $row - 1, $col - 1, $m, $n);
        $live_count += $this->count($board, $row + 1, $col - 1, $m, $n);
        $live_count += $this->count($board, $row - 1, $col + 1, $m, $n);
        $live_count += $this->count($board, $row + 1, $col + 1, $m, $n);
        return $live_count;
    }

    //改细胞是活细胞的数量
    public function count($board, $row, $col, $m, $n)
    {
        //不能超过范围
        if ($row < 0 || $row >= $m || $col < 0 || $col >= $n) {
            return 0;
        }
        //注意2表示原来的0,即原来依然是死细胞
        if ($board[$row][$col] == 0 || $board[$row][$col] == 2) {
            return 0;
        }

        return 1;
    }

}

$arr = [
  [0,1,0],
  [0,0,1],
  [1,1,1],
  [0,0,0]
];
var_dump($arr);
$solu = new Solution();
var_dump( $solu->gameOfLife($arr));
var_dump($arr);
