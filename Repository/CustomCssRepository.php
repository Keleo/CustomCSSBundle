<?php

/*
 * This file is part of the CustomCSSBundle.
 * All rights reserved by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Repository;

use App\Utils\FileHelper;
use KimaiPlugin\CustomCSSBundle\Entity\CustomCss;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class CustomCssRepository
{
    private $fileHelper;

    public function __construct(FileHelper $fileHelper)
    {
        $this->fileHelper = $fileHelper;
    }

    /**
     * @return array
     */
    public function getPredefinedStyles()
    {
        $rules = [];
        $searchDir = __DIR__ . '/../Resources/ruleset';

        $finder = new Finder();
        $finder->ignoreUnreadableDirs()->ignoreVCS(true)->files()->name('*.css')->in($searchDir)->depth('< 2');
        /* @var SplFileInfo $bundleDir */
        foreach ($finder as $file) {
            $name = str_replace('.css', '', $file->getFilename());
            $rules[$file->getRelativePath()][$name] = $file->getContents();
        }

        asort($rules);

        return $rules;
    }

    private function getStorageFilename(): string
    {
        // pre v2 the file was called custom-css-bundle.css - the name was
        // changed because the old rules will not work in v2
        return $this->fileHelper->getDataDirectory() . '/custom-css.css';
    }

    /**
     * @param CustomCss $entity
     * @return bool
     * @throws \Exception
     */
    public function saveCustomCss(CustomCss $entity)
    {
        $file = $this->getStorageFilename();

        if (file_exists($file) && !is_writable($file)) {
            throw new \Exception('CSS file is not writable: ' . $file);
        }

        if (false === file_put_contents($file, $entity->getCustomCss())) {
            throw new \Exception('Failed saving custom css rules to file: ' . $file);
        }

        return true;
    }

    /**
     * @return CustomCss
     */
    public function getCustomCss()
    {
        $file = $this->getStorageFilename();

        $entity = new CustomCss();

        if (file_exists($file) && is_readable($file)) {
            $entity->setCustomCss(file_get_contents($file));
        }

        return $entity;
    }
}
