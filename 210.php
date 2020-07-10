<?php
// 210-课程表II
class Solution
{
    public $visited = []; //标记哪些节点访问过 对图是必须的

    public $edges = []; //有向图 比如0这个课程有哪些相邻节点

    public $result = [];

    public $invalid = false;//有没有环存在
    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    public function findOrder($numCourses, $prerequisites)
    {
        $this->edges = array_fill(0,$numCourses,[]);
        foreach ($prerequisites as $v) {
            if (isset($this->edges[$v[1]])) {
                array_push($this->edges[$v[1]], $v[0]);
            } else {
                $this->edges[$v[1]][] = $v[0];
            }
        }

        for ($i = 0; $i < $numCourses; $i++) {
            if (!isset($this->visited[$i])) {
                $this->dfs($i);
            }
        }

        if ($this->invalid) {
            return [];
        }
        return $this->result;

    }

    public function dfs($u)
    {
        //有环状依赖
        if ($this->invalid) {
            return;
        }

        $this->visited[$u] = 1;//1表示访问中
        foreach ($this->edges[$u] as $v) {
            if (!isset($this->visited[$v])) {
                $this->dfs($v);
            } elseif ($this->visited[$v] == 1) {
                $this->invalid = true;//说明有环
            }
        }
// $u 的所有后继结点都访问完了，都没有存在环，则这个结点就可以被标记为已经访问结束
        // 状态设置为 2
        $this->visited[$u] = 2;//2表示已经访问完了
        array_unshift($this->result, $u);//0要先进来
    }
}

$test   = new Solution;
$numCourses = 2;
$prerequisites  = [[0,1]];
$ret    = $test->findOrder($numCourses, $prerequisites);
var_dump($ret);