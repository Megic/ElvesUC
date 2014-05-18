<?php

//-------Empirelve.Seting.member-------

//会员系统相关配置
$elve_config['member']['tablename']="数据库名.mxb_user";	//会员表
$user_tablename=$elve_config['member']['tablename'];	//会员表
$elve_config['member']['changeregisterurl']="";    //多会员组中转注册地址
$elve_config['member']['registerurl']="http://localhost/molyx/register.php";							//会员注册地址
$elve_config['member']['loginurl']="";								//会员登录地址
$elve_config['member']['quiturl']="";								//会员退出地址
$elve_config['member']['chmember']=1;//是否使用原版会员表信息,0为原版,1为非原版
$elve_config['member']['pwtype']=2;//密码保存形式,0为md5,1为明码,2为双重加密,3为16位md5
$elve_config['member']['regtimetype']=1;//注册时间保存格式,0为正常时间,1为数值型
$elve_config['member']['regcookietime']=0;//注册后登录保存时间(秒)
$elve_config['member']['defgroupid']=0;//注册时会员组ID(elve的会员组,0为后台默认)
$elve_config['member']['saltnum']=3;//SALT随机码字符数
$elve_config['member']['utfdata']=1;//数据是否是UTF8编码,0为正常数据,1为UTF8编码

$elve_config['memberf']['userid']='id';//用户ID字段
$elve_config['memberf']['username']='name';//用户名字段
$elve_config['memberf']['password']='password';//密码字段
$elve_config['memberf']['rnd']='melvernd';//随机密码字段
$elve_config['memberf']['email']='email';//邮箱字段
$elve_config['memberf']['registertime']='joindate';//注册时间字段
$elve_config['memberf']['groupid']='melvegroupid';//会员组字段
$elve_config['memberf']['userfen']='melveuserfen';//积分字段
$elve_config['memberf']['userdate']='melveuserdate';//有效期字段
$elve_config['memberf']['money']='melvemoney';//帐户余额字段
$elve_config['memberf']['zgroupid']='melvezgroupid';//到期转向会员组字段
$elve_config['memberf']['havemsg']='melvehavemsg';//提示短消息字段
$elve_config['memberf']['checked']='melvechecked';//审核状态字段
$elve_config['memberf']['salt']='salt';//SALT加密字段
$elve_config['memberf']['userkey']='melveuserkey';//用户密钥字段

//-------Empirelve.Seting.member-------

?>