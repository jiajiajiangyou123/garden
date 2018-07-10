<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2018/7/3
 * Time: 14:36
 */

namespace app\api\controller;

use app\api\controller\Api as Api;

class Alipay extends Api
{
    private $_app_id;
    private $_public_key;
    private $_private_key;
    private $_getway_url;
    private $_format;
    private $_charset;
    private $_sign_type;
    private $_client;
    public function _initialize()
    {
        $this->_app_id = config('alipay_app_id');
        $this->_public_key = config('alipay_public_key');
        $this->_private_key = config('alipay_private_key');
        $this->_format = config('alipay_format');
        $this->_charset = config('alipay_charset');
        $this->_sign_type = config('alipay_sign_type');
        $this->_getway_url = config('alipay_getwat_url');
        return parent::_initialize(); // TODO: Change the autogenerated stub
//        var_dump($this);exit;
    }


    public function test()
    {
        $this->paramInt();
        //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.open.public.template.message.industry.modify
        vendor('alipay.aop.request.AlipayOpenPublicTemplateMessageIndustryModifyRequest');
        $request = new \AlipayOpenPublicTemplateMessageIndustryModifyRequest();
        //SDK已经封装掉了公共参数，这里只需要传入业务参数
        //此次只是参数展示，未进行字符串转义，实际情况下请转义
        $request->setBizContent("{" .
            "    \"primary_industry_name\":\"IT科技/IT软件与服务\"," .
            "    \"primary_industry_code\":\"10001/20102\"," .
            "    \"secondary_industry_code\":\"10001/20102\"," .
            "    \"secondary_industry_name\":\"IT科技/IT软件与服务\"" .
            " }") ;

        $response= $this->_client->execute($request);
    }
    
    public function imgUpdate()
    {
        $this->paramInt();
        vendor('alipay.aop.AopClient');

        //实例化具体API对应的request类,类名称和接口名称对应，当前调用接口名称：alipay.offline.material.image.upload
        vendor('alipay.aop.request.AlipayOfflineMaterialImageUploadRequest');
        $request = new \AlipayOfflineMaterialImageUploadRequest();
        $request->setImageName("测试文件");
        $request->setImageType("jpg");
        //Windows请填写绝对路径，不支持相对路径；Linux支持相对路径
        $imgUrl = "F:/www/Loan/Loan12/public/static/web/img/1.png";//本地文件路径
        $request->setImageContent("@".$imgUrl);
        $response = $this->_client->execute($request);
        //获取图片地址
        $response->getImageUrl();
    }

    public function userAuth()
    {
        $this->paramInt();
        //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.user.userinfo.share
        vendor('alipay.aop.request.AlipayUserUserinfoShareRequest');
        $request= new \AlipayUserUserinfoShareRequest();
        //授权类接口执行API调用时需要带上accessToken
        $response= $this->_client->execute($request,"accessToken");
    }

    public function appAuth()
    {
        $this->paramInt();
        ## 实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.open.public.template.message.industry.modify
        vendor('alipay.aop.request.AlipayOpenPublicTemplateMessageIndustryModifyRequest');
        $request = new \AlipayOpenPublicTemplateMessageIndustryModifyRequest();
        //SDK已经封装掉了公共参数，这里只需要传入业务参数
        //此次只是参数展示，未进行字符串转义，实际情况下请转义
        $request->bizContent = "{" .
            "    \"primary_industry_name\":\"IT科技/IT软件与服务\"," .
            "    \"primary_industry_code\":\"10001/20102\"," .
            "    \"secondary_industry_code\":\"10001/20102\"," .
            "    \"secondary_industry_name\":\"IT科技/IT软件与服务\"" .
            "  }";
        //ISV代理商户调用需要传入app_auth_token
        $response= $this->_client->execute($request,NULL,"app_auth_token");
    }

    /**
     *  @Title
     *  @Description    todo::手机支付接口
     * */

//    function wapPay()
//    {
//        $this->paramInt();
//        vendor('alipay.aop.request.AlipayTradeWapPayRequest');
//        $request = new \AlipayTradeWapPayRequest ();
//        $request->setBizContent($this->wapPayData);
//        $result = $this->_client->pageExecute ( $request);
//
//        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
//        $resultCode = $result->$responseNode->code;
//        if(!empty($resultCode)&&$resultCode == 10000){
//            return api_json([],'付费成功',200);
//        } else {
//            return api_json([],'付费失败',201);
//        }
//    }


    /**
     * alipay.trade.wap.pay
     * @param $builder 业务参数，使用buildmodel中的对象生成。
     * @param $return_url 同步跳转地址，公网可访问
     * @param $notify_url 异步通知地址，公网可以访问
     * @return $response 支付宝返回的信息
     */
    function wapPay($builder,$return_url,$notify_url) {

        $biz_content=$builder->getBizContent();
        //打印业务参数
        $this->writeLog($biz_content);

        vendor('alipay.aop.request.AlipayTradeWapPayRequest');
        $request = new \AlipayTradeWapPayRequest();

        $request->setNotifyUrl($notify_url);
        $request->setReturnUrl($return_url);
        $request->setBizContent ( $biz_content );

        // 首先调用支付api
        $response = $this->aopclientRequestExecute ($request,true);
        // $response = $response->alipay_trade_wap_pay_response;
        return $response;
    }

    function aopclientRequestExecute($request,$ispage=false) {


        vendor('alipay.aop.AopClient');
        $this->_client = new \AopClient();
        /**
         *  沙箱使用网关:https://openapi.alipaydev.com/gateway.do
         *  正式环境使用网关：https://openapi.alipay.com/gateway.do
         * */
//        $aopClient->gatewayUrl = "https://openapi.alipay.com/gateway.do";
        $this->_client->gatewayUrl = $this->_getway_url;
        $this->_client->appId = $this->_app_id;
        $this->_client->rsaPrivateKey = $this->_private_key;

        $this->_client->format = $this->_format;
        $this->_client->charset= $this->_charset;
        $this->_client->signType= $this->_sign_type;
        $this->_client->alipayrsaPublicKey = $this->_public_key;

        if($ispage)
        {
            $result = $this->_client->pageExecute($request,"post");
            echo $result;
        }
        else
        {
            $result = $this->_client->Execute($request);
        }

        //打开后，将报文写入log文件
        $this->writeLog("response: ".var_export($result,true));
        return $result;
    }

    /**
     * alipay.trade.query (统一收单线下交易查询)
     * @param $builder 业务参数，使用buildmodel中的对象生成。
     * @return $response 支付宝返回的信息
     */
    function Query($builder){
        $biz_content=$builder->getBizContent();
        //打印业务参数
        $this->writeLog($biz_content);
        vendor('alipay.aop.request.AlipayTradeQueryRequest');
        $request = new \AlipayTradeQueryRequest();
        $request->setBizContent ( $biz_content );

        // 首先调用支付api
        $response = $this->aopclientRequestExecute ($request);
        $response = $response->alipay_trade_query_response;
        var_dump($response);
        return $response;
    }

    /**
     * alipay.trade.refund (统一收单交易退款接口)
     * @param $builder 业务参数，使用buildmodel中的对象生成。
     * @return $response 支付宝返回的信息
     */
    function Refund($builder){
        $biz_content=$builder->getBizContent();
        //打印业务参数
        $this->writeLog($biz_content);
        vendor('alipay.aop.request.AlipayTradeRefundRequest');
        $request = new \AlipayTradeRefundRequest();
        $request->setBizContent ( $biz_content );

        // 首先调用支付api
        $response = $this->aopclientRequestExecute ($request);
        $response = $response->alipay_trade_refund_response;
        var_dump($response);
        return $response;
    }

    /**
     * alipay.trade.close (统一收单交易关闭接口)
     * @param $builder 业务参数，使用buildmodel中的对象生成。
     * @return $response 支付宝返回的信息
     */
    function Close($builder){
        $biz_content=$builder->getBizContent();
        //打印业务参数
        $this->writeLog($biz_content);
        vendor('alipay.aop.request.AlipayTradeCloseRequest');
        $request = new \AlipayTradeCloseRequest();
        $request->setBizContent ( $biz_content );

        // 首先调用支付api
        $response = $this->aopclientRequestExecute ($request);
        $response = $response->alipay_trade_close_response;
        var_dump($response);
        return $response;
    }

    /**
     * 退款查询   alipay.trade.fastpay.refund.query (统一收单交易退款查询)
     * @param $builder 业务参数，使用buildmodel中的对象生成。
     * @return $response 支付宝返回的信息
     */
    function refundQuery($builder){
        $biz_content=$builder->getBizContent();
        //打印业务参数
        $this->writeLog($biz_content);
        vendor('alipay.aop.request.AlipayTradeFastpayRefundQueryRequest');
        $request = new \AlipayTradeFastpayRefundQueryRequest();
        $request->setBizContent ( $biz_content );

        // 首先调用支付api
        $response = $this->aopclientRequestExecute ($request);
        var_dump($response);
        return $response;
    }
    /**
     * alipay.data.dataservice.bill.downloadurl.query (查询对账单下载地址)
     * @param $builder 业务参数，使用buildmodel中的对象生成。
     * @return $response 支付宝返回的信息
     */
    function downloadurlQuery($builder){
        $biz_content=$builder->getBizContent();
        //打印业务参数
        $this->writeLog($biz_content);
        vendor('alipay.aop.request.alipaydatadataservicebilldownloadurlqueryRequest');
        $request = new \alipaydatadataservicebilldownloadurlqueryRequest();
        $request->setBizContent ( $biz_content );

        // 首先调用支付api
        $response = $this->aopclientRequestExecute ($request);
        $response = $response->alipay_data_dataservice_bill_downloadurl_query_response;
        var_dump($response);
        return $response;
    }

    /**
     * 验签方法
     * @param $arr 验签支付宝返回的信息，使用支付宝公钥。
     * @return boolean
     */
    function check($arr){
        $aop = new AopClient();
        $aop->alipayrsaPublicKey = $this->alipay_public_key;
        $result = $aop->rsaCheckV1($arr, $this->alipay_public_key, $this->signtype);
        return $result;
    }

    //请确保项目文件有可写权限，不然打印不了日志。
    function writeLog($text) {
        // $text=iconv("GBK", "UTF-8//IGNORE", $text);
        //$text = characet ( $text );
        file_put_contents ( dirname ( __FILE__ ).DIRECTORY_SEPARATOR."./../../log.txt", date ( "Y-m-d H:i:s" ) . "  " . $text . "\r\n", FILE_APPEND );
    }


    /** *利用google api生成二维码图片
     * $content：二维码内容参数
     * $size：生成二维码的尺寸，宽度和高度的值
     * $lev：可选参数，纠错等级
     * $margin：生成的二维码离边框的距离
     */
    function create_erweima($content, $size = '200', $lev = 'L', $margin= '0') {
        $content = urlencode($content);
        $image = '<img src="http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&amp;cht=qr&chld='.$lev.'|'.$margin.'&amp;chl='.$content.'"  widht="'.$size.'" height="'.$size.'" />';
        return $image;
    }
}