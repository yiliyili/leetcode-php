<?php
// 518零钱兑换 二 求组合数而不是排列数
class Solution
{

    /**
     * @param Integer $amount
     * @param Integer[] $coins
     * @return Integer
     */
    // 动态规划
    // 一个组合的不同排列在结果集中只出现一次，这一点是「背包问题」的特征，拿东西的顺序并不重要。(2, 2, 1) 是一个组合，(1, 2, 2) 和 (2, 1, 2) 不是新的组合。
    public function change2($amount, $coins)
    {
        if (!$amount) {
            return 1;
        }

        $dp = [];
        for ($i = 0; $i <= $amount; $i++) {
            $dp[$i] = 0;
        }
        $dp[0] = 1;//因为当零钱面值刚好等于target的时候,$dp[$i-$num]应该是1 
// 这个和下边放到循环中其实表示的是同一个意思,就是零钱面值刚好等于target的时候,多加1次组合
        for ($i = 0; $i < count($coins); $i++) {//每一次循环加进来的是新零钱,所以和之前的并不会重复
            for ($j = $coins[$i]; $j <= $amount; $j++) {//注意$j的取值 amount在内层取得的是组合数,如果是放在外层,就可以改变取零钱的顺序,就变成求排列
                $dp[$j] += $dp[$j - $coins[$i]];
            }
        }
        // var_dump($dp);
        return $dp[$amount] ?? 0;
    }

     // $dp[$i][$j] 前i个零钱能组成金额j,一共有多少种组合,注意是前i不包括i  那么就有
     // $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - $coins[$i - 1]]; 
     // 要分为两种情况:一种是前$i-1个零钱就凑齐了j,另一种是用到了前i个的最后一个,也就是第$i-1个,凑齐了$j - $coins[$i - 1],因为凑齐了之后再多加上一枚第$i - 1个零钱就够了,反正每种零钱是无限使用的
     // 举例:[1,2,3]凑4元 dp[2][4] = dp[1][4] + dp[2][2] 前2枚零钱一共有3种方式组成4元钱,分别是1111 112 22,  dp[1][4]前1枚组成4元有一种, dp[2][2]前2枚组成2元有两种 11和2
     function change3($amount, $coins) {
        $n = count($coins);
        $dp = array_fill(0, $n + 1, array_fill(0, $amount + 1, 0));//是n+1行,从0行到n行,要凑0到$amount所以是$amount+1列

        for ($i = 0; $i <= $n; $i++) {
            $dp[$i][0] = 1;//组成0元就是一种,就是哪个零钱都不取,或者说刚好某一种零钱就等于amount,这算一种
        }

        for ($i = 1; $i <= $n; $i++) {
            for ($j = 1; $j <= $amount; $j++) {
                if ($j-$coins[$i-1] >= 0) {//当前零钱面值是否超过j
                    $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - $coins[$i - 1]];
                } else {
                    $dp[$i][$j] = $dp[$i-1][$j];
                }
            }
        }

        return $dp[$n][$amount];
    }



    public function change($amount, $coins)
    {
        if (!$amount) {
            return 1;
        }

        $dp = [];
        for ($i = 0; $i <= $amount; $i++) {
            $dp[$i] = 0;
        }
        for ($i = 0; $i < count($coins); $i++) {//每一次循环加进来的是新零钱,所以和之前的并不会重复
            $dp[$coins[$i]] += 1;//零钱面值刚好等于target的时候,多加1次,因为这里定的是dp[0]=0
            for ($j = $coins[$i]; $j <= $amount; $j++) {//注意$j的取值
                $dp[$j] += $dp[$j - $coins[$i]];
            }
        }
        // var_dump($dp);
        return $dp[$amount] ?? 0;
    }


}
$test   = new Solution;
$amount = 5;
$coins  = [1, 2, 5];
$ret    = $test->change($amount, $coins);
$ret    = $test->change2($amount, $coins);
var_dump($ret);exit;
