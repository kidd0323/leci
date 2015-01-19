package com.alipay.util;
/**
 * 名称：支付验证类
 * 功能：负责验证相关信息，返回支付宝ATN返回结果
 * 接口名称：标准实物双接口
 * 版本：2.0
 * 日期：2008-12-25
 * 作者：支付宝公司销售部技术支持团队
 * 联系：0571-26888888
 * 版权：支付宝公司
 * */
import java.net.*;
import java.io.*;


public class CheckURL {
	   /**
     * 对字符串进行MD5加密
	 * @param myUrl 
     *
     * @param url
     *
     * @return 获取url内容
     */
  public static String check(String urlvalue ) {
	 
	 
	  String inputLine="";
	  
		try{
				URL url = new URL(urlvalue);
				
				HttpURLConnection urlConnection  = (HttpURLConnection)url.openConnection();
				
				BufferedReader in  = new BufferedReader(
			            new InputStreamReader(
			            		urlConnection.getInputStream()));
			
				inputLine = in.readLine().toString();
			}catch(Exception e){
				e.printStackTrace();
			}
			//System.out.println(inputLine);  系统打印出抓取得验证结果
			
	    return inputLine;
  }


  }