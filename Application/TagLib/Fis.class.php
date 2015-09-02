<?php
namespace TagLib;

use Think\Template\TagLib;
use Think\Think;
use FISResource;

class Fis extends TagLib {
    private function _instance() {
        $strResourceApiPath = APP_PATH.'Fis/FISResource.class.php';

        if(!class_exists('FISResource', false))
        {
            require_once($strResourceApiPath);
            $tmpdir = FISResource::$config['template_dir'];
            $filePath = $this->tpl->parseThinkVar("Think.TEMPLATE");

            $id = str_replace($tmpdir,'',$filePath);
            $id = str_replace('\'','',$id);
            FISResource::load($id);
        }

    }
	protected $tags = array(
            'style'=>array('attr' => ''),
            'script'=>array('attr' => ''),
            'framework'=>array('attr' => 'name', 'close' => 1),
            'import'=>array('attr' => 'name', 'close' => 1),
            'placeholder'=>array('attr' => 'name', 'close' => 1),
            'widget'=>array('attr' => 'name', 'close' => 1),
	);




    public function _style ($tag,$content){
        $this->_instance();
//        FISResource::addStylePool($content);

        $style = $content;
        $reg = "/(<style(?:\s+[\s\S]*?[\"'\s\w\/]>|\s*>))([\s\S]*?)(?=<\/style>|$)/i";
        if(preg_match($reg,$style,$matches)){
            FISResource::addStylePool($matches[2]);
        }else{
            FISResource::addStylePool($style);
        }
    }
    public function _script ($tag,$content){
        $this->_instance();
        //$id = $tag['name'];
     //   FISResource::addScriptPool($content);

        $script = $content;
        $reg = "/(<script(?:\s+[\s\S]*?[\"'\s\w\/]>|\s*>))([\s\S]*?)(?=<\/script>|$)/i";
        if(preg_match($reg,$script,$matches)){
            FISResource::addScriptPool($matches[2]);
        }else{
            FISResource::addScriptPool($script);
        }
    }

    /**
     * 设置前端加载器
     * @param [type] $id [description]
     */
    public function _framework ($tag){
        $this->_instance();
        $id = $tag['name'];
        FISResource::setFramework(FISResource::getUri($id));
    }

    /**
     * 加载某个资源及其依赖
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    function _import($tag) {
        $this->_instance();
        $id = $tag['name'];
        FISResource::load($id);
    }

    /**
     * 添加标记位
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    function _placeholder($tag) {
        $this->_instance();
        $type = $tag['name'];
        return FISResource::placeholder($type);
    }

    /**
     * 加载组件
     * @param  [type] $id   [description]
     * @param  array  $args [description]
     * @return [type]       [description]
     */
    function _widget($tag, $args = array()) {
        $this->_instance();
        $id = $tag['name'];
        $uri = FISResource::getUri($id);
        if (is_file($uri)) {
            FISResource::load($id);
        }

        /**收集模板变量**/
        $tVar = array();
        foreach($tag as $k=>$v)
        {
            if($k == "name")
            {

                continue;
            }
            $v = preg_replace('/^\$/','',$v);
            if( isset ( $this->tpl->tVar[ $v] ))
            {
                $tVar[$k] = $this->tpl->tVar[$v];
            }else{
                $tVar[$k] = $v;
            }
        }
        //new 一个新模板
        $mTpl =   new \Think\Template();
        //输出到缓冲
        ob_start();
        $filePath = FISResource::$config['template_dir'] . $id;
        $mTpl->fetch($filePath,$tVar ,$prefix='');
        //获取并清理缓冲
        $content =  ob_get_clean();

        return $content;
    }

}