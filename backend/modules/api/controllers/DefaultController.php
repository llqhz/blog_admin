<?php

namespace backend\modules\api\controllers;

use backend\controllers\base\Base;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Base
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return 'success';
    }
}
