# IP地址字符串和整形数字相互转换

> 文中提到的IP地址指的是ipv4地址

对于需要索引和查询的字段而言，整形字段比字符串字段效率会高很多，所以在保存IP地址时，可以将IP地址先转换成整形，再保存进数据表中。

```php
<?php

	/**
	 * 将IP地址字符串(127.0.0.1)转换成bigint类型的IP数字
	 * @param String $ip 
	 * @return Double
	 */
	function convertIpToLong($ip=''){
		return sprintf("%u",ip2long($ip));
	}

	/**
	 * 将bigint类型的IP数字转换成IP地址字符串(127.0.0.1)
	 * 如果已经是IP字符串地址，直接返回
	 * @param Double $ip 
	 * @return String
	 */
	function convertIpToString($ip = 0){
		// 判断是否IP字符串地址 直接返回
		if(filter_var($ip, FILTER_VALIDATE_IP)){
			return filter_var($ip, FILTER_VALIDATE_IP);
		}
		return long2ip((float)$ip);
	}
```

使用范例：

```php
<?php
	$ip_long = convertIpToLong('127.0.0.1');
	$ip_str = convertIpToString($ip_long);
```



### ThinkPHP

在ThinkPHP 3.2.3中，有专门的函数用于获取客户端IP地址：`get_client_ip`，在使用时，向该方法传递第一个参数为1即可返回一个IP地址数字

```php
<?php
	$clientIp = get_client_ip(1);
```

