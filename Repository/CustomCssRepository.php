<?php

/*
 * This file is part of the Kimai CustomCSSBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KimaiPlugin\CustomCSSBundle\Repository;

use KimaiPlugin\CustomCSSBundle\Entity\CustomCss;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class CustomCssRepository
{
    /**
     * @var string
     */
    protected $cssFile;
    /**
     * @var string
     */
    protected $ruleSetDir;

    /**
     * @param string $pluginDirectory
     */
    public function __construct(string $pluginDirectory, string $dataDirectory)
    {
        $this->ruleSetDir = $pluginDirectory . '/CustomCSSBundle/Resources/ruleset';
        $this->cssFile = $dataDirectory . '/custom-css-bundle.css';
    }

    /**
     * @return array
     */
    public function getPredefinedStyles()
    {
        $rules = [];

        $finder = new Finder();
        $finder->ignoreUnreadableDirs()->ignoreVCS(true)->files()->name('*.css')->in($this->ruleSetDir)->depth('< 2');
        /** @var SplFileInfo $bundleDir */
        foreach ($finder as $file) {
            $name = str_replace('.css', '', $file->getFilename());
            $rules[$file->getRelativePath()][$name] = $file->getContents();
        }

        asort($rules);

        return $rules;
    }

    /**
     * @param CustomCss $entity
     * @return bool
     * @throws \Exception
     */
    public function saveCustomCss(CustomCss $entity)
    {
        if (file_exists($this->cssFile) && !is_writable($this->cssFile)) {
            throw new \Exception('CSS file is not writable: ' . $this->cssFile);
        }

        if (false === file_put_contents($this->cssFile, $entity->getCustomCss())) {
            throw new \Exception('Failed saving custom css rules to file: ' . $this->cssFile);
        }

        return true;
    }

    /**
     * @return CustomCss
     */
    public function getCustomCss()
    {
        $entity = new CustomCss();

        if (file_exists($this->cssFile) && is_readable($this->cssFile)) {
            $entity->setCustomCss(file_get_contents($this->cssFile));
        }

        return $entity;
    }
}
