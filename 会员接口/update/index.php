<?php
error_reporting(0);
$setup=$_GET['setup'];
require('data/fun.php');
if($_GET['install']==1)
{
	include("../class/connect.php");
	include("../class/db_sql.php");
	include("../class/functions.php");
	$link=db_connect();
	$Elves=new mysqlquery();
	if($setup=="SetConfig")
	{
		SetUserCOMConfig($_POST);
	}
	elseif($setup=="alter")
	{
		InstallUserCOM();
	}
	elseif($setup=="update")
	{
		UpdateUserCOM();
	}
	else
	{}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Elves网站管理系统 - 会员接口安装</title>
<style>
a:link     { COLOR: #000000; TEXT-DECORATION: none }
a:visited   { COLOR: #000000 ; TEXT-DECORATION: none }
a:active   { COLOR: #000000 ; TEXT-DECORATION: underline }
a:hover    { COLOR: #000000 ; TEXT-DECORATION:underline }
.home_top { border-top:2px solid #4798ED; }
.home_path { background:#4798ED; padding-right:10px; color:#F0F0F0; font-size: 11px; }
td, th, caption { font-family:  "宋体"; font-size: 12px; color:#000000;  LINE-HEIGHT: 165%; }
.hrLine{MARGIN: 0px 0px; BORDER-BOTTOM: #807d76 1px dotted;}
</style>
</head>
<body  leftmargin="0" topmargin="0" marginwidth="00">
	
<table width=768 cellspacing=0 cellpadding=3 class=home_top align=center>
  <tr> 
    <td width="24%" style='padding-top:3px;'><img src="data/img/empiresoft.jpg" width="180" height="65"></td>
    <td width="76%" align=right valign="bottom" style='padding-top:3px;'><a href="http://www.PHome.Net" target="_blank">官方网站</a> 
      &nbsp;&nbsp;<a href="http://bbs.PHome.Net" target="_blank">支持论坛</a> &nbsp;&nbsp;<a href="http://www.PHome.Net/product" target="_blank">Elves产品</a>&nbsp; 
      &nbsp;<a href="http://www.dotool.cn" target="_blank">站长工具</a>&nbsp; &nbsp;<a href="http://www.phome.net/product/Ebak.html" target="_blank"><font color=green>MYSQL大数据备份工具下载</font></a></td>
  </tr>
  <tr> 
    <td colspan="2"><hr class=hrline size=1></td>
  </tr>
  <tr> 
    <td height=22 colspan="2" align=center><B><font size="3"><a href="index.php">欢迎进入《Elves网站管理系统》万能会员整合接口设置程序</a></font></B></td>
  </tr>
  <tr> 
    <td height=2 colspan="2" class=home_path style='padding-left:10px;'> </td>
  </tr>
  <tr>
    <td height=10 colspan="2" align=center bgcolor="F3F3F3"></td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="F3F3F3"> 
	  <?
	  if($setup=="success")
	  {
	  ?>
	  <br>
	  <table width="60%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="D6E0EF">
        <tr> 
          <td height="23"><div align="center"><strong>接口设置完毕</strong></div></td>
        </tr>
        <tr> 
          <td height="80" bgcolor="#FFFFFF"> 
            <div align="center"><strong><a href="index.php">恭喜您！会员整合接口设置完毕。</a></strong><br>
              (安全起见，请马上删除 /core/update/ 目录里的所有文件。) </div></td>
        </tr>
      </table>
	  <?
	  }
	  else
	  {
	  	  $p=$_GET['p'];
		  include("../class/connect.php");
		  @include LoadUserCOMInfo($p);
		  if($elve_config['member']['pwtype']!=2)
		  {
		  	$passdiv=" style='display:none'";
		  }
		  if(!$elve_config['memberf']['checked'])
		  {
		  	$doinstall=2;
		  }
		  elseif(!strstr($elve_config['member']['tablename'],'melvemember')||$p)
		  {
		  	$doinstall=1;
		  }
		  else
		  {
		  	$doinstall=0;
		  }
	  ?>
        <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="D6E0EF" id="setform">
          <tr> 
            <td height="23"><strong>提示信息</strong></td>
          </tr>
          <tr> 
            <td height="25" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="3" cellspacing="1">
              <tr> 
                  
                <td height="18">
<li>请确认你要整合的程序是使用MYSQL数据库。</li></td>
                </tr>
                <tr>
                  
                <td height="18">
<li>整合的会员表，Elves数据库帐号必须有操作权限。如果没有，建议你把两个程序装在同一个数据库里。</li></td>
                </tr>
                <tr> 
                  
                <td height="18"> 
                  <li>如果选择现成的接口范例，则仅需设置红色设置项的内容。</li></td>
                </tr>
              </table></td>
          </tr>
        </table>
		<br>
        <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="D6E0EF">
        <form name="form1" method="post" action="index.php?install=1&setup=SetConfig">
          <tr bgcolor="#FFFFFF"> 
            <td colspan="3"> <div align="center">选择接口范例: 
                <select name="p" id="p" onchange=window.location='index.php?p='+this.options[this.selectedIndex].value+'#setform'>
                  <option>--- 选择范例 ---</option>
                  <option value="default"<?=$p=='default'?' selected':''?>>默认接口</option>
                  <option value="discuz"<?=$p=='discuz'?' selected':''?>>Discuz论坛</option>
				  <option value="discuzx"<?=$p=='discuzx'?' selected':''?>>DiscuzX论坛</option>
                  <option value="phpwind"<?=$p=='phpwind'?' selected':''?>>PHPwind论坛</option>
                  <option value="molyx"<?=$p=='molyx'?' selected':''?>>Molyx论坛</option>
                  <option value="dvbbs"<?=$p=='dvbbs'?' selected':''?>>动网论坛[PHP]</option>
                  <option value="vbb"<?=$p=='vbb'?' selected':''?>>VBB论坛</option>
                  <option value="phpbb"<?=$p=='phpbb'?' selected':''?>>PHPBB论坛</option>
                  <option value="ebb"<?=$p=='ebb'?' selected':''?>>EBB论坛</option>
                </select>
              </div></td>
          </tr>
          <tr> 
            <td width="20%"><div align="center"><strong>设置项</strong></div></td>
            <td width="47%"><div align="center"><strong>参数值</strong></div></td>
            <td width="33%"><div align="center"><strong>注释</strong></div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="30"><strong>操作动作</strong></td>
            <td colspan="2"><strong> 
              <input type="radio" name="doinstall" value="0"<?=$doinstall==0?' checked':''?>>
              设置接口参数 
              <input type="radio" name="doinstall" value="1"<?=$doinstall==1?' checked':''?>>
              安装接口 </strong></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25"><font color="#FF0000">用户表</font></td>
            <td><input name="tablename" type="text" id="tablename2" value="<?=$elve_config['member']['tablename']?>" size="38"> 
            </td>
            <td>会员数据表,格式为：<font color="#666666">数据库.会员表</font></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">用户ID字段</td>
            <td> <input name="userid" type="text" id="userid" value="<?=$elve_config['memberf']['userid']?>" size="38"></td>
            <td>用户ID字段</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">用户名字段</td>
            <td> <input name="username" type="text" id="username" value="<?=$elve_config['memberf']['username']?>" size="38"></td>
            <td>用户名字段</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">密码字段</td>
            <td> <input name="password" type="text" id="password" value="<?=$elve_config['memberf']['password']?>" size="38"></td>
            <td>密码字段</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">密码保存形式</td>
            <td> <select name="dopass" id="dopass" onchange="if(this.options[this.selectedIndex].value==2){passdiv.style.display='';}else{passdiv.style.display='none';}">
                <option value="0"<?=$elve_config['member']['pwtype']==0?' selected':''?>>MD5加密</option>
                <option value="1"<?=$elve_config['member']['pwtype']==1?' selected':''?>>没有加密</option>
                <option value="2"<?=$elve_config['member']['pwtype']==2?' selected':''?>>双重MD5加密</option>
                <option value="3"<?=$elve_config['member']['pwtype']==3?' selected':''?>>16位MD5加密</option>
              </select></td>
            <td>密码保存形式</td>
          </tr>
          <tr bgcolor="#FFFFFF" id="passdiv"<?=$passdiv?>> 
            <td height="25">&nbsp;</td>
            <td>salt字段: 
              <input name="salt" type="text" id="salt" value="<?=$elve_config['memberf']['salt']?>" size="12">
              随机码字符数: 
              <input name="saltnum" type="text" id="saltnum" value="<?=$elve_config['member']['saltnum']?>" size="2"></td>
            <td>双重MD5加密需要设置</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">邮箱字段</td>
            <td> <input name="email" type="text" id="email" value="<?=$elve_config['memberf']['email']?>" size="38"></td>
            <td>邮箱字段</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25"> 注册时间字段</td>
            <td> <input name="registertime" type="text" id="registertime" value="<?=$elve_config['memberf']['registertime']?>" size="38"></td>
            <td>注册时间字段</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">注册时间保存形式</td>
            <td> <select name="register" id="register">
                <option value="0"<?=$elve_config['member']['regtimetype']==0?' selected':''?>>正常时间格式</option>
                <option value="1"<?=$elve_config['member']['regtimetype']==1?' selected':''?>>数值型</option>
              </select></td>
            <td>注册时间保存形式</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">点数字段</td>
            <td><input name="userfen" type="text" id="userfen" value="<?=$elve_config['memberf']['userfen']?>" size="38"></td>
            <td>如需整合点数字段，请输入要整合的字段名.</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">现金余额字段</td>
            <td><input name="money" type="text" id="money" value="<?=$elve_config['memberf']['money']?>" size="38"></td>
            <td>如需整合现金字段，请输入要整合的字段名.</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">会员注册中转页面</td>
            <td><input name="changeregisterurl" type="text" id="changeregisterurl" value="<?=$elve_config['member']['changeregisterurl']?>" size="38"></td>
            <td>如果是自定义注册页面需设置</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25"><font color="#FF0000">会员注册地址</font></td>
            <td> <input name="registerurl" type="text" id="registerurl" value="<?=$elve_config['member']['registerurl']?>" size="38"></td>
            <td>填写被整合程序的注册地址</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">会员登陆地址</td>
            <td><input name="loginurl" type="text" id="loginurl" value="<?=$elve_config['member']['loginurl']?>" size="38"></td>
            <td rowspan="2">通行证的选项，没有整合通行证请留空</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">会员退出地址</td>
            <td><input name="quiturl" type="text" id="quiturl" value="<?=$elve_config['member']['quiturl']?>" size="38"></td>
          </tr>
          <tr bgcolor="#FFFFFF" style='display:none'> 
            <td height="25">使用的数据编码</td>
            <td> <input type="radio" name="utfdata" value="0"<?=$elve_config['member']['utfdata']==0?' checked':''?>>
              正常数据 
              <input type="radio" name="utfdata" value="1"<?=$elve_config['member']['utfdata']==1?' checked':''?>>
              UTF8编码</td>
            <td>UTF8编码的数据需要设置</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">&nbsp;</td>
            <td colspan="2"> <input type="submit" name="Submit" value="提交"> <input type="reset" name="Submit2" value="重置"> 
            </td>
          </tr>
        </form>
      </table>
		<?
		}
		?>
        <br>
      
    </td>
  </tr>
  <tr>
    <td height=10 colspan="2" align=center bgcolor="F3F3F3"></td>
  </tr>
  <tr> 
    <td height=2 colspan="2" class=home_path style='padding-left:10px;'> </td>
  </tr>
  <tr>
    <td height=10 colspan="2" align=center></td>
  </tr>
  <tr> 
    <td height="24" colspan="2" align=center valign="bottom" style="line-height:150%"> 
      帝兴软件开发有限公司 版权所有<br>
      <font face="Arial, Helvetica, sans-serif">Copyright &copy; 2002 - 2013 <b><font color="#000000"><a href="http://www.Phome.net">PHome<font color="#FF6600">.Net</font></a></font></b></font><br> 
      <br> </td>
  </tr>
</table>

</body>
</html>