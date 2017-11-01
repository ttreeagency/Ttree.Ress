<?php
namespace Ttree\Ress\Aspect;

/*
 * This script belongs to the TYPO3 Flow package "Ttree.Ress".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the MIT licence.                                          *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Detection\MobileDetect;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Aop\JoinPointInterface;

/**
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @Flow\Scope("singleton")
 * @Flow\Introduce("class(Neos\Flow\Mvc\ActionRequest)", interfaceName="Ttree\Ress\Mvc\MobileAwareActionRequestInterface")
 * @Flow\Aspect
 */
class ActionRequestAspect
{
    /**
     * @var MobileDetect
     */
    protected $mobileDetection = null;

    public function initializeMobileDetection()
    {
        $this->mobileDetection = new MobileDetect();
    }

    /**
     * @Flow\Around("method(Neos\Flow\Mvc\ActionRequest->isMobile())")
     * @param JoinPointInterface $joinPoint
     * @return boolean
     */
    public function isMobile(JoinPointInterface $joinPoint)
    {
        if ($this->mobileDetection === null) {
            $this->initializeMobileDetection();
        }

        return $this->mobileDetection->isMobile();
    }

    /**
     * @Flow\Around("method(Neos\Flow\Mvc\ActionRequest->isTablet())")
     * @param JoinPointInterface $joinPoint
     * @return boolean
     */
    public function isTablet(JoinPointInterface $joinPoint)
    {
        if ($this->mobileDetection === null) {
            $this->initializeMobileDetection();
        }

        return $this->mobileDetection->isTablet();
    }
}
