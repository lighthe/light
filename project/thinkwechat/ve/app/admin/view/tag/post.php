<extend file='../master'/>
<block name="content">
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="{{u('lists')}}">标签列表</a></li>
        <li class="active"><a href="{{u('post')}}">添加标签</a></li>
    </ul>

    <form action="" method="post" class="form-horizontal" onsubmit="post(event)">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" required="required" value="{{$model['title']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">描述</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">
                            {{$model['description']}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn btn-primary">保存数据</button>
                    </div>
                </div>


            </div>

        </div>
    </form>

</block>

<script>
    function post(event){
        event.preventDefault();
        require(['util'],function(util){
            util.submit({
                'successUrl':'{{u("lists")}}'
            })
        })
    }
</script>