����ʹ��˵��
1  indexҳ���Ǵ���֧��url,ʹ��ItemUrl����ƴ��һ��url��
   indexҳ��Ĳ����Ѿ��Ǳ�Ҫ���������Բ����޸ġ���������΢������
   ���Լ���վ�����Ӧ�ı�������ֵ����Ӧ�������漴�ɣ����磺
   String out_trade_no		= date.getOrderNum();	
   ����ͻ������ţ�ȡ��ϵͳʱ�䣬����UtilDate���е�getOrderNum()������Ϊ�����ţ����ⲿ�����ţ�������������Լ��Ķ���
   
   
2  alipay_notify.jspΪ��֧��������֪ͨ����
   ���Զ�Ӧ��notify_url����������á��������ݽ�����ͨ����������������ݽ�����������post��Ϣ���첽���ش���ҳ�棬
   ��Ҫ�ͻ��������첽���ش���ҳ�洦����ص����ݴ���Ȼ��ÿһ��������Ҫ���ظ�֧����success�����ܰ���������HTML�ű����ԣ���������ҳ����ת������
   ������ش����������OK����ô����������ֵ�������Ϊ֧��������24Сʱ֮�ڷ�6~10�ν�������Ϣ���ظ����ͻ���վ��ֱ��֧��������success��
   
3  alipay_return.jspΪ��֧��������֪ͨ����
   ֧����ͨ��get��ʽ��ת�������ַ�����Ҵ��в��������ҳ�档��һ�ֿ��ӻ��ķ��أ�ieҳ����ת֪ͨ��ֻҪ֧���ɹ���
   �ͻ���ȡ��Ϣ�ܵ���Ҳ�����Ӱ�졣������֧����ɺ�ͻ���������Ӧ�Ƚ�����
   �������ʾ֧������ʾ�ġ���ʱ����֧���ɹ���ʱ�ر�ҳ�棬��ô�ͻ���վ�ǻ�ȡ������Ϣ��������߳�Ϊ�� ��������
   ����������ش�����һ���Ե�ȡ����֧���ɹ���ŵ�ȡͬ�����ش���

4  ����첽��ͬ������д��־�Ķ������뵽src�µ�com.alipay.util����ߵ�SignatureHelper_return��ͬ������SignatureHelper  ���첽����sign�������и�д��־�Ķ�����
  
5  �ڽӿ������ǲ�û�н���ҵ��ջ���Ϣ����д�룬�����������Ҫ���뽫����Ϣ���룺
        /*�ջ�����Ϣ*/
	String receive_name = "֧����";  //�ջ�������
	String receive_address = "�Ϻ��г���������·1027���׷�㳡29¥";  //�ջ��˵�ַ
	String receive_zip = "200050";  //�ջ����ʱ�
	String receive_phone = "057188156688";  //�ջ��˵绰
	String receive_mobile = "";  //�ջ����ֻ�
   ͬ����Ҫ�޸�src��com.alipay.util�е�Payment.java�ࡣ

6 java����Ҫע��������������⣬һ��Ҫ������ȥ����filter,
  ע�⣺һ��Ҫ��web.xml�����ù�������ÿ����Ŀ�ж�������������������������ֱ�Ӵ�
webcontent�ļ����£�web-inf�ļ����µ�web.xml�ļ���
  ���Բο��������£�
   http://blog.csdn.net/lixinye0123/archive/2006/03/26/639402.aspx
  ���磺
  <filter>
		<filter-name>Set Character Encoding</filter-name>
		<filter-class>filters.SetCharacterEncodingFilter</filter-class>
		<init-param>
			<param-name>encoding</param-name>
			<param-value>GBK</param-value>
		</init-param>
	</filter>
	<filter-mapping>
		<filter-name>Set Character Encoding</filter-name>
		<url-pattern>/*</url-pattern>
	</filter-mapping>