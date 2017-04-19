<template>
    <div>
        <!--底部固定导航-->
        <ul id="bottom">
            <li class="cur">
                <router-link to="/">

                    <i class="iconfont icon-shouyeshouye"></i>
                    <span>首页</span>
                </router-link>
            </li>
            <li>
                <router-link to="/Page">
                    <i class="iconfont icon-icon02"></i>
                    <span>视频</span>
                </router-link>

            </li>
        </ul>
        <!--底部固定导航结束-->
    </div>
</template>

<script>
    export default {
        name: 'Navigate',
        data () {
            return {
            }
        }

    }
</script>

