<?php

//-------EmpireCMS.Seting.member-------

//会员系统相关配置
$ecms_config['member']['tablename']="数据库名.e_user";	//会员表
$user_tablename=$ecms_config['member']['tablename'];	//会员表
$ecms_config['member']['changeregisterurl']="";    //多会员组中转注册地址
$ecms_config['member']['registerurl']="http://localhost/ebb/register/";							//会员注册地址
$ecms_config['member']['loginurl']="";								//会员登录地址
$ecms_config['member']['quiturl']="";								//会员退出地址
$ecms_config['member']['chmember']=1;//是否使用原版会员表信息,0为原版,1为非原版
$ecms_config['member']['pwtype']=0;//密码保存形式,0为md5,1为明码,2为双重加密,3为16位md5
$ecms_config['member']['regtimetype']=0;//注册时间保存格式,0为正常时间,1为数值型
$ecms_config['member']['regcookietime']=0;//注册后登录保存时间(秒)
$ecms_config['member']['defgroupid']=0;//注册时会员组ID(elve的会员组,0为后台默认)
$ecms_config['member']['saltnum']=3;//SALT随机码字符数
$ecms_config['member']['utfdata']=0;//数据是否是UTF8编码,0为正常数据,1为UTF8编码

$ecms_config['memberf']['userid']='userid';//用户ID字段
$ecms_config['memberf']['username']='username';//用户名字段
$ecms_config['memberf']['password']='password';//密码字段
$ecms_config['memberf']['rnd']='enewsrnd';//随机密码字段
$ecms_config['memberf']['email']='email';//邮箱字段
$ecms_config['memberf']['registertime']='registertime';//注册时间字段
$ecms_config['memberf']['groupid']='enewsgroupid';//会员组字段
$ecms_config['memberf']['userfen']='enewsuserfen';//积分字段
$ecms_config['memberf']['userdate']='enewsuserdate';//有效期字段
$ecms_config['memberf']['money']='enewsmoney';//帐户余额字段
$ecms_config['memberf']['zgroupid']='enewszgroupid';//到期转向会员组字段
$ecms_config['memberf']['havemsg']='enewshavemsg';//提示短消息字段
$ecms_config['memberf']['checked']='enewschecked';//审核状态字段
$ecms_config['memberf']['salt']='enewssalt';//SALT加密字段
$ecms_config['memberf']['userkey']='enewsuserkey';//用户密钥字段

//-------EmpireCMS.Seting.member-------

?>