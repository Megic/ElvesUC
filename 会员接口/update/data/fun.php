<?php
//返回变量
function ReturnRepUserVar(){
	$var="tablename,userid,username,password,dopass,salt,saltnum,email,registertime,register,changeregisterurl,registerurl,utfdata,userfen,money,loginurl,quiturl,chmember";
	return $var;
}

//提示信息
function InstallShowMsg($msg){
	echo"<script>alert('".$msg."');history.go(-1);</script>";
	exit();
}

//更新接口文件
function SetUserCOMConfig($add){
	$filetext=ReadFiletext('data/user.php');
	if(empty($filetext))
	{
		InstallShowMsg('文件 /core/update/data/user.php 丢失,安装不成功.');
	}
	if(stristr($add['tablename'],'enewsmember'))
	{
		$add['chmember']=0;
	}
	else
	{
		$add['chmember']=1;
	}
	$vr=explode(",",ReturnRepUserVar());
	$count=count($vr);
	for($i=0;$i<$count;$i++)
	{
		$vname=$vr[$i];
		if($vname=='chmember'||$vname=='dopass'||$vname=='register'||$vname=='saltnum'||$vname=='utfdata')
		{
			$value=intval($add[$vname]);
		}
		else
		{
			$value=addslashes($add[$vname]);
		}
		$filetext=str_replace("[!@--".$vname."--@!]",$value,$filetext);
	}
	$configtext=UserCOMReturnConfigtext($filetext);
	//写入配置文件
	$fp=@fopen("../config/config.php","w");
	if(!$fp)
	{
		InstallShowMsg(' /core/config/config.php 文件权限没有设为0777，安装不成功.');
	}
	@fputs($fp,$configtext);
	@fclose($fp);
	//运行接口安装文件
	if($add['doinstall']==1)
	{
		echo"正运行接口安装程序......<script>self.location.href='index.php?install=1&setup=alter';</script>";
		exit();
	}
	elseif($add['doinstall']==2)
	{
		echo"正运行接口升级程序......<script>self.location.href='index.php?install=1&setup=update';</script>";
		exit();
	}
	echo"<script>self.location.href='index.php?setup=success';</script>";
	exit();
}

//运行安装接口文件
function InstallUserCOM(){
	global $Elves,$ecms_config;
	$user_userfen="enewsuserfen";
	$user_money="enewsmoney";
	$user_salt="enewssalt";
	$sql=$Elves->query1("alter table ".$ecms_config['member']['tablename']." 
	add ".$ecms_config['memberf']['groupid']." smallint NOT NULL default '0',
	add ".$ecms_config['memberf']['rnd']." char(20) NOT NULL default '',
	add ".$user_userfen." mediumint(8) unsigned NOT NULL default '0',
	add ".$user_money." float(11,2) NOT NULL default '0.00',
	add ".$ecms_config['memberf']['userdate']." int(10) unsigned NOT NULL default '0',
	add ".$ecms_config['memberf']['zgroupid']." smallint not null default '0',
	add ".$ecms_config['memberf']['havemsg']." tinyint(1) not null default '0',
	add ".$ecms_config['memberf']['userkey']." char(12) NOT NULL default '',
	add ".$user_salt." char(8) NOT NULL default '',
	add ".$ecms_config['memberf']['checked']." tinyint(1) not null default '1';");
	if(!$sql)
	{
		echo"运行安装接口程序出现以下错误:<br><font color=red>".mysql_error()."</font><br><br><a href='index.php'>点击返回重新设置</a>";
		exit();
	}
	db_close();
	$Elves=null;
	echo"<script>self.location.href='index.php?setup=success';</script>";
	exit();
}

//运行升级接口文件
function UpdateUserCOM(){
	global $Elves,$ecms_config;
	$user_salt="enewssalt";
	$sql=$Elves->query1("alter table ".$ecms_config['member']['tablename']." 
	add ".$user_salt." char(8) NOT NULL default '',
	add ".$ecms_config['memberf']['userkey']." char(12) NOT NULL default '';");
	if(!$sql)
	{
		echo"运行安装接口程序出现以下错误:<br><font color=red>".mysql_error()."</font><br><br><a href='index.php'>点击返回重新设置</a>";
		exit();
	}
	db_close();
	$Elves=null;
	echo"<script>self.location.href='index.php?setup=success';</script>";
	exit();
}

//返回新文件内容
function UserCOMReturnConfigtext($usercomtext){
	$configtext=ReadFiletext('../config/config.php');
	if(empty($configtext))
	{
		InstallShowMsg(' /core/config/config.php 文件权限没有设为0777，安装不成功.');
	}
	$exp='//-------EmpireCMS.Seting.member-------';
	$r=explode($exp,$configtext);
	if($r[0]=='')
	{
		InstallShowMsg(' /core/config/config.php 文件权限没有设为0777，安装不成功.');
	}
	$r[1]=$usercomtext;
	$setting=$r[0].$exp.$r[1].$exp.$r[2];
	return $setting;
}

//导入默认项
function LoadUserCOMInfo($p){
	if($p)
	{
		$p=str_replace('/','',$p);
		$p=str_replace('.','',$p);
		$p=str_replace("\\",'',$p);
		$f='data/def/'.$p.'.php';
	}
	else
	{
		$f='../member/class/user.php';
	}
	return $f;
}
?>