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

class PrintModel extends Base
{
    public function preparePrint($toFix)
    {
        $toFix = str_replace('```', '`', $toFix);
        $toFix = str_replace('~~~', '`', $toFix);
        if (file_exists('plugins/MarkdownPlus')) {
            $dom = new DOMDocument('1.0');

            // Loading HTML content in $dom
            @$dom->loadHTML($toFix);

            // Selecting all image i.e. img tag object
            $anchors = $dom -> getElementsByTagName('img');
            // Extracting attribute from each object
            foreach ($anchors as $element) {
                // Extracting value of src attribute of
                // the current image object
                $src = $element -> getAttribute('src');
                if (str_contains($src, 'FileViewerController')) {
                    $file_id = substr($src, strpos($src, 'file_id=')+8);
                    $file_id = intval($file_id);

                    $file = $this->taskFileModel->getById($file_id);
                    if (!is_null($file)) {
                        $file_data = base64_encode(file_get_contents(FILES_DIR.DIRECTORY_SEPARATOR.$file['path']));
                    }
                    if (!is_null($file)) {
                        $toFix = str_replace($src, 'data:image/png;base64,'.$file_data, $toFix);
                    }
                }

                // Extracting value of height attribute
                // of the current image object
                $height = $element -> getAttribute('height');

                // Extracting value of width attribute of
                // the current image object
                $width = $element -> getAttribute('width');
            }
        }
        return $toFix;
    }
}
