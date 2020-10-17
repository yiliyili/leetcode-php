func permute(nums []int) [][]int {
  l := len(nums)
  if l == 1 {
    return [][]int{nums}//只有1个数字的情况,结果只有1种可能
  }
  var (
    res     [][]int                // 结果 别的题解还有做法是把res定义为全局变量
    tmp     = make([]int, 0, l)    // 记录排列的临时变量 L长度
    visited = make(map[int]int, l) // 标识数字是否被使用过 L长度
  )
  res = backtrack(nums, tmp, res, visited)
  return res
}

func backtrack(nums, tmp []int, res [][]int, visited map[int]int) [][]int {
  // 结束条件：走完了，也就是路径上的数字总数等于原始列表总数
  if len(nums) == len(tmp) {
    r := make([]int, len(tmp))
    copy(r, tmp)// 切片底层公用数据，所以要copy
    res = append(res, r)
    return res //一定要把res地址返回出去
  }
  for _, v := range nums {
    // 做选择
    if visited[v] == 1 {//代替了php中in_array的作用
      continue
    }
    tmp = append(tmp, v)
    visited[v] = 1 // 标记
    res = backtrack(nums, tmp, res, visited)
    // 撤销选择
    visited[v] = 0 // 撤销标记
    tmp = tmp[:len(tmp)-1]//清除尾部最后一个元素
  }
  return res
}

