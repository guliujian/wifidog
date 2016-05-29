<?php

/**
 * 通过判断token  来判断是否放行
 *
 * 如果不放行，请返回以下代码
 * echo ("Auth: 0\n");
 * echo ("Messages: No Access\n");
 * exit;
 */
$token = $_GET['token'];
if (empty($token)) {die('error');
}

echo ("Auth: 1\n");
echo ("Messages: Allow Access\n");
exit;
