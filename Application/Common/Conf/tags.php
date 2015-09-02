<?php
/**
 * Created by PhpStorm.
 * User: changchuan
 * Date: 2015/8/28
 * Time: 15:21
 */
return array(


/**
    'view_begin'=>array('Common\Behavior\Fis_view_begin_Behavior'),                     //视图输出开始标签位
    'view_parse'=>array('Common\Behavior\Fis_view_parse_Behavior'),                     //视图解析标签位
    'template_filter'=>array('Common\Behavior\Fis_template_filter_Behavior'),           //模板内容解析标签位
    'view_filter'=>array('Common\Behavior\Fis_view_filter_Behavior'),                   //视图输出过滤标签位
    'view_end'=>array('Common\Behavior\Fis_view_end_Behavior'),                         //视图输出结束标签位
 **/

    'view_filter'=>array('Fis\FisRenderBehavior'),           //解析fis css，js  输出位置

);