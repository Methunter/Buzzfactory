<?php 
/** 	3 Файла:					
 * 
 * 	Link: http://www.cyberforum.ru/php-beginners/thread822235.html
 *		hosts:	{
 *			...
 *			#localhost name resolution is handled within DNS 
 *			#itself.
 *				127.0.0.1       localhost
 *				127.0.0.2       edsr.localhost
 *			#	127.0.0.3       sym_first.localhost
 *			#	127.0.0.4       admin_ka.localhost
 *			...
 *		}
 *		httpd-vhosts.conf:{
 *			NameVirtualHost *:80
 *			<VirtualHost *:80>
 *			    ServerAdmin adshme@yandex.ru
 *				DocumentRoot "/Users/m32sa/Sites/cms"
 *			    ServerName localhost
 *			    ServerAlias localhost
 *				
 *			    ErrorLog "logs/localhost.log"
 *			    CustomLog "logs/localhost.log" common
 *			</VirtualHost>
 *
 *			<VirtualHost *:80>
 *			    ServerAdmin m32sa@me.com
 *				DocumentRoot "/Users/m32sa/Sites/cms/{{companyName}}"
 *				ServerName {{cpmpanyName}}.localhost
 *			    ServerAlias {{cpmpanyName}}.localhost
 *				
 *			    ErrorLog "logs/localhost.log"
 *			    CustomLog "logs/localhost.log" common
 *			</VirtualHost>
 *		}
 *		httpd.conf:{
 *			....
 *			# Virtual hosts
 *			Include conf/extra/httpd-vhosts.conf
 *			.....
 *		} */
/** 	Virtual User Hosts:			
 * 	Link: 
 * 	http://httpd.apache.org/docs/2.0/rewrite/rewrite_guide.html#uservhosts
 * 	Description:
 * 		Assume that you want to provide www.username.host.domain.com for the 
 * 		homepage of username via just DNS A records to the same machine
 * 		and without any virtualhosts on this machine.
 * 	Solution:
 * 		For HTTP/1.0 requests there is no solution, but for HTTP/1.1 requests
 * 		which contain a Host: HTTP header we can use the following ruleset
 * 		to rewrite http://www.username.host.com/anypath internally to
 * 		/home/username/anypath:
 *
 * 			RewriteEngine on
 * 			RewriteCond   %{HTTP_HOST}                 ^www\.[^.]+\.host\.com$
 * 			RewriteRule   ^(.+)                        %{HTTP_HOST}$1          [C]
 * 			RewriteRule   ^www\.([^.]+)\.host\.com(.*) /home/$1$2
 **********************************************************************************
 * 	Оригинально! Вот кому-то пригодится может. Только уже без АП#2.
 * 		Создаем .htaccess следующего содержания:
 * 		PHP:
 * 		RewriteEngine On
 * 		RewriteCond %{HTTP_HOST} !^$
 * 		RewriteCond %{HTTP_HOST} !^(www\.)?host\.com$ [NC]
 * 		RewriteCond %{HTTP_HOST}---%{REQUEST_URI} ^([^\.]+)\.host\.com---/([^/]+)? [NC]
 * 		RewriteCond %1---%2 !^(.*)---\1$ [NC]
 * 		RewriteCond %{DOCUMENT_ROOT}/%1/ -d
 * 		RewriteRule ^(.*)?$ %1/$1 [QSA,PT]
 * 		Теперь любая папка например http://host.com/test/ 
 * 	будет доступна по адресу http://test.host.com/
 *
 * 	Вот ещо один вариант. На тот случай если вы хотите что бы все 
 * 	поддомены лежали в папке например subdomain.
 * 		PHP:
 * 		RewriteEngine on
 * 		RewriteBase /
 * 		RewriteCond %{HTTP_HOST} !^www\.host\.com$
 * 		RewriteCond %{HTTP_HOST} (www\.)?(.*)\.host\.com$
 * 		RewriteCond %{REQUEST_URI} !subdomain/
 * 		RewriteRule ^(.*)$ subdomain/%2/$1
 * 			
 * 			PS: Оба варианты проверены лично мной и работают на 100%.
 *
 *
 */
/** 	Вариант чрез ISPManager:	
 * 		Может быть на сервере Buzzfactory он стоит.
 *  	Link: http://httpd.apache.org/docs/2.0/rewrite/rewrite_guide.html#uservhosts
 */
	 
	 
	function subdisp($domain, $sub, $login, $pass){

		$domain_name = (!empty($sub)? $sub.".": "").$domain;

		$request="https://".$domain."/manager/ispmgr?authinfo=".$login.":".$pass."&out=text&func=wwwdomain.edit&sok=yes&domain=".$domain_name."&alias=www.".$domain_name."&docroot=www/".$domain_name."&owner=".$domain_name."&ip=&admin=webmaster@".$domain."&charset=utf-8&index=index.php&php=&autosubdomain=asdnone";

		$ch = curl_init (); // инициализация
		curl_setopt ($ch , CURLOPT_URL , $request); // адрес страницы для скачивания
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);   //TIMEOUT
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  //Переходим по редиректам
		curl_setopt ($ch , CURLOPT_RETURNTRANSFER , 1 ); // нам нужно вывести загруженную страницу в переменную
		$result = curl_exec($ch); // скачиваем страницу
		curl_close($ch); // закрываем соединение

		$result = strtolower(trim($result));
		return $result == 'ok';
   }
	if(subdisp('maindomain.com', 'subdomain', 'login', 'pass')){
		echo 'Поддомен успешно создан';
	}
	else{
		echo 'Произошла ошибка';
	}
/** 	Сделать направление для доменов в зоне DNS.
 * 			Вообщем нужно что бы были открыты любые под домены.
 * 			Что-то вроде Алиасов, только немного удобнее.
 * 			
 * 			Нужно изменить запись CNAME на (*.mysite.ru. CNAME @)
 * 			И тогда все поддомены которые прописаны в Apache 
 * 			и закреплены за директориями, ими и будут. 
 * 			А все остальные будут направляться на главный домен, т.е. mysite.ru.
 * 			
 * 			Тем самым можно просто ловить имя хоста, которое
 * 			будут разным в зависимости от домена
 * 			(mysite.ru, user1.mysite.ru, user2.mysite.ru) 
 * 			и доставать из него имя юзера, и от этого уже 
 * 			грузить контент.
 *  
 */








?>