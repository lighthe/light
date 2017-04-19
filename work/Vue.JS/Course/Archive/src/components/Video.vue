<template>
  <div>
    <!--视频-->
    <video src="images/big_buck_bunny.mp4" controls="controls" poster="images/510.jpg"></video>
    <!--视频结束-->

    <h1>10 导航条样式的设置</h1>

    <ul id="list">
      <li><a href="">07 w3c规范 创建网页的方法</a></li>
      <li class="cur"><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">07 w3c规范 创建网页的方法</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">07 w3c规范 创建网页的方法</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">07 w3c规范 创建网页的方法</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">07 w3c规范 创建网页的方法</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
      <li><a href="">07 w3c规范 创建网页的方法</a></li>
      <li><a href="">08 a标签 img标签详解</a></li>
      <li><a href="">09 代码注释</a></li>
    </ul>
    <!--返回按钮-->
    <router-link to="/" class="iconfont back">&#xe612;</router-link>
  </div>
</template>
<script>
  require('@/assets/css/page.css')
export default {
  name: 'video',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>