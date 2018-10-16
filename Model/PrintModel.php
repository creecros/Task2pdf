<?php

namespace Kanboard\Plugin\Task2pdf\Model;

use Kanboard\Core\Base;

/**
 * @plugin Task2pdf
 *
 * @package Model
 * @author  creecros
 */
 
class PrintModel extends Base {

public function codeblockFix($toFix)
    {
        $toFix = str_replace('```', '`', $toFix);
        $toFix = str_replace('~~~', '`', $toFix);
        return $toFix;
    }
    
}
