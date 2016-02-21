# watermelon Framework

### 当前主要框架或语言的版本

1. Framework based on Laravel core:  5.1
2. thrift 0.9.3
3. php 7.0.3
4. nginx 1.8.1
5. redis 2.8.4

### 简介

1.提供Http Restful Api接口给 Android ,Ios, Web前端使用
2.实现[thrift][2] [rpc][3]接口,与 Python, Java, Node语言等通信

### 使用(建议本地测试 virtualbox + vagrant)

使用 virtualbox + vagrant 可以跳过1,2步骤

1. Nginx虚拟主机[配置文件][4]

2. php-fpm[配置文件][5]

3. make build

4. make test

5. api.cg0.me/ping

### 顺便一提
本框架只负责逻辑部分处理，数据库ORM部分用其它语言处理(我自己ORM主要用的是python)

[2]:https://thrift.apache.org/
[3]:https://en.wikipedia.org/wiki/Remote_procedure_call
[4]:https://github.com/hncg/conf/tree/master/nginx
[5]:https://github.com/hncg/conf/tree/master/php