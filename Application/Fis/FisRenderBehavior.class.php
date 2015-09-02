<?php
namespace Fis;

use FISResource;
/**
 * 系统行为扩展：静态缓存写入
 */
class FisRenderBehavior {

    // 行为扩展的执行入口必须是run
    public function run(&$content){
        if(!class_exists('FISResource', false))
            return;
        $content = FISResource::renderResponse($content);
    }
}