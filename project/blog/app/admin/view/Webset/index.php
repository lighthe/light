<extend file="resource/view/master">
    <block name="content">
        <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
            <li>
                <a href=""><i class="fa fa-cogs"></i>
                    站点配置管理</a>
            </li>

        </ol>
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="">站点配置</a></li>
        </ul>
        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="80">编号</th>
                            <th>配置名称</th>
                            <th>配置值</th>
                            <th>配置描述</th>
                        </tr>
                        </thead>
                        <tbody>
                        <foreach from="$data" key="$k" value="$v">
                            <tr>
                                <td>{{$v['wid']}}</td>
                                <td>{{$v['name']}}</td>
                                <td>
                                    <input type="text" name="value[{{$v['wid']}}]" value="{{$v['value']}}">
                                </td>
                                <td>{{$v['title']}}</td>
                            </tr>
                        </foreach>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="submit" class="btn btn-success">
        </form>
        <div class="pagination pagination-sm pull-right">
        </div>
    </block>