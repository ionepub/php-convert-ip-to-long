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

?>