<?php

class Route
{
    public $config;

    public function display_template()
    {
        //截取红太阳异常参数
        $hongtaiyang = strstr($_SERVER['REQUEST_URI'], '?username');
        if ($hongtaiyang) {
            $url = str_replace($hongtaiyang, '', $_SERVER['REQUEST_URI']);
            header("Location:".$url);
        }


        $url = str_replace(array('/whgctz', '/web', '/wap', '?p=sgsuccess', '?p=ngsuccess', '?p=zgsuccess', '/'), '', $_SERVER['REQUEST_URI']); //获取网址参数
        foreach ($this->config as $array) { //网址参数属于哪一个数组
            if ($array[0] == $url) {
                $filename = isset($array[0]) ? $array[0] : '';
                $laiyuan1 = isset($array[2]) ? $array[2] : '';//来源赋值给模板
                $laiyuan2 = isset($array[3]) ? $array[3] : $laiyuan1;
                $title = isset($array[4]) ? $array[4] : '';//获取标题
                $weixin = isset($array[5]) ? $array[5] : '';//获取微信

                //模板引擎
                ob_start();
                include_once('template/' . $array[1] . '/template.html');//载入对应路径的模版
                $string = ob_get_clean();
                //去掉/body和/html以便注入模板
                $string = str_replace(array('</html>', '</body>'), '', $string);
                echo $string;
                echo '</body></html>';
                //注入模板


                ob_end_flush();
            }
        }

//        if (isset($has_template) ? $has_template : false ) { //未找到模板则返回默认信息
////            echo '未找到推广页模板';
//        }
    }

    public function add_url($s)
    {

    }
}

