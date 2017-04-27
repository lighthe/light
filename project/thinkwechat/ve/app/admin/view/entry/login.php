<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <include file="resource/view/common"/>
</head>
<body>
<form action="" method="post" class="form-horizontal" onsubmit="post(event)">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">会员登录</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">帐号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">登录</button>
        </div>
    </div>
</form>
</body>
</html>
<script>
    function post(event) {
        event.preventDefault();
        require(['util'], function (util) {
            util.submit({
                successUrl: '{{u("entry/index")}}',
            });
        });
    }
</script>
















