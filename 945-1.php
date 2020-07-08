<?php
// 945-使数组唯一的最小增量
class Solution
{

    /**
     * @param Integer[] $A
     * @return Integer
     * @github https://github.com/yumindayu/leetcode-php
     */
    //会超时
    public function minIncrementForUnique($A)
    {
        if (!$A) {
            return 0;
        }
        $ret   = [];
        $count = 0;
        for ($i = 0; $i < count($A); $i++) {
            $num = $A[$i];
            if (isset($ret[$num])) {
                while (true) {
                    if (isset($ret[$num])) {
                        $num++;
                        $count++;
                    } else {
                        break;
                    }
                }
            }
            $ret[$num] = true;
        }
        return $count;
    }
}
