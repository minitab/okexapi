## 系统安装

目录

- 环境要求
- 安装
- 站点配置及说明

### 环境要求

- PHP >= 7.2 
- PHP cURL 扩展
- PHP OpenSSL 扩展
- Mysql >= 5.7
- Apache 或 Nginx
- Composer (用于管理第三方扩展包)

### 安装

> 如果你是群里下载的安装包，可直接第五步开始

1、克隆

```
git clone git@github.com:minitab/okexapi.git
```

2、进入目录

```
cd okexapi
```

3、安装依赖

```
composer install 
```

4、配置apikey

```
找到 common/config/params-local.php 并配置相应的信息
```

### 站点配置

> 注意：Nginx/IIS 先要设置好伪静态，Apache 默认已配置

站点指向目录为当前项目的web下 

例如: 

```
/path/to/okexapi/web/
```

访问说明

应用 | Url
---|---
Api | 当前域名/api
