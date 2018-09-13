<?php
/*
 * @param int $rowCount   总记录数
 * @param int maxNum      能显示在页面上的最大页码数
 * @param int $rowPerPage 每页显示的记录数
 * @param string $url     固定不变的url部分
 * $return $strPage       生成的页码字符串
 * */
function page($rowCount,$maxNum,$rowPerPage,$url){
    // 1, 接收当前页码数
    $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    // 2, 计算总页数
    $pages = ceil($rowCount / $rowPerPage);
    // 3, 拼凑页面字符串
    $strPage = '';
    // 3.1 拼凑出首页
    $strPage .= "<a href='{$url}pageNum=1'>首页</a>";
    // 3.2 拼凑出上一页
    // 拼凑出“上一页”
    $preNum = $pageNum - 1;
    if($pageNum != 1) {
        $strPage .= "<a href='{$url}pageNum=$preNum'><<上一页</a>";
    }
    // 3.3 确定显示的第1个页码$startNum的值
    if($pageNum <= 3) {
        $startNum = 1;
    }else {
        $startNum = $pageNum - 2;
    }
    // 确定$startNum的最大值
    if($startNum > $pages - $maxNum + 1) {     //$pageNum - $maxNum + 1 ==>> $pageNum - ($maxNum - 1)
        $startNum = $pages - $maxNum + 1;
    }
    // 防止$startNum出现负值
    if($startNum <= 1) {
        $startNum = 1;
    }
    // 3.4 确定显示的最后1个页码$endNum的值
    $endNum = $startNum + $maxNum - 1;
    // 防止$endNum越界
    if($endNum > $pages) {
        $endNum = $pages;
    }
    //拼凑出中间页码
    for($i=$startNum;$i<=$endNum;$i++) {
        if($i == $pageNum) {
            $strPage .= "<a href='{$url}pageNum=$i'><font color='red'>$i</font></a>";
        }else {
            $strPage .= "<a href='{$url}pageNum=$i'>$i</a>";
        }
    }
    // 3.6 拼凑出下一页
    $nextNum = $pageNum + 1;
    if($pageNum != $pages) {
        $strPage .= "<a href='{$url}pageNum=$nextNum'>下一页>></a>";
    }
    // 3.7 拼凑出“尾页”
    $strPage .= "<a href='{$url}pageNum=$pages'>尾页</a>";
    // 3.8 拼凑出“总页数”
    $strPage .= "总页数:$pages";
    //4、返回页码字符串
    return $strPage;
}

?>