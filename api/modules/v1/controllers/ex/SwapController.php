<?php

namespace api\modules\v1\controllers\ex;

use common\helpers\ResultHelper;
use common\components\okex\Swap;
use yii\rest\ActiveController;

/**
 * 永续合约
 *
 * Class SwapController
 * @package api\modules\v1\controllers\ex
 * @property \yii\db\ActiveRecord $modelClass
 * @author jianyan74 <751393839@qq.com>
 */
class SwapController extends ActiveController
{
    public $modelClass = '';

    protected $ex = '';

    /**
     * @var Swap
     */
    protected $obj = '';

    /**
     * 不用进行登录验证的方法
     * 例如： ['index', 'update', 'create', 'view', 'delete']
     * 默认全部需要验证
     *
     * @var array
     */
    protected $authOptional = [];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->ex = 'okex';
        if ($this->ex == 'okex') {
            $exClass = 'common\components\\'.$this->ex.'\\Swap';
        }
        $this->obj = new $exClass();
    }

    /**
     * 所有合约持仓信息
     * @return array|mixed
     */
    public function getPosition()
    {
        $res = $this->obj->getPosition();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 单个合约持仓信息
     * @return array|mixed
     */
    public function getSpecificPosition()
    {
        $res = $this->obj->getSpecificPosition();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 所有币种合约账户信息
     * @return array|mixed
     */
    public function getAccounts()
    {
        $res = $this->obj->getAccounts();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 单个币种合约账户信息
     * @return array|mixed
     */
    public function getCoinAccounts()
    {
        $res = $this->obj->getCoinAccounts();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取合约币种杠杆倍数
     * @return array|mixed
     */
    public function getSettings()
    {
        $res = $this->obj->getSettings();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 设定合约币种杠杆倍数
     * @return array|mixed
     */
    public function setLeverage()
    {
        $res = $this->obj->setLeverage();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 账单流水查询
     * @return array|mixed
     */
    public function getLedger()
    {
        $res = $this->obj->getLedger();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 下单
     * @return array|mixed
     */
    public function takeOrder()
    {
        $res = $this->obj->takeOrder();
        return ResultHelper::json(200, '获取成功',$res);
    }

    // TODO 批量下单

    /**
     * 撤销指定订单
     * @return array|mixed
     */
    public function revokeOrder()
    {
        $res = $this->obj->revokeOrder();
        return ResultHelper::json(200, '获取成功',$res);
    }

    // TODO 批量撤单

    /**
     * 获取所有订单列表
     * @return array|mixed
     */
    public function getOrderList()
    {
        $res = $this->obj->getOrderList();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取订单信息
     * @return array|mixed
     */
    public function getOrderInfo()
    {
        $res = $this->obj->getOrderInfo();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取成交明细
     * @return array|mixed
     */
    public function getFills()
    {
        $res = $this->obj->getFills();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取合约挂单冻结数量
     * @return array|mixed
     */
    public function getHoldsAmount()
    {
        $res = $this->obj->getHoldsAmount();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 策略委托下单-止盈止损- mode为1是币币， mode为1是币币杠杆，
     * @return array|mixed
     */
    public function takeAlgoOrderStop()
    {
        $res = $this->obj->takeAlgoOrderStop();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 委托策略撤单-止盈止损
     * @return array|mixed
     */
    public function revokeAlgoOrders()
    {
        $res = $this->obj->revokeAlgoOrders();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取委托单列表-止盈止损
     * @return array|mixed
     */
    public function getAlgoList()
    {
        $res = $this->obj->getAlgoList();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取账户手续费费率
     * @return array|mixed
     */
    public function getTradeFee()
    {
        $res = $this->obj->getTradeFee();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 市价全平
     * @return array|mixed
     */
    public function closePosition()
    {
        $res = $this->obj->closePosition();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 撤销所有平仓挂单
     * @return array|mixed
     */
    public function cancelAll()
    {
        $res = $this->obj->cancelAll();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取合约信息
     * @return array|mixed
     */
    public function getProducts()
    {
        $res = $this->obj->getProducts();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取深度数据
     * @return array|mixed
     */
    public function getDepth()
    {
        $res = $this->obj->getDepth();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取全部ticker信息
     * @return array|mixed
     */
    public function getTicker()
    {
        $res = $this->obj->getTicker();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取某个ticker信息
     * @return array|mixed
     */
    public function getSpecificTicker()
    {
        $res = $this->obj->getSpecificTicker();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取成交数据
     * @return array|mixed
     */
    public function getTrades()
    {
        $res = $this->obj->getTrades();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取K线数据
     * @return array|mixed
     */
    public function getKline()
    {
        $res = $this->obj->getKline();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取指数信息
     * @return array|mixed
     */
    public function getIndex()
    {
        $res = $this->obj->getIndex();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取法币汇率
     * @return array|mixed
     */
    public function getRate()
    {
        $res = $this->obj->getRate();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取平台总持仓量
     * @return array|mixed
     */
    public function getHolds()
    {
        $res = $this->obj->getHolds();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取当前限价
     * @return array|mixed
     */
    public function getLimit()
    {
        $res = $this->obj->getLimit();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取强平单
     * @return array|mixed
     */
    public function getLiquidation()
    {
        $res = $this->obj->getLiquidation();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取合约下一次结算时间(公共-获取合约资金费率)
     * @return array|mixed
     */
    public function getFundingTime()
    {
        $res = $this->obj->getFundingTime();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取合约标记价格
     * @return array|mixed
     */
    public function getMarkPrice()
    {
        $res = $this->obj->getMarkPrice();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 公共-获取合约历史资金费率
     * @return array|mixed
     */
    public function getHistoricalFundingRate()
    {
        $res = $this->obj->getHistoricalFundingRate();
        return ResultHelper::json(200, '获取成功',$res);
    }
}
