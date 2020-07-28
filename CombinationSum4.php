<?php
// 377. 组合总和 Ⅳ
// 给定一个由正整数组成且不存在重复数字的数组，找出和为给定目标正整数的组合的个数。

// 示例:
// nums = [1, 2, 3]
// target = 4
// 所有可能的组合为：
// (1, 1, 1, 1)
// (1, 1, 2)
// (1, 2, 1)
// (1, 3)
// (2, 1, 1)
// (2, 2)
// (3, 1)
// 请注意，顺序不同的序列被视作不同的组合。
// 因此输出为 7。

// 状态定义dp[i] ：对于给定的由正整数组成且不存在重复数字的数组，和为 i 的组合的个数,
class Solution {

    /**
     * 这里状态定义就是题目要求的，并不难，状态转移方程要动点脑子，也不难：
     * 状态转移方程：dp[i]= dp[i - nums[0]] + dp[i - nums[1]] + dp[i - nums[2]] + ... （当 [] 里面的数 >= 0）
     * 特别注意：dp[0] = 1，表示，如果那个硬币的面值刚刚好等于需要凑出的价值，这个就成为 1 种组合方案
     * 再举一个具体的例子：nums=[1, 3, 4], target=7;
     * dp[7] = dp[6] + dp[4] + dp[3]
     * 即：7 的组合数可以由三部分组成，1 和 dp[6]，3 和 dp[4], 4 和dp[3];
     *
     * @param nums
     * @param target
     * @return
     */
    // https://leetcode-cn.com/problems/combination-sum-iv/solution/xi-wang-yong-yi-chong-gui-lu-gao-ding-bei-bao-wen-/
    function combinationSum4($nums, $target){//要求target为正整数
        $n = count($nums);
        if($n<=0) return 0;
        $dp[0] = 1;//因为当硬币面值刚好等于target的时候,$dp[$i-$num]应该是1
        for($i=1;$i<=$target;$i++)
            foreach($nums as $num)
                if($i-$num>=0) $dp[$i] += $dp[$i-$num];
        return isset($dp[$target])?$dp[$target]:0;
    }

}




