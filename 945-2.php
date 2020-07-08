<?php
// 945-使数组唯一的最小增量
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    public function minIncrementForUnique($A)
    {
        sort($A);//排序
        $count = 0;
        for ($i = 1; $i < count($A); $i++) {
            if ($A[$i] <= $A[$i - 1]) {//说明前一个数字由于重复被加了数次1
                $count += $A[$i - 1] - $A[$i] + 1;
                $A[$i] = $A[$i - 1] + 1;
            }
        }
        return $count;
    }
}
