<?php

namespace Kanboard\Plugin\Task2pdf\Model;

use Kanboard\Core\Base;
use Kanboard\Model\TaskFileModel;
use Kanboard\Core\ObjectStorage\ObjectStorageException;
use DOMDocument;


/**
 * @plugin Task2pdf
 *
 * @package Model
 * @author  creecros
 */
 
class PrintModel extends Base {
    

/*
public function codeblockFix($toFix)
    {
        $toFix = str_replace('```', '`', $toFix);
        $toFix = str_replace('~~~', '`', $toFix);
        $a = substr($toFix, strpos($toFix, '<img src=')+9);
        $a = substr($a, 0, strpos($a, ' class="enlargable" />'));
        $b = substr($toFix, strpos($toFix, 'file_id=')+8);
        $b = substr($b, 0, strpos($b, '" class="enlargable" />'));
        $b = intval($b);
        $file = $this->taskFileModel->getById($b);
        //if (str_contains($a, 'FileViewerController')) {
            if(!is_null($file)) $file_data = base64_encode(file_get_contents(FILES_DIR.DIRECTORY_SEPARATOR.$file['path']));
            if(!is_null($file)) $toFix = str_replace($a, 'data:image/png;base64,'.$file_data, $toFix);
            $toFix = str_replace('==', '', $toFix);
            $toFix = str_replace(' class="enlargable" />', ' style="width:150;height:auto" />', $toFix);
        //}
        return $toFix;
    }
 */
 
public function codeblockFix($toFix)
    {
        error_log($toFix,0);
        $dom = new DOMDocument('1.0');
      
        // Loading HTML content in $dom
        @$dom->loadHTML($toFix);
          
        // Selecting all image i.e. img tag object
        $anchors = $dom -> getElementsByTagName('img');
        if (!is_null($anchors)) error_log('iwas null',0);
        // Extracting attribute from each object
    foreach ($anchors as $element) {
          error_log('im in for each',0);
        // Extracting value of src attribute of
        // the current image object
        $src = $element -> getAttribute('src');
        error_log($src,0);
        if (str_contains($src, 'FileViewerController')) {  
            $file_id = substr($src, strpos($src, 'file_id=')+8);
            //$file_id = substr($file_id, 0, strpos($file_id, -1)); 
            $file_id = intval($file_id);
            error_log($file_id,0);
            
            $file = $this->taskFileModel->getById($file_id);
            if(!is_null($file)) $file_data = base64_encode(file_get_contents(FILES_DIR.DIRECTORY_SEPARATOR.$file['path']));
            if(!is_null($file)) $toFix = str_replace($src, 'data:image/png;base64,'.$file_data, $toFix);
        }
        
        // Extracting value of height attribute
        // of the current image object
        $height = $element -> getAttribute('height');
          
        // Extracting value of width attribute of
        // the current image object
        $width = $element -> getAttribute('width');
          
        
    }
    return $toFix;

    }
}

