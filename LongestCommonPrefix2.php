<?php
// 14最长公共前缀 使用循环解决
class Solution {
    function longestCommonPrefix($arr) {
    	$short = $arr[0];//第一个元素
    	$shortLengthTmp = strlen($short);
    	$length = count($arr);//元素个数
    	for ($i=1; $i < $length; $i++) {
    		if (count($arr[$i])<$shortLengthTmp) {
    			$short = $arr[$i];
    		}
    	}

    	$shortLength = strlen($short);
    	$strTmp = '';
    	$longestCommonPrefix = '';
    	for ($j=0; $j < $shortLength; $j++) { 
    		$strTmp .= $short[$j];
    		// echo $strTmp;
    		$bool = $this->_isPrefix($strTmp, $arr);//可以把最短元素扣除
    		if ($bool) {
    			$longestCommonPrefix = $strTmp;
    		}
    	}

    	return $longestCommonPrefix;
    }

    function _isPrefix($str, $arr){
    	$bool = true;
    	for ($i=0; $i < count($arr); $i++) { 
    		// var_dump($arr[$i]);
    		// var_dump($str);
    		if (strpos($arr[$i], $str) !== 0) {//说明不是前缀
    			return false;
    		}
    	}
    	return $bool;
    }
}
// $arr =  ['abc', 'ab', 'abd'];
// $arr =  ["flower","flow","flight"];
$arr =  ["ca","a"];
$obj = new Solution;
var_dump($obj->longestCommonPrefix($arr));