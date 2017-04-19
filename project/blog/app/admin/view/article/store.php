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
        <li><a href="{{u('index')}}">文章管理</a></li>
        <li class="active"><a href="">文章添加</a></li>
    </ul>
    <form class="form-horizontal" id="form" onsubmit="return store(this)" action="" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">文章管理</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="title"  class="form-control" placeholder="文章标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章作者</label>
                    <div class="col-sm-9">
                        <input type="text" name="author"  class="form-control" placeholder="文章作者">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">所属分类</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single form-control" name="category_cid">
                            <option value="0">请选择分类</option>
                            <foreach from="$cateData" key="$k" value="$v">
                                <option value="{{$v['cid']}}">{{$v['_cname']}}</option>
                            </foreach>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">标签</label>
                    <div class="col-sm-9">
                        <foreach from="$tagData" key="$k" value="$v">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="tag[]" value="{{$v['tid']}}"> {{$v['tname']}}
                            </label>
                        </foreach>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">缩略图</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" class="form-control" name="thumb" readonly="" value="">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="resource/images/nopic.jpg" class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章摘要</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="digest"  class="form-control" placeholder="文章摘要"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">关键字</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="keywords"  class="form-control" placeholder="文章摘要"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章描述</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="des"  class="form-control" placeholder="文章摘要"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">文章内容</label>
                    <div class="col-sm-9">
                        <textarea name="content" id="container" style="height:300px;width:100%;"></textarea>
                        <script>
                            util.ueditor('container', {hash:2,data:'hd'}, function (editor) {
                                //这是回调函数 editor是百度编辑器实例
                            });
                        </script>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary" type="submit">确定</button>
    </form>


</block>

<script>
    //上传图片
    function upImage(obj) {
        require(['util'], function (util) {
            options = {
                multiple: false,//是否允许多图上传
                //data是向后台服务器提交的POST数据
                data:{name:'后盾人',year:2099},
            };
            util.image(function (images) {          //上传成功的图片，数组类型 
                $("[name='thumb']").val(images[0]);
                $(".img-thumbnail").attr('src', images[0]);
            }, options)
        });
    }

    //移除图片
    function removeImg(obj) {
        $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
        $(obj).parent().prev().find('input').val('');
    }
</script>
<script>
    function store(obj)
    {
        //序列化获取表单数据
        var data=$(obj).serialize();

        $.post("{{u('store')}}",data,function(res){
            //res:{valid:1,message:'响应信息'}
            if(res.valid){
                //成功
                //提示框在hdjs手册中搜索消息框
                util.message(res.message,"{{u('index')}}",'success');
            }else{
                //失败
                util.message(res.message,"back",'error');
            }
        },'json')
        //组织表单提交
        return false;
    }
</script>

