<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2018/12/14
 * Time: 14:45
 */

namespace frontend\components\forms;

use frontend\components\tools\markdown\EditorMarkdown;
use yii\bootstrap\ActiveField as YiiActiveField;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class ActiveField extends YiiActiveField
{

    /**
     * {@inheritdoc}
     */
    public function radioList($items, $options = [])
    {
        if ( isset($options['itemOptions']) ) {
            if ( !isset($options['itemOptions']['class']) ) {
                $options['itemOptions']['class'] = 'flat';
            }
        } else {
            $options['itemOptions'] = [ 'class' => 'flat' ];
        }
        return parent::radioList($items, $options);
    }


    /**
     * {@inheritdoc}
     */
    public function checkboxList($items, $options = [])
    {
        if ( isset($options['itemOptions']) ) {
            if ( !isset($options['itemOptions']['class']) ) {
                $options['itemOptions']['class'] = 'flat';
            }
        } else {
            $options['itemOptions'] = [ 'class' => 'flat' ];
        }
        return parent::checkboxList($items, $options);
    }


    /**
     * Renders a drop-down list.
     */
    public function dropDownList2($items, $options = [])
    {
        $default = [
            'class' => 'select2_multiple form-control',
            'multiple' => "multiple",
        ];
        $options = array_merge( $default, $options);
        return parent::dropDownList($items, $options);
    }

    public function timeInput($options=[])
    {
        $default = [
            'class' => 'layer-datetime form-control',
            'data-type' => 'datetime', //'data-range' => 'false',
        ];
        $options = array_merge($default, $options);
        return parent::textInput($options);
    }

    /**
     * 同checkbox
     */
    public function switchCheckbox($options = [], $enclosedByLabel = true)
    {
        //$this->inlineCheckboxListTemplate = "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";

        // 每个field独立， 可以在方法中单独指定此类的所有属性选项
        // 每次调用field会实例化此类一次
        $this->wrapperOptions = [
            'class' => 'col-md-6 col-sm-6 col-xs-12 js-switch-yii-container'
        ];

        $options = array_merge([
            'class' => 'form-control js-switch',
        ], $options);

        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
            $this->addErrorClassIfNeeded($options);
        }

        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = Html::activeCheckbox($this->model, $this->attribute, $options);

        return $this;
    }


    public function tagsInput($options=[])
    {
        $default = [
            'class' => 'tags tags_input form-control',
        ];
        $options = array_merge($default, $options);
        return parent::textInput($options);
    }

    public function dropzone($options=[])
    {
        //$this->containerId = 'containerId';
        $mockFiles = Html::getAttributeValue($this->model,$this->attribute);
        if ( !is_array($mockFiles) || empty($mockFiles) ) {
            $mockFiles = [];
        }
        $this->wrapperOptions = [
            'class' => 'col-md-8 col-sm-8 col-xs-12'
        ];
        $options = array_merge([
            // 图片回显
            'mockFiles' => $mockFiles,
            //开启拖拽排序
            'sortable'=>true,
            'clientOptions' => [
                'url'=> \yii\helpers\Url::toRoute('dropzone/upload'),
                //'maxFilesize' => 6,
                'maxFiles' => 6,
                'autoProcessQueue'=>true,
                'dictCancelUpload'=>'取消上传',
                'dictRemoveFile'=>'删除文件',
                'addRemoveLinks'=>true,
            ],
            'clientEvents'=>[
                'queuecomplete'=>'function(file){
                    var _this = this
                    '.'_this'.'.on("removedfile",function(file){
                            $.ajax({
                                type: "POST",
                                url: "'.\yii\helpers\Url::toRoute(['dropzone/remove']).'",
                                data: {
                                    url: file.previewElement.getElementsByTagName("input")[0].value
                                },
                                dataType: "json",
                                success: function(response){
                                    if(response.status === "success"){
                                        '.'_this'.'.options.maxFiles++;
                                    }
                                }
                            });
                        }
                    );
                }',
            ]
        ], $options);
        return $this->widget('twitf\dropzone\DropZone', $options);
    }


    public function imageInput($options=[])
    {
        $this->template = "{label}\n{beginWrapper}\n{preview}\n{input}\n{error}\n{endWrapper}\n{hint}";
        $url = Html::getAttributeValue($this->model,$this->attribute);
        $this->parts['{preview}'] = '<div class="picture-preview" style="background-image:url('.$url.')"></div>';

        $options = array_merge([
                'class' => 'picture-preview-input',
                'accept' => 'image/*',
            ],$options);
        return parent::fileInput($options);
    }

    public function fileInput($options = [])
    {
        $url = Html::getAttributeValue($this->model,$this->attribute);
        $this->template = "{label}\n{beginWrapper}\n{preview}\n{input}\n{error}\n{endWrapper}\n{hint}";
        if ( !empty($url) ) {
            $file = substr($url,strrpos($url,'/')+1);
            $this->parts['{preview}'] = '<p class="h5">当前文件: <a href="'.$url.'" target="_blank" class="text-success">'.$file.'</a></p>';
        } else {
            $this->parts['{preview}'] = '';
        }
        return parent::fileInput($options);
    }

    public function markdown()
    {
        $this->template = "{label}\n<br><br>\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
        $this->wrapperOptions = [
            'class' => 'col-md-12 col-sm-12 col-xs-12'
        ];
        $this->labelOptions = [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
        ];
        $value = Html::getAttributeValue($this->model,$this->attribute);
        return $this->widget(EditorMarkdown::className());
    }

    public function ueditor($options = [])
    {
        $this->template = "{label}\n<br><br>\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
        $this->wrapperOptions = [
            'class' => 'col-md-12 col-sm-12 col-xs-12'
        ];
        $this->labelOptions = [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12',
        ];
        $options = [
            'clientOptions' => [
                'serverUrl' => Url::toRoute('dropzone/ueditorUpload'),
            ],
        ];
        return $this->widget('kucha\ueditor\UEditor',$options);
    }


}