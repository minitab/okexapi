<?php

namespace common\components\okex;

use Yii;
use okv3\SwapApi;

/**
 * Class Swap
 * @package common\components\okex
 */
class Swap
{
    protected $config = [];
    /**
     * @var SwapApi
     */
    protected $obj = '';

    public function __construct()
    {
        $this->config = Yii::$app->params['okex_config'];
        $this->obj = new SwapApi($this->config);
    }

    /**
     * 所有合约持仓信息
     * @return array|mixed
     */
    public function getPosition()
    {
        return $this->obj->getPosition();
    }

    /**
     * 单个合约持仓信息
     * @return array|mixed
     */
    public function getSpecificPosition()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getSpecificPosition($instrumentId);
    }

    /**
     * 所有币种合约账户信息
     * @return array|mixed
     */
    public function getAccounts()
    {
        return $this->obj->getAccounts();
    }

    /**
     * 单个币种合约账户信息
     * @return array|mixed
     */
    public function getCoinAccounts()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getCoinAccounts($instrumentId);
    }

    /**
     * 获取合约币种杠杆倍数
     * @return array|mixed
     */
    public function getSettings()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getSettings($instrumentId);
    }

    /**
     * 设定合约币种杠杆倍数
     * @return array|mixed
     */
    public function setLeverage()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $side = Yii::$app->request->post('side',3);
        $leverage = Yii::$app->request->post('leverage',10);
        // TODO 参数验证
        return $this->obj->setLeverage($instrumentId, $side, $leverage);
    }

    /**
     * 账单流水查询
     * @return array|mixed
     */
    public function getLedger()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getLedger($instrumentId);
    }

    /**
     * 下单
     * @return array|mixed
     */
    public function takeOrder()
    {
        $client_oid = Yii::$app->request->post('client_oid','abc');
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $otype = Yii::$app->request->post('otype','1');
        $price = Yii::$app->request->post('price','4.2');
        $size = Yii::$app->request->post('size','1');
        $match_price = Yii::$app->request->post('match_price','0');
        $leverage = Yii::$app->request->post('leverage','10');
        $order_type = Yii::$app->request->post('order_type','');
        // TODO 参数验证
        return $this->obj->takeOrder($client_oid, $instrumentId, $otype, $price, $size, $match_price, $leverage, $order_type);
    }

    // TODO 批量下单

    /**
     * 撤销指定订单
     * @return array|mixed
     */
    public function revokeOrder()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $order_id = Yii::$app->request->post('order_id','294683725542936576');
        // TODO 参数验证
        return $this->obj->revokeOrder($instrumentId, $order_id);
    }

    // TODO 批量撤单

    /**
     * 获取所有订单列表
     * @return array|mixed
     */
    public function getOrderList()
    {
        $state = Yii::$app->request->post('state',-1);
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $afters = Yii::$app->request->post('afters','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        // TODO 参数验证
        return $this->obj->getOrderList($state, $instrumentId, $afters, $before, $limit);
    }

    /**
     * 获取订单信息
     * @return array|mixed
     */
    public function getOrderInfo()
    {
        $order_id = Yii::$app->request->post('order_id','296764659235508224');
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getOrderInfo($order_id, $instrumentId);
    }

    /**
     * 获取成交明细
     * @return array|mixed
     */
    public function getFills()
    {
        $order_id = Yii::$app->request->post('order_id','294683725542936576');
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $after = Yii::$app->request->post('after','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        // TODO 参数验证
        return $this->obj->getFills($order_id, $instrumentId, $after, $before, $limit);
    }

    /**
     * 公共-获取合约挂单冻结数量
     * @return array|mixed
     */
    public function getHoldsAmount()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getHoldsAmount($instrumentId);
    }

    /**
     * 策略委托下单-止盈止损- mode为1是币币， mode为1是币币杠杆，
     * @return array|mixed
     */
    public function takeAlgoOrderStop()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $type = Yii::$app->request->post('type','1');
        $order_type = Yii::$app->request->post('order_type','1');
        $size = Yii::$app->request->post('size','1');
        $trigger_price = Yii::$app->request->post('trigger_price','1');
        $algo_price = Yii::$app->request->post('algo_price','1');
        // TODO 参数验证
        return $this->obj->takeAlgoOrderStop($instrumentId, $type, $order_type, $size, $trigger_price, $algo_price);
    }

    /**
     * 委托策略撤单-止盈止损
     * @return array|mixed
     */
    public function revokeAlgoOrders()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $algo_ids = Yii::$app->request->post('algo_ids',["375065465116119040"]);
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
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $order_type = Yii::$app->request->post('order_type','1');
        $status = Yii::$app->request->post('status','');
        $algo_id = Yii::$app->request->post('algo_id','375065465116119040');
        $after = Yii::$app->request->post('after','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        // TODO 参数验证
        return $this->obj->getAlgoList($instrumentId, $order_type, $status, $algo_id, $after, $before, $limit);
    }

    /**
     * 获取账户手续费费率
     * @return array|mixed
     */
    public function getTradeFee()
    {
        return $this->obj->getTradeFee();
    }

    /**
     * 市价全平
     * @return array|mixed
     */
    public function closePosition()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $direction = Yii::$app->request->post('direction','long');
        // TODO 参数验证
        return $this->obj->closePosition($instrumentId, $direction);
    }

    /**
     * 撤销所有平仓挂单
     * @return array|mixed
     */
    public function cancelAll()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $direction = Yii::$app->request->post('direction','long');
        // TODO 参数验证
        return $this->obj->cancelAll($instrumentId, $direction);
    }

    /**
     * 公共-获取合约信息
     * @return array|mixed
     */
    public function getProducts()
    {
        return $this->obj->getProducts();
    }

    /**
     * 公共-获取深度数据
     * @return array|mixed
     */
    public function getDepth()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $size = Yii::$app->request->post('size',1);
        // TODO 参数验证
        return $this->obj->getDepth($instrumentId, $size);
    }

    /**
     * 公共-获取全部ticker信息
     * @return array|mixed
     */
    public function getTicker()
    {
        return $this->obj->getTicker();
    }

    /**
     * 公共-获取某个ticker信息
     * @return array|mixed
     */
    public function getSpecificTicker()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getSpecificTicker($instrumentId);
    }

    /**
     * 公共-获取成交数据
     * @return array|mixed
     */
    public function getTrades()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $after = Yii::$app->request->post('after',0);
        $before = Yii::$app->request->post('before',0);
        $limit = Yii::$app->request->post('limit',0);
        // TODO 参数验证
        return $this->obj->getTrades($instrumentId, $after, $before, $limit);
    }

    /**
     * 公共-获取K线数据
     * @return array|mixed
     */
    public function getKline()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $granularity = Yii::$app->request->post('granularity','60');
        $start = Yii::$app->request->post('start','');
        $end = Yii::$app->request->post('end','');
        // TODO 参数验证
        return $this->obj->getKline($instrumentId, $granularity, $start, $end);
    }

    /**
     * 公共-获取指数信息
     * @return array|mixed
     */
    public function getIndex()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getIndex($instrumentId);
    }

    /**
     * 公共-获取法币汇率
     * @return array|mixed
     */
    public function getRate()
    {
        return $this->obj->getRate();
    }

    /**
     * 公共-获取平台总持仓量
     * @return array|mixed
     */
    public function getHolds()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getHolds($instrumentId);
    }

    /**
     * 公共-获取当前限价
     * @return array|mixed
     */
    public function getLimit()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getLimit($instrumentId);
    }

    /**
     * 公共-获取强平单
     * @return array|mixed
     */
    public function getLiquidation()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        $status = Yii::$app->request->post('status',1);
        $after = Yii::$app->request->post('after','');
        $before = Yii::$app->request->post('before','');
        $limit = Yii::$app->request->post('limit','');
        // TODO 参数验证
        return $this->obj->getLiquidation($instrumentId, $status, $after, $before, $limit);
    }

    /**
     * 公共-获取合约下一次结算时间(公共-获取合约资金费率)
     * @return array|mixed
     */
    public function getFundingTime()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getFundingTime($instrumentId);
    }

    /**
     * 公共-获取合约标记价格
     * @return array|mixed
     */
    public function getMarkPrice()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getMarkPrice($instrumentId);
    }

    /**
     * 公共-获取合约历史资金费率
     * @return array|mixed
     */
    public function getHistoricalFundingRate()
    {
        $instrumentId = Yii::$app->request->post('instrumentId','EOS-USD-SWAP');
        // TODO 参数验证
        return $this->obj->getHistoricalFundingRate($instrumentId);
    }
}
