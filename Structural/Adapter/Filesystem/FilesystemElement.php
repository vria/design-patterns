<?php

namespace DesignPatterns\Structural\Adapter\Filesystem;

/**
 * Represents either a folder or a file in a filesystem.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class FilesystemElement
{
    /**
     * Absolute path.
     *
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
     * Get the basename of current element: /var/www/{basename.ext}.
     *
     * @return string
     */
    public function getBasename()
    {
        return basename($this->path);
    }

    /**
     * Get all children of this element.
     * Always returns empty array if this element is a file.
     *
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
