<?php
header("Content-type: text/html; charset=utf-8");

include('route.class.php');

/*
 * 第一个参数：网址
 * 第二个参数：模板
 * 第三个参数：来源1
 * 第四个参数：来源2
 * 第五个参数：标题
 * 第六个参数：微信
 * */
class WebRoute extends Route
{
    public $config = array(
        array('ngxx.php', 'ng2', 'xx-索股','',''),//测试
        array('ng3.php', 'ng3', '牛股3','','免费解决炒股难题（）','599098817'),//测试
        array('zgxx.php', 'zg2', '网站-诊股', '网站-索股','免费解决炒股难题','599098817'),//测试

        array('ngsh.php', 'ng', '搜狐-索股','','牛股天机星','guhaidaoren'),
        array('ngwy.php', 'ng', '网易-索股','','牛股天机星','guhaidaoren'),
        array('ngwz.php', 'ng', '网站-索股','','牛股天机星','guhaidaoren'),

        array('zgsh.php', 'zg2', '搜狐-诊股','搜狐-牛股','免费解决炒股难题','guhaidaoren'),
        array('zgwy.php', 'zg2', '网易-诊股','网易-牛股','免费解决炒股难题','guhaidaoren'),
        array('zgwz.php', 'zg', '网站-诊股'),

        array('ngfy.php', 'ng', '新浪-索股','','（新浪）牛股天机星','guhaidaoren'),
        array('ngdh.php', 'ng3', '导航2-索股','导航2-牛股','（2345）牛股天机星','whgc009'),
        array('nghs.php', 'ng3', '搜狐汇算-索股','','（搜狐）牛股天机星','w15073198478'),//


        array('zgdh.php', 'zg2', '导航-诊股', '导航-牛股','（2345）免费解决炒股难题','whgc009'),
        array('zgfy.php', 'zg2', '新浪-诊股', '扶翼-牛股','（新浪）免费解决炒股难题','599098817'),
        array('zghs.php', 'zg2', '搜狐汇算-诊股', '搜狐汇算-牛股','（搜狐）免费解决炒股难题','w15073198478'),//
        array('ngdh2.php', 'ng', '导航2-索股','','牛股天机星','whgc009'),
        array('ngdh3.php', 'ng3', '导航2-索股','导航2-牛股','（2345）牛股天机星','whgc009'),

    );
}

$route = new WebRoute();
$route->display_template();