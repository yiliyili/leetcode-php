<?php
//leetcode221 最大正方形
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

    function area($heights){
        array_push($heights, 0);
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