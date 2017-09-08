<?php
/**
 * Created by 大师兄
 * 派系: 神秘剑派
 * 技能: zxc秒杀
 * Date: 2017/9/8
 * Time: 10:40
 * QQ:  997823131 
 */

header("Content-Type:text/html;charser=UTF-8");

function get_curl($url, $cookie = 0, $post = 0, $referer = 0, $header = 0, $ua = 0, $nobaody = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $klsf[] = "*/*";
    $klsf[] = "Accept-Encoding:gzip,deflate,sdch";
    $klsf[] = "Accept-Language:zh-CN,zh;q=0.8";
//    $klsf[] = 'If-None-Match:W/"4QiSoQM25i0o0pXZbCFWKA=="';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $klsf);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
    }

    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    if ($referer) {
        if ($referer == 1) {
            curl_setopt($ch, CURLOPT_REFERER, "http://m.qzone.com/infocenter?g_f=");
        } else {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.0.4; es-mx; HTC_One_X Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0');
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);//主要头部
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//跟随重定向
    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;

}

//$url = "http://zy.512wx.com/token/pmF8wXTN4BO5K3mAqt";
//$url = "http://zy.512wx.com/token/pmOjoLV0Ceh84hoS2Q";
$url = "http://zy.512wx.com/token/pmlWJKBEDZoR228KIU";
$url = "http://zy.512wx.com/token/pmdYrJfVKXLpQ7ji3b";
//$url = "http://zy.512wx.com/20170831/ueDmfORf/800kb/hls/ppvod2140006.ts";
//$refer = "http://zy.512wx.com/share/OjoLV0Ceh84hoS2Q";
$refer = "http://zy.512wx.com/share/lWJKBEDZoR228KIU";
$refer = false;
$cookie = "UM_distinctid=15e5f4ffd216cf-01f9c2ee18c891-64111178-13c680-15e5f4ffd2290f; CNZZDATA1262085243=444267199-1504836060-%7C1504836060";
//$cookie = "UM_distinctid=15e5f4ffd216cf-01f9c2ee18c891-64111178-13c680-15e5f4ffd2290f; CNZZDATA1262085243=444267199-1504836060-%7C1504836060";
$str = get_curl($url,$cookie,'',$refer,true);
var_dump($str);
die();
file_put_contents("ppvod2140006.ts",$str);