<?php

/**
 * Class Audio.
 */
class Audio
{
    /**
     * Get audio files from folder.
     *
     * @param string $dir
     * @return array
     */
    public static function getFiles($dir = 'audio') {
        $audioFiles = [];

        $files = scandir($dir);

        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $audioFiles[] = str_replace('.mp3', '', $file);
        }

        return $audioFiles;
    }
}
