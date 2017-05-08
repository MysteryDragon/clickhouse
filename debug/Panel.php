<?php
/**
 * @copyright Copyright (c) 2017 Dmitry Bashkarev
 * @license https://github.com/bashkarev/clickhouse/blob/master/LICENSE
 * @link https://github.com/bashkarev/clickhouse#readme
 */

namespace bashkarev\clickhouse\debug;

use yii\debug\panels\DbPanel;
use yii\log\Logger;

/**
 * @author Dmitry Bashkarev <dmitry@bashkarev.com>
 */
class Panel extends DbPanel
{

    /**
     * @inheritdoc
     */
    public $db = 'clickhouse';

    public $logo = '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="30" viewBox="0 0 9 8" style="position: absolute;bottom: 4px;"><path fill="red" d="M0,7 h1 v1 h-1 z"></path><path fill="#fc0" d="M0,0 h1 v7 h-1 z"></path><path fill="#fc0" d="M2,0 h1 v8 h-1 z"></path><path fill="#fc0" d="M4,0 h1 v8 h-1 z"></path><path fill="#fc0" d="M6,0 h1 v8 h-1 z"></path><path fill="#fc0" d="M8,3.25 h1 v1.5 h-1 z"></path></svg><i style="display: inline-block;width: 35px"></i>';

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'ClickHouse';
    }

    /**
     * @inheritdoc
     */
    public function getSummaryName()
    {
        return $this->logo;
    }

    /**
     * @inheritdoc
     */
    protected function hasExplain()
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getProfileLogs()
    {
        $target = $this->module->logTarget;
        return $target->filterMessages($target->messages, Logger::LEVEL_PROFILE, ['bashkarev\clickhouse\Command::*']);
    }

}