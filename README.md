# 此分支简要说明

基于 devMan-branch-noip-QRcode-install 分支制作，添加对 docker 的支持。

# 使用方法

1. 启动 docker：

在项目根目录执行

```
$ docker-compose up
```

2. 初始化数据库：

打开 <http://127.0.0.1/install> ，输入如下参数：

```
数据库地址：mysql
数据库名称：devmanagesys
数据库用户名：root
数据库密码：root
```

最后点击【安装】按钮

不用担心数据库直接使用 root 密码会有风险，这个数据库没有对外暴露端口，外部无法访问。而且数据库仅为这个网站服务，里面也没啥敏感信息吧。。。

3. 正常使用。若需要退出， `Ctrl+C` 即可。

# 相关配置

mysql 的配置放在根目录下的 `mysql.env` 中。可配置的环境变量请参考：<https://hub.docker.com/_/mysql/>

php 的配置放在了 `docker/php.ini` 中。修改后需要重启 docker 容器方可生效。

网站使用的就是当前目录的代码，并没有打包到 docker 镜像中。因此需要调整网站配置直接参照 <https://github.com/liyuanhong/CIApplication> 进行配置即可。配置修改后不用重启 docker 容器，立即生效。

查看 php 当前配置：打开 <http://127.0.0.1/php_info> 即可。