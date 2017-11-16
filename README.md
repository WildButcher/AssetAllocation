使用yii框架开发的生成资产配置建议书小程序
主要业务：
1、主次表查询挑选、插入。
2、富文本编辑器集成。
3、通过html2pdf文件生成并下载。
4、权限限制，前后台分离。

第一次使用yii开发项目感觉功能还是很强大，自己觉得不好用是在于还不熟悉。
代码机（gii）能够节约大量重复操作，表格和数据组建很方便。
数据库的查询和数据组感觉不是很灵活，这个可能是自己不熟悉导致。
原来用ThinkPHP开发，很灵活可控性强，上收很快。
权限这块yii比thinkphp好很多，有自带RBAC。thinkphp需要自己搞。
系统日志这次还没有考虑，想的话yii应该很方便。

version
目前还不能算beta版本，还有用户部分需要完善，虽然主体功能已经实现，但还有细节需求要深挖。

遇到的问题并解决：
1、rules规则里写的password当做了数据库字段，必须要保存的。但是实际表里没有这个字段
解决办法:
一 是去掉跟password有关的规则。二 就是在save的时候把属性设置为false。即$user->save(false)

2、HTML2PDF。采用的tcpdf库类。其中tcpdf的中文支持解决办法采用Droid Sans Fallback字体。将解压后的3个文件：droidsansfallback.php、droidsansfallback.z以及droidsansfallback.ctg.z放到 TCPDF\fonts 下面即可。
然后配置tcpdf：
中文的解决方法为：tcpdf\config\tcpdf_config.php
define ('PDF_FONT_NAME_MAIN', 'helvetica');
改为： define ('PDF_FONT_NAME_MAIN', 'stsongstdlight');
define ('PDF_FONT_NAME_DATA', 'helvetica');
改为： define ('PDF_FONT_NAME_DATA', 'stsongstdlight');
注意：将数据交给TCPDF类处理时，一定要UTF8编码，否则也会出现乱码的情况发生的。

3、富文本编辑器用的百度的ueditor简单快捷。redactor这些网上介绍的很模糊不好搞，UE简单。