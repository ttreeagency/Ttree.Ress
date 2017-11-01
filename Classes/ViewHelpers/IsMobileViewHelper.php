<?php
namespace Ttree\Ress\ViewHelpers;

/*
 * This script belongs to the TYPO3 Flow package "Ttree.Ress".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the MIT licence.                                          *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Neos\FluidAdaptor\Core\ViewHelper\AbstractConditionViewHelper;
use Detection\MobileDetect;

class IsMobileViewHelper extends AbstractConditionViewHelper
{
    /**
     * @var MobileDetect
     */
    protected $mobileDetection = null;

    public function __construct()
    {
        parent::__construct();

        $this->mobileDetection = new MobileDetect();
    }

    public function render()
    {
        if ($this->mobileDetection->isMobile()) {
            return $this->renderThenChild();
        } else {
            return $this->renderElseChild();
        }
    }
}
