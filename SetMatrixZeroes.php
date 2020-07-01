<?php
// 73. 矩阵置零
class Solution {

  /**
   * @param Integer[][] $matrix
   * @return NULL

    输入: 
    [
      [0,1,2,0],
      [3,4,5,2],
      [1,3,1,5]
    ]
    输出: 
    [
      [0,0,0,0],
      [0,4,5,0],
      [0,3,1,0]
    ]
   */
  
      function setZeroes2(&$matrix) {
        $y = [];
        //找出横轴0对应的key后，将横轴置0
        foreach ($matrix as $key => &$val){
            if(in_array(0, $val)) {
                foreach ($val as $k => $v) {
                    if($v == 0) {
                        $y[] = $k;//存放哪些列需要置为0
                    }else{
                        $val[$k] = 0;
                    }
                }
            }
        }
        
        //纵轴置0
        array_walk_recursive($matrix, function(&$val, $key) use ($y){//$key是列,$val是值
            if(in_array($key, $y)) {
                $val = 0;
            }
        });
    }

  function setZeroes(&$matrix) {
    $m = count($matrix);
    $n = count($matrix[0]);

    $firstRow = false;
    for ($i = 0; $i < $n; $i++) {
      if ($matrix[0][$i] == 0) {
        $firstRow = true;
      }
    }

    $firstCol = false;
    for ($i = 0; $i < $m; $i++) {
      if ($matrix[$i][0] == 0) {
        $firstCol = true;
      }
    }

    for ($i = 1; $i < $m; $i++) {
      for ($j = 1; $j < $n; $j++) {
        if ($matrix[$i][$j] == 0) {
          $matrix[$i][0] = 0;
          $matrix[0][$j] = 0;
        }
      }
    }

    for ($i = 1; $i < $n; $i++) {
      if ($matrix[0][$i] == 0) {
        for ($j = 0; $j < $m; $j++) {
          $matrix[$j][$i] = 0;
        }
      }
    }
    
    for ($j = 1; $j < $m; $j++) {
      if ($matrix[$j][0] == 0) {
        for ($i = 0; $i < $n; $i++) {
          $matrix[$j][$i] = 0;
        }
      }
    }
    
    if ($firstRow) {
      for ($i = 0; $i < $n; $i++) {
        $matrix[0][$i] = 0;
      }
    }
    
    if ($firstCol) {
      for ($i = 0; $i < $m; $i++) {
        $matrix[$i][0] = 0;
      }
    }
  }
}