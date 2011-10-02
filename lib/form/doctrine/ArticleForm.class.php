<?php

/**
 * Article form.
 *
 * @package    simde
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm
{
  public function configure()
  {
    unset(
      $this['created_at'],$this['updated_at']
    );
    
    $this->widgetSchema['text'] =  new sfWidgetFormTextareaTinyMCE(
      array(
        'width'=>550,
        'height'=>350,
        'config'=>'theme_advanced_disable: "anchor,image,cleanup,help"',
        'theme'   =>  sfConfig::get('app_tinymce_theme','advanced'),
      ),
      array(
        'class'   =>  'tiny_mce'
      )
    );
    $js_path = '/js/tiny_mce/tiny_mce.js';
    sfContext::getInstance()->getResponse()->addJavascript($js_path);

  }
}