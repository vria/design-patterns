<?php

namespace DesignPatterns\Structural\Adapter\Filesystem;

/**
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class FilesystemElement
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getBasename()
    {
        return basename($this->path);
    }

    /**
     * @return array
     */
    public function getSubElements()
    {
        if (!is_dir($this->path)) {
            return [];
        }

        $children = [];
        foreach (scandir($this->path) as $child) {
            if (!in_array($child, ['.', '..'])) {
                $children[] = $this->path.'/'.$child;
            }
        };

        return $children;
    }
}
