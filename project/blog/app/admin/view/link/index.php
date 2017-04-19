<extend file="resource/view/master">
    <block name="content">
        <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
            <li>
                <a href=""><i class="fa fa-cogs"></i>
                    友链管理</a>
            </li>
            <li class="active">
                <a href="">友链展示</a>
            </li>
        </ol>
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="">友链管理</a></li>
            <li><a href="{{u('store')}}">添加友链</a></li>
        </ul>
        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="80">编号</th>
                            <th>链接名称</th>
                            <th width="200">操作</th>
                        </tr>
                        </thead>
                        <foreach from='$data' key='$k' value='$v'>
                        <tbody>
                        <tr>
                            <td>{{$v['lid']}}</td>
                            <td>{{$v['lname']}}</td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{u('edit',['lid'=>$v['lid']])}}">编辑</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;" onclick="del({{$v['lid']}})">删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        </foreach>
                    </table>
                </div>
            </div>
        </form>
        <div class="pagination pagination-sm pull-right">
        </div>
    </block>

    <script>
        function del(lid) {
            util.confirm('确定删除吗?',function(){
                location.href = "{{u('del')}}" + '&lid='+lid;
            })
        }
    </script>