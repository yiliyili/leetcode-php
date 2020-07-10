<?php
// 127. 单词接龙 双端bfs
class Solution
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList

    step 1

    begin [hit]  -> [hot]  + 1  -> [dot, lot] + 1
    end [cog]

    begin [cog] -> [cog, dog,log] + 1
    end [dot, lot]

    begin [dot, log] -> dog + 1
    end[cog,dog,log]

     * @return Integer
     */
    public function ladderLength($beginWord, $endWord, $wordList)
    {
        //交换后,判断单词是否存在就是o(1)的复杂度了
        $wordsArray = array_flip($wordList);
        if (!isset($wordsArray[$endWord])) {//结束单词必须要存在
            return 0;
        }

        $beginArray             = [];
        $endArray               = [];
        $visited                = [];//该单词是否访问过
        $len                    = 1;
        $beginArray[$beginWord] = 1;
        $endArray[$endWord]     = 1;
        while (!empty($beginArray)) {
            if (count($beginArray) > count($endArray)) {//谁少就遍历谁,循环中遍历次数少
                // 交换
                $tmp        = $beginArray;
                $beginArray = $endArray;
                $endArray   = $tmp;
            }
            $temp = [];
            foreach ($beginArray as $word => $value) {
                for ($i = 0; $i < strlen($word); $i++) {
                    for ($c = 'a'; $c <= 'z'; $c++) {//挨个挨个换字母
                        $old      = $word[$i];
                        $word[$i] = $c;//替换单词中的字母
                        if (isset($endArray[$word])) {//O(1)的
                            return $len + 1;
                        }
                        //未访问过的 且 是在wordsArray中的才能放入队列中
                        if (!isset($visited[$word]) && isset($wordsArray[$word])) {
                            $temp[$word]    = 1;
                            $visited[$word] = 1;
                        }
                        $word[$i] = $old;//再还原回来
                    }
                }
            }
            $beginArray = $temp;//下一层的数组,冲洗赋值
            $len++;//变换长度+1
        }
        return 0;//避免["hot","dog"]这种情况
    }
}
