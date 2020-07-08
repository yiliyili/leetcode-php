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
        if (!$A) {
            return 0;
        }
        $map = [];
        //记录每个数字出现的次数
        for ($i = 0; $i < count($A); $i++) {
            $map[$A[$i]] = isset($map[$A[$i]]) ? $map[$A[$i]] + 1 : 1;
        }

        $count    = 0;
        $position = [];
        foreach ($map as $k => $v) {
            if ($v == 1) {
                continue;
            }
//处理重复出现的数字,从1开始
            for ($i = 1; $i < $v; $i++) {
                $num = $k;
                while (true) {
                    if (!isset($map[$num])) {
                        $map[$num]    = 1;
                        $position[$k] = $num;//比如7=>13 表示7这个重复数字一直加1变到了13
                        $count += $num - $k;
                        break;
                    }
                    //已知7变到13,那么其他的7应该变到14,15等
                    if (isset($position[$num])) {
                        $num = $position[$num] + 1;
                    } else {
                        $num++;
                    }

                }
            }
        }
        return $count;
    }

}
$test = new Solution;
$A    = [3, 2, 1, 2, 1, 7];

$ret = $test->minIncrementForUnique($A);
var_dump($ret);exit;
