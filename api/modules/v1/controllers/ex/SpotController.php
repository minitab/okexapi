<?php

namespace api\modules\v1\controllers\ex;

use common\helpers\ResultHelper;
use common\components\okex\Spot;
use yii\rest\ActiveController;

/**
 * 币币
 *
 * Class SpotController
 * @package api\modules\v1\controllers\ex
 * @property \yii\db\ActiveRecord $modelClass
 * @author jianyan74 <751393839@qq.com>
 */
class SpotController extends ActiveController
{
    public $modelClass = '';

    protected $ex = '';

    /**
     * @var Spot
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
            $exClass = 'common\components\\'.$this->ex.'\\Spot';
        }
        $this->obj = new $exClass();
    }

    /**
     * 币币账户信息
     * @return array|mixed
     */
    public function actionGetAccountInfo()
    {
        $res = $this->obj->getAccountInfo();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 单一币种账户信息
     * @return array|mixed
     */
    public function actionGetCoinAccountInfo()
    {
        $res = $this->obj->getCoinAccountInfo();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 账单流水查询
     * @return array|mixed
     */
    public function actionGetLedgerRecord()
    {
        $res = $this->obj->getLedgerRecord();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 下单
     * @return array|mixed
     */
    public function actionTakeOrder()
    {
        $res = $this->obj->takeOrder();
        return ResultHelper::json(200, '提币成功',$res);
    }

    /**
     * 撤销指定订单
     * @return array|mixed
     */
    public function actionRevokeOrder()
    {
        $res = $this->obj->revokeOrder();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取订单列表
     * @return array|mixed
     */
    public function actionGetOrdersList()
    {
        $res = $this->obj->getOrdersList();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取订单信息
     * @return array|mixed
     */
    public function actionGetOrderInfo()
    {
        $res = $this->obj->getOrderInfo();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取成交明细
     * @return array|mixed
     */
    public function actionGetFills()
    {
        $res = $this->obj->getFills();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 策略委托下单-止盈止损- mode为1是币币， mode为1是币币杠杆，
     * @return array|mixed
     */
    public function actionTakeAlgoOrderStop()
    {
        $res = $this->obj->takeAlgoOrderStop();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 委托策略撤单-止盈止损
     * @return array|mixed
     */
    public function actionRevokeAlgoOrders()
    {
        $res = $this->obj->revokeAlgoOrders();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取委托单列表-止盈止损
     * @return array|mixed
     */
    public function actionGetAlgoList()
    {
        $res = $this->obj->getAlgoList();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取当前账户交易手续费费率
     * @return array|mixed
     */
    public function actionGetTradeFee()
    {
        $res = $this->obj->getTradeFee();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取币对信息
     * @return array|mixed
     */
    public function actionGetCoinInfo()
    {
        $res = $this->obj->getCoinInfo();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取深度数据
     * @return array|mixed
     */
    public function actionGetDepth()
    {
        $res = $this->obj->getDepth();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取全部ticker信息
     * @return array|mixed
     */
    public function getTicker()
    {
        $res = $this->obj->getTicker();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取某个ticker信息
     * @return array|mixed
     */
    public function getSpecificTicker()
    {
        $res = $this->obj->getSpecificTicker();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取成交数据
     * @return array|mixed
     */
    public function getDeal()
    {
        $res = $this->obj->getDeal();
        return ResultHelper::json(200, '获取成功',$res);
    }

    /**
     * 获取K线
     * @return array|mixed
     */
    public function getKine()
    {
        $res = $this->obj->getKine();
        return ResultHelper::json(200, '获取成功',$res);
    }
}
