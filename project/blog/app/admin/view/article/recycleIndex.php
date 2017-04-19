<extend file="resource/view/master"/>
<block name="content" >
    <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
        <li>
            <a href=""><i class="fa fa-cogs"></i>
                文章管理</a>
        </li>
        <li class="active">
            <a href="">文章添加</a>
        </li>
    </ol>
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#tab1">回收站</a></li>
<!--        <li><a href="{{u('store')}}">文章添加</a></li>-->
    </ul>
    <form action="" method="post">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="80">编号</th>
                        <th>文章名称</th>
                        <th>所属分类</th>
                        <th>添加时间</th>
                        <th width="200">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <foreach from="$data['data']" key="$k" value="$v">
                        <tr>
                            <td>{{$v['aid']}}</td>
                            <td>{{$v['title']}}</td>
                            <td>{{$v['cname']}}</td>
                            <td>{{date('y/m/d',$v['sendtime'])}}</td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{u('OutToRecycle',[aid=>$v['aid']])}}">恢复</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;" onclick="del({{$v['aid']}})" >彻底删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </foreach>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <div class="pagination pagination-sm pull-right">
{{$data['page']}}
    </div>
</block>
<script>
    function del(aid) {
        util.confirm('确定删除吗?',function(){
            location.href = "{{u('del')}}" + '&aid='+aid;
        })
    }
</script>
