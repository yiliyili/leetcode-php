<?php
// 题目描述 https://blog.csdn.net/yancr/article/details/89364757
// 某多处理器多道批处理系统一次允许讲所有作业调入内存，且能并行执行，其并行数等于处理器个数。该系统采用SJF的调度方式（最短作业优先，系统在调度时，总是优先调度执行处理时间最短的作业）。
// 现给定处理器个数m，作业数n，每个作业的处理时间分别为t1, t2, … tn。
// 当n>m时，首先处理时间短的m个作业进入处理器处理，其他的进入等待，当某个作业处理完成时，依次从等待队列中取出处理时间最短的作业进入处理。
// 求系统处理完所有作业的耗时为多少？
// 注：不考虑作业切换的消耗。

// 输入描述：
// 输入2行，第一行为2个整数（采用空格分隔），分别标识处理器个数m个作业数n；第二行输入n个整数（采用空格分隔），标识每个作业的处理时长t1, t2,… tn。0<m, n<100，0<t1, t2,… tn<100。

// 输出描述：
// 输出处理总时长

// 示例1
// 输入
// 3 5
// 8 4 3 1 10
// 输出
// 13
//1,3,4 先进入3个cpu1 cpu2 cpu3 .cpu1处理完后把8丢给cpu1,cpu2处理完把10给cpu2 最终总时长是3+10=13
// 备注：
// 注：不用考虑输入合法性。

while (fscanf(STDIN, "%d %d", $cpu, $zuo) == 2) {
    $str = trim(fgets(STDIN));
    $arr = explode(' ', $str);//按空格分为数组
    if($cpu>=$zuo){
        echo max($arr);//直接取最大值
        continue;
    }
    sort($arr);//排序
    $fill = array_fill(0,$cpu,0);//先填充为0
    for($i=0; $i<$cpu; $i++){
        $fill[$i] = array_shift($arr);//从左侧弹出数组中的元素
    }
    $fill2 = $fill;//file2用于模拟不断减减操作

    while(true){
        for($i=0; $i<$cpu; $i++){
            $fill2[$i]--;
            if($fill2[$i] == 0){//减少到0就加
                if($arr){
                   $val = array_shift($arr);
                   $fill2[$i] += $val;
                   $fill[$i] += $val;//记录加和
                } else {
                   break 2;//跳过2层循环
                }
            }
        }
    }
    echo max($fill);//取加和最大值
}
