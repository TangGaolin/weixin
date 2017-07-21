<?php
/**
 * Created by PhpStorm.
 * User: gaolintang
 * Date: 2017/7/21
 * Time: 下午1:24
 */
namespace App\Services;
use App\Models\UserShare;
class UserShareService
{

    protected $userShareModel;
    public function __construct(UserShare $userShare)
    {
        $this->userShareModel = $userShare;
    }

    public function buyItem($save_data)
    {
        return $this->userShareModel->insert($save_data);
    }

    public function getOrderInfo($whereData)
    {
        $res = $this->userShareModel->where($whereData)->first();
        return $res ? $res->toArray() : [];
    }

    public function updateOrder($whereData,$update_data)
    {
        return $this->userShareModel->where($whereData)->update($update_data);
    }


}