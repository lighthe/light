<extend file='../master'/>
<block name="content">
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="{{u('lists')}}">标签列表</a></li>
        <li class="active"><a href="{{u('post')}}">添加标签</a></li>
    </ul>

    <form action="" method="post" id="form" class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">基本信息</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" required="required"
                               value="{{$model['title']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">缩略图</label>
                    <div class="col-sm-10">
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
                    <label class="col-sm-2 control-label">标签</label>
                    <div class="col-sm-10">
                        <foreach from="$tags" value="$t">
                            <label>
                                <input type="checkbox" name="tid[]" value="{{$t['id']}}"> {{$t['title']}}
                            </label>
                        </foreach>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">视频列表</h3>
            </div>
            <div class="panel-body">
                <div class="well" v-for="(v,k) in videos">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" v-model="v.title">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="button" @click="remove(k)">删除</button>
                          </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">地址</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="v.path">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-info btn-block" @click="add">添加视频</button>
            </div>
        </div>

        <textarea name="videos" hidden="hidden">@{{videos}}</textarea>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary">保存数据</button>
            </div>
        </div>
    </form>
</block>
<script>
    require(['vue'], function (Vue) {
        new Vue({
            el: '#form',
            data: {
                videos: [

                ]
            },
            methods:{
                add:function(){
                    this.videos.push({title:'',path:''})
                },
                remove:function(k){
                    //这里是splice被重做过
                    this.videos.splice(k,1);
                }
            }
        })
    })

    //保存表单
    function post(event) {

        event.preventDefault();
        require(['util'], function (util) {
            util.submit({
                'successUrl': '{{u("lists")}}'
            })
        })
    }
</script>

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