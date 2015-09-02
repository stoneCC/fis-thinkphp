
//模块化方案，本项目选中CommonJS方案(同样支持异步加载哈)
fis.hook('module', {
  mode: 'commonJs'
});

fis.match('**.{css,js,png,gif,jpg,swf}', {
    useHash: false, // md5 都关掉
    release: '../../../Public/$0',
    url:'$0',
    domain: '/public'
});

fis.match('/widget/**.{css,js,png,gif,jpg,swf}', {
    isMod:true,
    useHash: false, // md5 都关掉
    release: '../../../Public/$0',
    url:'$0',
    domain: '/public'
});






//页面和widget模板
fis.match("/**.html",{
    isMod : true,
    isHtmlLike : true,
    url: '$&', //此处注意，php加载的时候已带tpl目录，所以路径得修正
    release: '/$&'
})

//文档就不发布了
fis.match("/doc/**",{
  release : false
});

//package就不发布了
fis.match("/package.json",{
    release : false
});

//README.md就不发布了
fis.match("/*.md",{
    release : false
});

//开启组件同名依赖
fis.match('*.{html,js,php}', {
  useSameNameRequire: true
});

