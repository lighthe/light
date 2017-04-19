<template>
  <div>
    <!--底部固定导航-->
    <ul id="bottom">
      <li class="cur">
        <a href="index.html">
          <i class="iconfont icon-shouyeshouye"></i>
          <span>首页</span>
        </a>
      </li>
      <li>
      //这里有一个路由
        <router-link to="/page">
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
  name: 'navigate',
}
</script>