<extend file='../master'/>
<block name="content">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#">课程列表</a></li>
        <li><a href="{{u('post')}}">添加课程</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">

                <thead>
                <tr>
                    <th>课程名称</th>
                    <th width="110">操作</th>
                </tr>
                </thead>
                <tbody>
                <foreach from="$data" value="$d">
                    <tr>
                        <td>
                            {{$d['title']}}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{u('post',['id'=>$d['id']])}}" class="btn btn-default btn-sm">编辑</a>
                                <a href="" class="btn btn-default btn-sm">删除</a>
                            </div>
                        </td>
                    </tr>
                </foreach>
                </tbody>
            </table>
        </div>
    </div>
</block>