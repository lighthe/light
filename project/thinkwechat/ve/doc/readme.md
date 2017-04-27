#数据表

####管理员
```
id          编号
username    用户名
password    密码
token       密钥
```

####标签
标签是用于对视频进行分类使用的
```
id          编号
tag_name    标签名称
tag_desc    标签描述
```

####课程
```
id      编号
title   课程标题
pic     封面图片
tag_id  标签编号
```

####视频
```
id      编号
path    视频地址
```