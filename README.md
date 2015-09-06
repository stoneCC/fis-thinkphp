# fis3-thinkphp
===================
这是一个fis3在thinkphp默认的模板系统上的解决方案。

##让我们在最短的时间内让它跑起来
####1.安装node  +    fis3
####2.安装wamp或者xampp，或者其他的服务器软件
####3.配置一个网站，把网站根目录指到 xxxx/www.thinkphp.com
####4.用cmd，cd到 xxxx/www.thinkphp.com/F2E
####5.执行fis3 release -d xxxx/www.thinkphp.com//Application/Home/View
####6.在浏览器浏览你的网站吧

##解说
####F2E是我们的开发目录，包含了我们的页面及相关的模块，每一个模块都被放置在一个单独的文件夹中（包含html，js，css，images，etc)，这基本就是fis3的大体流程了。
####现在我们来说一说，我们是如何给thinkphp挂钩子，让它适应fis3的。
####1.首先，我们在www.thinkphp.com\Application\Fis 下放置了，fis的php资源管理类（在fis3自带的php解决方案中提供）：FISResource.class.php
####2.其次，我们\www.thinkphp.com\Application\TagLib下放置了 Fis.class.php （引用了FISResource.class.php），
####使得thinkphp的默认模板能够识别我们新增加的几个标签： 
<fis:widget name="widget/about/about.html"></fis:widget>  
<fis:style></fis:style>
<fis:script>  </fis:script>
<fis:framework></fis:framework>

####3.最后，我们\www.thinkphp.com\Application\Common\Conf\tags.php 中增加一个view_filter时的行为FisRenderBehavior (FisRenderBehavior.class.php文件中定义). 
####return array( 
####	 'view_filter'=>array('Fis\FisRenderBehavior'),           //解析fis css，js  输出位置  
####);
####我们用这个行为来实现最后js--hook  ，css--hook的输出。

####4.这个解决方案的核心就在于，我们让每一个组件都作为一个独立的模板被解析（支持递归引用）。模板与模板直接引用时，变量的传递方式 如下：
<fis:widget name="widget/home/home.html" tmplvar="$testVar" title="FIS3 纯php解决方案DEMO"></fis:widget> 
 其中$testVar 可以是php普通变量，或者php的多维数组。


