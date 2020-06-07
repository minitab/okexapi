<?php

namespace common\components\okex;

use Yii;
use okv3\SpotApi;

/**
 * Class Spot
 * @package common\components\okex
 */
class Spot
{
    protected $config = [];
    /**
     * @var SpotApi
     */
    protected $obj = '';

    public function __construct()
    {
        $this->config = Yii::$app->params['okex_config'];
        $this->obj = new SpotApi($this->config);
    }

    /**
     * 币币账户信息
     * @return array|mixed
     */
    public function getAccountInfo()
    {
        return $this->obj->getAccountInfo();
    }

    /**
     * 单一币种账户信息
     * @return array|mixed
     */
    public function getCoinAccountInfo()
    {
        $currency = Yii::$app->request->post('currency','BTC');
        $after = Yii::$app->request->post('after','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        $type = Yii::$app->request->post('type','');
        // TODO 参数验证
        return $this->obj->getCoinAccountInfo($currency, $after, $before, $limit, $type);
    }

    /**
     * 账单流水查询
     * @return array|mixed
     */
    public function getLedgerRecord()
    {
        $currency = Yii::$app->request->post('currency','BTC');
        $after = Yii::$app->request->post('after','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        $type = Yii::$app->request->post('type','');
        // TODO 参数验证
        return $this->obj->getLedgerRecord($currency, $after, $before, $limit, $type);
    }


    /**
     * 下单
     * @return array|mixed
     */
    public function takeOrder()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $side = Yii::$app->request->post('side','buy');
        $size = Yii::$app->request->post('size','0.1');
        $price = Yii::$app->request->post('price','2');
        $notional = Yii::$app->request->post('notional','');
        $client_oid = Yii::$app->request->post('client_oid','');
        $type = Yii::$app->request->post('type','');
        $order_type = Yii::$app->request->post('order_type','');
        // TODO 参数验证
        return $this->obj->takeOrder($instrumentId, $side, $size, $price,$notional ,$client_oid ,$type ,$order_type);
    }

    /**
     * 撤销指定订单
     * @return array|mixed
     */
    public function revokeOrder()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $order_id = Yii::$app->request->post('order_id','3452612358987776');
        $client_oid = Yii::$app->request->post('client_oid','');
        // TODO 参数验证
        return $this->obj->revokeOrder($instrumentId, $order_id, $client_oid);
    }

    /**
     * 获取订单列表
     * @return array|mixed
     */
    public function getOrdersList()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $state = Yii::$app->request->post('state','2');
        $after = Yii::$app->request->post('after','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit',1);
        // TODO 参数验证
        return $this->obj->getOrdersList($instrumentId, $state, $after, $before, $limit);
    }

    /**
     * 获取订单信息
     * @return array|mixed
     */
    public function getOrderInfo()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $oid = Yii::$app->request->post('oid','3271189018971137');
        // TODO 参数验证
        return $this->obj->getOrderInfo($instrumentId, $oid);
    }

    /**
     * 获取成交明细
     * @return array|mixed
     */
    public function getFills()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $order_id = Yii::$app->request->post('order_id','3230072570268672');
        $afters = Yii::$app->request->post('afters','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        // TODO 参数验证
        return $this->obj->getFills($instrumentId, $order_id, $afters, $before, $limit);
    }

    /**
     * 策略委托下单-止盈止损- mode为1是币币， mode为1是币币杠杆，
     * @return array|mixed
     */
    public function takeAlgoOrderStop()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $mode = Yii::$app->request->post('mode','1');
        $order_type = Yii::$app->request->post('order_type','1');
        $size = Yii::$app->request->post('size','1');
        $side = Yii::$app->request->post('side','buy');
        $trigger_price = Yii::$app->request->post('trigger_price','1');
        $algo_price = Yii::$app->request->post('algo_price','1');
        // TODO 参数验证
        return $this->obj->takeAlgoOrderStop($instrumentId, $mode, $order_type, $size, $side, $trigger_price, $algo_price);
    }

    /**
     * 委托策略撤单-止盈止损
     * @return array|mixed
     */
    public function revokeAlgoOrders()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $algo_ids = Yii::$app->request->post('algo_ids',["401671"]);
        $order_type = Yii::$app->request->post('order_type','1');
        // TODO 参数验证
        return $this->obj->revokeAlgoOrders($instrumentId, $algo_ids, $order_type);
    }

    /**
     * 获取委托单列表-止盈止损
     * @return array|mixed
     */
    public function getAlgoList()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $order_type = Yii::$app->request->post('order_type','1');
        $status = Yii::$app->request->post('status','');
        $algo_id = Yii::$app->request->post('algo_id','401671');
        $after = Yii::$app->request->post('after','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        // TODO 参数验证
        return $this->obj->getAlgoList($instrumentId, $order_type, $status, $algo_id, $after, $before, $limit);
    }

    /**
     * 获取当前账户交易手续费费率
     * @return array|mixed
     */
    public function getTradeFee()
    {
        return $this->obj->getTradeFee();
    }

    /**
     * 获取币对信息
     * @return array|mixed
     */
    public function getCoinInfo()
    {
        return $this->obj->getCoinInfo();
    }

    /**
     * 获取深度数据
     * @return array|mixed
     */
    public function getDepth()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $size = Yii::$app->request->post('size',1);
        $depth = Yii::$app->request->post('depth','');
        // TODO 参数验证
        return $this->obj->getDepth($instrumentId, $size, $depth);
    }

    /**
     * 获取全部ticker信息
     * @return array|mixed
     */
    public function getTicker()
    {
        return $this->obj->getTicker();
    }

    /**
     * 获取某个ticker信息
     * @return array|mixed
     */
    public function getSpecificTicker()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        // TODO 参数验证
        return $this->obj->getSpecificTicker($instrumentId);
    }

    /**
     * 获取成交数据
     * @return array|mixed
     */
    public function getDeal()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $afters = Yii::$app->request->post('afters','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        // TODO 参数验证
        return $this->obj->getDeal($instrumentId, $afters, $before, $limit);
    }

    /**
     * 获取K线
     * @return array|mixed
     */
    public function getKine()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','BTC-USDT');
        $granularity = Yii::$app->request->post('granularity',3600);
        $start = Yii::$app->request->post('start','');
        $end = Yii::$app->request->post('end','');
        // TODO 参数验证
        return $this->obj->getKine($instrumentId, $granularity, $start, $end);
    }
}
