<?php

namespace common\components\okex;

use Yii;
use okv3\AccountApi;

/**
 * Class Account
 * @package common\components\okex
 */
class Account
{
    protected $config = [];
    /**
     * @var AccountApi
     */
    protected $obj = '';

    public function __construct()
    {
        $this->config = Yii::$app->params['okex_config'];
        $this->obj = new AccountApi($this->config);
    }

    /**
     * 资金账户信息，多个币种
     * @return array|mixed
     */
    public function getWalletInfo()
    {
        return $this->obj->getWalletInfo();
    }

    /**
     * 单一币种账户信息
     * @return array|mixed
     */
    public function getSpecialWalletInfo()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        // TODO 参数验证
        return $this->obj->getSpecialWalletInfo($coin);
    }

    /**
     * 资金划转
     * @return array|mixed
     */
    public function transfer()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        $amount = Yii::$app->request->post('amount','0.1');
        $from = Yii::$app->request->post('from','6');
        $to = Yii::$app->request->post('to','1');
        $sub_account = Yii::$app->request->post('sub_account','');
        $instrument_id = Yii::$app->request->post('instrument_id','');
        $to_instrument_id = Yii::$app->request->post('to_instrument_id','');
        // TODO 参数验证
        return $this->obj->transfer($coin,$amount,$from,$to,$sub_account,$instrument_id,$to_instrument_id);
    }

    /**
     * 提币
     * @return array|bool|false|mixed|string
     * @throws \Exception
     */
    public function withdrawal()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        $amount = Yii::$app->request->post('amount','1');
        $destination = Yii::$app->request->post('destination','4');
        $to_address = Yii::$app->request->post('to_address','ceshi:OKEx');
        $trade_pwd = Yii::$app->request->post('trade_pwd','123456');
        $fee = Yii::$app->request->post('fee','0.1');
        // TODO 参数验证
        $feeRes = $this->obj->getWithdrawalFee($coin);
        if ($fee < $feeRes['min_fee']) {
            throw new \Exception('手续费不足');
        }
        if ($fee > $feeRes['max_fee']) {
            throw new \Exception('手续费偏高');
        }

        return $this->obj->withdrawal($coin,$amount,$destination,$to_address,$trade_pwd,$fee);
    }

    /**
     * 账单流水
     * @return array|mixed
     */
    public function getLeger()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        // TODO 参数验证
        return $this->obj->getLeger($coin);
    }

    /**
     * 获取充值地址
     * @return array|mixed
     */
    public function getDepositAddress()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        // TODO 参数验证
        return $this->obj->getDepositAddress($coin);
    }

    /**
     * 获取账户资产估值
     * @return array|mixed
     */
    public function getAssetValuation()
    {
        return $this->obj->getAssetValuation();
    }

    /**
     * 获取子账户余额信息
     * @return array|mixed
     */
    public function getSubAccount()
    {
        $sub_account = 'ceshi001';
        // TODO 参数验证
        return $this->obj->getSubAccount($sub_account);
    }

    /**
     * 查询所有币种的提币记录
     * @return array|mixed
     */
    public function getWithdrawalHistory()
    {
        return $this->obj->getWithdrawalHistory();
    }

    /**
     * 查询单个币种的提币记录
     * @return array|mixed
     */
    public function getCoinWithdrawalHistory()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        // TODO 参数验证
        return $this->obj->getCoinWithdrawalHistory($coin);
    }

    /**
     * 获取所有币种充值记录
     * @return array|mixed
     */
    public function getDepositHistory()
    {
        return $this->obj->getDepositHistory();
    }

    /**
     * 查询单个币种的充值记录
     * @return array|mixed
     */
    public function getCoinDepositHistory()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        // TODO 参数验证
        return $this->obj->getCoinDepositHistory($coin);
    }

    /**
     * 获取币种列表
     * @return array|mixed
     */
    public function getCurrencies()
    {
        return $this->obj->getCurrencies();
    }

    /**
     * 提币手续费
     * @return array|mixed
     */
    public function getWithdrawalFee()
    {
        $coin = Yii::$app->request->post('coin','BTC');
        // TODO 参数验证
        return $this->obj->getWithdrawalFee($coin);
    }
}
