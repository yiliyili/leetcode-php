<?php
// 914. 卡牌分组
class Solution
{

    /**
     * @param Integer[] $deck
     * @return Boolean
     * @github https://github.com/yumindayu/leetcode-php
每组都有 X 张牌。
组内所有的牌上都写着相同的整数。

    输入：[1,2,3,4,4,3,2,1]
    输出：true
    [1,1,1,1,2,2,2,2,2] 也可以
     */
    public function hasGroupsSizeX($deck)
    {
        if (count($deck) <= 1) {
            return false;
        }

        $map =  array_count_values($deck);
        $num = array_shift($map);
        //和其他数求最大公约数
        foreach ($map as $v) {
            $num = $this->gcd($v, $num);

            if ($num == 1) {//某个数出现3次,另一个出现4次,那么最大公约数是1
                echo $v;
                echo $num;
                return false;
            }

        }
        return true;

    }
    //求最大公约数
    public function gcd($x, $y)
    {
        return $y == 0 ? $x : $this->gcd($y, $x % $y);
    }

}

$arr = [1,2,3,4,4,3,2,1];
$solu = new Solution();
var_dump( $solu->hasGroupsSizeX($arr));
