<?php
//leetcode221 最大正方形 
//两种方法
class Solution {

    function maximalSquare($matrix){
        $res = 0;
        $heights = [];
        for ($i=0; $i < count($matrix); $i++) {
            for ($j=0; $j < count($matrix[0]); $j++) { 
                if ($i == 0) {
                  $heights[$j] = $matrix[$i][$j] == 0 ? 0 : 1;//不是0就是1,第一行也不进行累加
                } else {
                  $heights[$j] = $matrix[$i][$j] == 0 ? 0 : (1 + $heights[$j]);//高度为0,不累加前边的
                }
            }
            // var_dump($heights);//第1,2,3...行能够积累到的最大高度
            $res = max($res, $this->area($heights));
        }
        return $res;
    }

    //单调栈
    function area($heights){
        array_push($heights, 0);//增加一个最小值,确保 $heights[$stack->top()] >= $heights[$i]时,所有元素都能弹出来,所有元素都是>=0的
        $stack = new SplStack;
        $max = 0;
        for ($i=0; $i < count($heights); $i++) { 
            // echo "第$i 轮 ";
            while(!$stack->isEmpty() && $heights[$stack->top()] >= $heights[$i]){
                $last = $stack->pop();
    // echo " 弹出的是$last";
                if (!$stack->isEmpty()) {
                    $width = $i-$stack->top()-1;
                   
                }else{
                    // echo " 没有元素了,width为 $i ";
                    $width = $i;
                }
                 // echo '高度'.$heights[$last] ;
                $value = min($heights[$last], $width);//正方形
                $max = max($max, $value*$value);
                // echo " 计算面积last $last ,对应height值为" .$heights[$last]. ",乘以width". $width. ',面积='. $heights[$last] * $width;
                
               
            }
            // echo " 放下标$i 入栈".'<br/>';
            $stack->push($i);
        }
        return $max;
    }

    //动态规划解法
    // dp(i, j) 是以 matrix(i - 1, j - 1) 为 右下角 的正方形的最大边长,矩阵下标从0开始
    function maximalSquare2($matrix) {
        if (empty($matrix)) return 0;
        $row = count($matrix);
        $col = count($matrix[0]);
        $dp = array_fill(0, $row, array_fill(0, $col, 0));
        $max = 0;
        for ($i = 1; $i <= $row; $i++) {
            for ($j = 1; $j <= $col; $j++) {
                if ($matrix[$i - 1][$j - 1] == '1') {
                    //一开始dp最左边1列和最上边1行都是0,因为dp无论哪一维度是0,对应的矩阵i-1,j-1就是-1是不存在的,即此时dp对应点的值初始化为0
                    $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]) + 1;//边长
                    $max = max($max, $dp[$i][$j]);//最大边长
                }
            }
        }

        return $max * $max;
    }
}

$matrix = [
    [1,0,1,0,1,1,1,1,1,1],
    [0,0,0,0,0,0,0,1,1,1],
    [1,0,1,0,1,1,0,1,1,1],
    [0,0,0,0,1,1,1,1,1,1],
    [1,0,1,0,1,1,1,1,1,1],
    [0,0,0,0,0,0,1,1,1,1],
    [1,0,1,0,1,1,1,1,1,1],
    [0,0,0,0,1,1,0,0,0,1],
];

echo '<pre>';

$solu = new Solution();
var_dump( $solu->maximalSquare($matrix));