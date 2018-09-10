<?php
/**
 * Cms.php
 * Niushop商城系统 - 团队十年电商经验汇集巨献!
 * =========================================================
 * Copy right 2015-2025 山西牛酷信息科技有限公司, 保留所有权利。
 * ----------------------------------------------
 * 官方网址: http://www.niushop.com.cn
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
 * 任何企业和个人不允许对程序代码以任何形式任何目的再发布。
 * =========================================================
 * @author : niuteam
 * @date : 2015.1.17
 * @version : v1.0.0.0
 */
namespace app\shop\controller;
use app\wap\controller\Order;
use data\model\AlbumPictureModel;
use data\model\CityModel;
use data\model\DistrictModel;
use data\model\NsGoodsAttributeModel;
use data\model\NsGoodsModel;
use data\model\NsGoodsSkuModel;
use data\model\ProvinceModel;
use data\service\Address;
use data\service\Member;
use think\Cache;
use data\model\NsGoodsCategoryModel as NsGoodsCategoryModel;

/**
 * 河北采购网接口控制器

 */
class Api extends BaseController
{
    const appKey ='epoint';
    const appSecret='7db8fbcc-a9c2-4010-bc79-e7c4bcd9ab04';
    private $json = '';

    public function __construct()
    {
        $json = input('data');
        $this->json = json_decode($json,true);
    }

    /**
     * 获取token
     * @return string
     */
    public function getAccessToken(){

        $appKey =   $this->json['appKey'];
        $appSecret =   $this->json['appSecret'];
        if($appKey==self::appKey&&$appSecret==self::appSecret){
            $data['accessToken'] = self::setToken();
            return self::message($data,'获取成功');
        }else{
            $data['accessToken'] = '';
            return self::message($data,'获取失败，检查秘钥',false);
        }
    }

    /**
     * 设置token
     * @return string
     */
    private static function setToken()
    {
        $str = md5(uniqid(md5(microtime(true)),true));  //生成一个不会重复的字符串
        $str = sha1($str);  //加密
        Cache::set('token',$str,86400);//缓存24小时
        return $str;
    }

    /**
     * 返回消息
     * @param $data
     * @param string $returnMsg
     * @param int $isSuccess
     * @return string
     */
    private static function message($data, $returnMsg='', $isSuccess=true){
        $data['returnMsg'] = $returnMsg;
        $data['isSuccess'] = $isSuccess;
        return json_encode($data);
    }

    /**
     * token验证
     * @param $accessToken
     * @return bool
     */
    private function checkToken($appKey,$accessToken){
        $token = cache('token');

        if(!$token){
            return false;
        }
        if($accessToken==$token&&self::appKey==$appKey){
            return true;
        }
        return false;
    }


    /**
     * 返回商品分类
     * @param NsGoodsCategoryModel $goodsCategoryModel
     * @return string
     */
    public function getProductCategory(NsGoodsCategoryModel $goodsCategoryModel){
        if($this->checkToken($this->json['appKey'],$this->json['accessToken'])){
          $data['result'] =  $goodsCategoryModel->where('level',3)->where('is_visible',1)->field('category_name as name,category_id as categoryId')->select();
          return self::message($data,'商品分类信息');
        }
        return self::message('','token校验失败',false);
    }


    /**
     * 取得商品ID
     * @param NsGoodsCategoryModel $goodsCategoryModel
     * @return string
     */
    public function getProductPool(NsGoodsCategoryModel $goodsCategoryModel){
        if($this->json['categoryId']<1){
            return self::message('','categoryId字段为空',false);
        }
        if($this->checkToken($this->json['appKey'],$this->json['accessToken'])){
            $data['sku'] = $goodsCategoryModel->alias('category')->join('ns_goods goods','category.category_id = goods.category_id')->join('ns_goods_sku sku','sku.goods_id = goods.goods_id')->where('category.category_id',$this->json['categoryId'])->column('sku_id');
            return self::message($data,'商品分类信息');
        }
        return self::message('','token校验失败',false);
    }


    /**
     * 获取商品详情
     * @param NsGoodsModel $goodsModel
     * @return string
     */
    public function getProductDetail(NsGoodsSkuModel $goodsSkuModel,NsGoodsAttributeModel $attributeModel){
        if($this->json['sku']<1){
            return self::message('','sku字段为空',false);
        }
        if($this->checkToken($this->json['appKey'],$this->json['accessToken'])){
          $data =  $goodsSkuModel->alias('sku')->where('sku.sku_id',$this->json['sku'])->join('ns_goods goods','goods.goods_id = sku.goods_id')->join('sys_album_picture picture','goods.picture=pic_id')->field('sku.sku_id as sku,picture.pic_cover as image,goods.brand_id as brand,goods.goods_name as name,goods.introduction,goods.goods_id')->find();

            $goods_attribute_list = $attributeModel->getQuery([
                'goods_id' => $data['goods_id']
            ], ' attr_value, attr_value_id,attr_value_name', 'sort');

            $goods_attribute_list_new = array();
            foreach ($goods_attribute_list as $item) {
                $attr_value_name = '';
                foreach ($goods_attribute_list as $key => $item_v) {
                    if ($item_v['attr_value_id'] == $item['attr_value_id']) {
                        $attr_value_name .= $item_v['attr_value_name'] . ',';
                        unset($goods_attribute_list[$key]);
                    }
                }
                if (!empty($attr_value_name)) {
                    array_push($goods_attribute_list_new, array(
                        'attr_value_id' => $item['attr_value_id'],
                        'attr_value' => $item['attr_value'],
                        'attr_value_name' => rtrim($attr_value_name, ',')
                    ));
                }
            }

            $data['param'] = json_encode($goods_attribute_list_new);
            return self::message($data,'商品详情信息');
        }
        return self::message('','token校验失败',false);
    }

    /**
     * 2.1.4 获取商品图片接口
     * @param AlbumPictureModel $albumPictureModel
     * @param NsGoodsModel $goodsModel
     * @return string
     */
    public function getProductImage(AlbumPictureModel $albumPictureModel, NsGoodsSkuModel $goodsSkuModel){

        if(empty($this->json['sku'])){
            return self::message('','sku字段为空',false);
        }

        if($this->checkToken($this->json['appKey'],$this->json['accessToken'])){
            $goods = $goodsSkuModel->alias('sku')->join('ns_goods goods','sku.goods_id=goods.goods_id')->where('sku_id','in',implode(',',$this->json['sku']))->field('sku.sku_id,goods.goods_id,goods.picture,goods.img_id_array')->select();

            $result = array();
            $data = array();
            foreach($goods as $key=>$val){
                $picture = $albumPictureModel->where('pic_id','in',$val['img_id_array'])->field('pic_id,pic_cover')->select();
                $urls = array();
                foreach($picture as  $v){
                    if($v['pic_id']==$val['picture']){
                        $urls['primary'] = 1;
                    }else{
                        $urls['primary'] = 0;
                    }
                    $urls['path'] = $v['pic_cover'];
                    $result['urls']['path'] =  $urls['path'];
                    $result['urls']['primary'] =  $urls['primary'];
                    $result['sku_id'] = $val['sku_id'];
                }
                $data[$key]['result'] = $result;
            }

            return  self::message($data,'商品图片信息');

        }
        return self::message('','token校验失败',false);
    }

    /**
     * 2.1.5 商品上下架状态查询接口
     * @param NsGoodsModel $goodsModel
     * @return string
     */
    public function getProductOnShelvesInfo(NsGoodsSkuModel $goodsSkuModel,NsGoodsModel $goodsModel){
        if(empty($this->json['sku'])){
            return self::message('','sku字段为空',false);
        }

        if($this->checkToken($this->json['appKey'],$this->json['accessToken'])){
            $goods_sku = $goodsSkuModel->where('sku_id','in',implode(',',$this->json['sku']))->select();
            $onShelvesList = array();
            foreach($goods_sku as $k=>$v){
                $onShelvesList[$k]['skuId'] = $v['sku_id'];
                $onShelvesList[$k]['listState'] = $goodsModel->where('goods_id',$v['goods_id'])->value('state');
            }
           $data['listState'] = $onShelvesList;
           return self::message($data,'商品上下架状态信息');
        }
        return self::message('','token校验失败',false);
    }

    /**
     * 查询库存
     * @param NsGoodsModel $goodsModel
     * @return string
     */
    public function getProductInventory(NsGoodsSkuModel $goodsSkuModel,NsGoodsModel $goodsModel){
       if(empty($this->json['sku'])){
           return self::message('','sku字段为空',false);
       }
        $this->json['sku'] = intval($this->json['sku']);

       if(empty($this->json['num'])){
           return self::message('','num字段为空',false);
       }
       if($this->checkToken($this->json['appKey'],$this->json['accessToken'])){
           $goods_sku=  $goodsSkuModel->where('sku_id',$this->json['sku'])->value('stock,goods_id')->find();
           $state = $goodsModel->where('goods_id',$goods_sku['goods_id'])->value('state');
           $need_num = intval($this->json['num']);
           if($state<1){
               $data['state'] = '01';
           }
           if($goods_sku['stock']>=$need_num){
               $data['state'] = '00';
           }
           if($goods_sku['stock']<1){
               $data['state'] = '02';
           }
           if($goods_sku['stock']<$need_num){
               $data['state'] = '03';
           }
           $data['skuId'] =  $this->json['sku'];
           return self::message($data,'省份信息');
       }

       return self::message('','token校验失败',false);

   }

    /**
     * 查询商品折扣价格 这里的折扣价格 是按最低的规格计算的
     * @param NsGoodsModel $goodsModel
     * @return string
     */
    public function queryCountPrice(NsGoodsSkuModel $goodsSkuModel){
        if(empty($this->json['sku'])){
            return self::message('','sku字段为空',false);
        }
        if($this->checkToken($this->json['appKey'],$this->json['accessToken'])) {
            $priceList = $goodsSkuModel->alias('sku')->join('ns_goods goods','sku.goods_id = goods.goods_id')->join('ns_promotion_discount_goods discount', 'goods.promote_id=discount.discount_id','left')->where('sku.sku_id', 'in', implode(',', $this->json['sku']))->where('discount.status', 1)->fild('goods.goods_id as skuId,goods.promotion_price as price,discount.discount')->select();

            $data['priceList'] = $priceList;

            return self::message($data, '商品折扣价格');
        }
        return self::message('','token校验失败',false);


    }


    /**
     * 创建订单（实物商品）
     */
    public function orderCreate(\data\service\Order $order,Member $member)
    {


        $out_trade_no = input('tradeNO'); //来自及接口的订单号
        $use_coupon = 0; // 优惠券
        $integral = 0; // 积分

        $sku = $this->json['sku'];
        $list= array();
        foreach($sku as $k=>$v){
            $list[$k] = $v['skuId'].':'.$v['num'];
        }
        $goods_sku_list = explode(',',$list); // 商品列表

        $leavemessage = request()->post('leavemessage', ''); // 留言
        $user_money = 0; // 使用余额
        $pay_type = request()->post("pay_type", 1); // 支付方式
        $buyer_invoice = request()->post("buyer_invoice", ""); // 发票
        $pick_up_id = 0; // 自提点
        $shipping_type = request()->post("shipping_type",1); // 配送方式，1：商家配送，2：自提  3：本地配送
        $shipping_time = request()->post("shipping_time", 0); // 配送时间
        $express_company_id = request()->post("express_company_id", 0); // 物流公司
        $buyer_ip = request()->ip();
        $distribution_time_out = request()->post('distribution_time_out', ''); // 配送指定时间段

        $address = new Address();
        $city = intval(input('city')-130);
        $district = intval(input('city')-13000)>0?intval(input('city')-13000):intval(input('city')-1300);
        $data['address_info'] = $address->getAddress(3,$city , $district);

        $data['address'] =trim(input('address'));

        $CityModel = new CityModel();
        $districtModel = new DistrictModel();

        $data['city'] = $CityModel->where('city_id',$city)->value('city_name');
        $data['district'] = $districtModel->where('district_id',$city)->value('district_name');
        $data['consigner'] = trim(input('name'));
        $data['mobile'] = trim(input('mobile'));
        $data['phone'] = trim(input('phone'));
        $address = $data;
      //  $address['']
        $coin = 0; // 购物币

        // 查询商品限购
        $purchase_restriction = $order->getGoodsPurchaseRestrictionForOrder($goods_sku_list);
        if (! empty($purchase_restriction)) {
            $res = array(
                "code" => 0,
                "message" => $purchase_restriction
            );
            return $res;
        } else {
            $order_id = $order->orderCreate('1', $out_trade_no, $pay_type, $shipping_type, '1', $buyer_ip, $leavemessage, $buyer_invoice, $shipping_time, $address['mobile'], $address['province'], $address['city'], $address['district'], $address["address_info"].'&nbsp;'.$address['address'], $address['zip_code'], $address['consigner'], $integral, $use_coupon, 0, $goods_sku_list, $user_money, $pick_up_id, $express_company_id, $coin, $address["phone"], $distribution_time_out);
            // Log::write($order_id);
            if ($order_id > 0) {
                $order->deleteCart($goods_sku_list, $this->uid);
                $_SESSION['order_tag'] = ""; // 订单创建成功会把购物车中的标记清楚
                return AjaxReturn($out_trade_no);
            } else {
                return AjaxReturn($order_id);
            }
        }
    }


    /**
     *生成xml
     */
    public function city()
    {


        $citys = $CityModel->where('province_id',3)->select();


        $AllCitys = array();

        $province['Name'] = '河北省';
        $province['ID'] = '';
        $province['City_ID'] = '133';
        $AllCity[] = $province;
        foreach($citys as $k=>$v)
        {
            $city['Name'] = $v['city_name'];
            $city['ID'] = '';
            $city['City_ID'] = '13'.$v['city_id'];
            $AllCity[] = $city;

            $districts = $districtModel->where('city_id',$v['city_id'])->select();
            foreach($districts as $key=>$value)
            {
                $district['Name'] = $value['district_name'];
                $district['ID'] = '';
                $district['City_ID'] = '13'.$value['district_id'];
                $AllCity[] = $district;
            }
        }
        $AllCitys['AllCity'] = $AllCity;

        $data['AllCitys'] = $AllCitys;


        file_put_contents(__DIR__.'/xml.xml',json_encode($data));

        }

}