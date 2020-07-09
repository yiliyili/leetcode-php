<?php
// 407-接雨水II
class Solution
{

    /**
     * @param Integer[][] $heightMap
     * @return Integer
     */
    public function trapRainWater($heightMap)
    {
        $m = count($heightMap);
        $n = count($heightMap[0]);

        $res       = 0;
        $max       = PHP_INT_MIN;
        $visited   = [];//坐标被访问过
        $direction = [[0, -1], [-1, 0], [0, 1], [1, 0]];//方向
        $queue     = new PQ();
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                // 先把最外一圈放进去
                if ($i == 0 || $j == 0 || $i == $m - 1 || $j == $n - 1) {
                    //记录坐标和优先级(高度)
                    $queue->insert([$i, $j], $heightMap[$i][$j]);//从小到大
                    $visited[$i][$j] = true;
                }
            }
        }
        $queue->setExtractFlags(PQ::EXTR_BOTH);
        //广度优先搜索
        while (!$queue->isEmpty()) {
            $data   = $queue->extract();//弹出队列中的最小值,木桶原理
            $height = $data['priority'];
            $row    = $data['data'][0];
            $col    = $data['data'][1];
            $max    = max($max, $height);
            //看一下四周的点,能不能往里边灌水
            for ($i = 0; $i < 4; $i++) {
                $x = $row + $direction[$i][0];
                $y = $col + $direction[$i][1];
                // 如果位置合法且没访问过
                if ($x < 0 || $x >= $m || $y < 0 || $y >= $n || (isset($visited[$x][$y]))) {
                    continue;
                }
                $visited[$x][$y] = true;
                // 如果外围这一圈中最小的比当前这个还高，那就说明能往里面灌水啊
                if ($heightMap[$x][$y] < $max) {
                    $res += $max - $heightMap[$x][$y];
                }
                $queue->insert([$x, $y], $heightMap[$x][$y]);
            }
        }
        return $res;

    }

}

class PQ extends \SplPriorityQueue
{   
    //由小到大 改为了小顶堆
    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) {
            return 0;
        }

        return $priority1 < $priority2 ? 1 : -1;
    }
}
