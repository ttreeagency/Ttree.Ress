<?php
namespace Ttree\Ress\Mvc;

/*
 * This script belongs to the TYPO3 Flow package "Ttree.Ress".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the MIT licence.                                          *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 */
interface MobileAwareActionRequestInterface
{

    /**
     * @return boolean
     */
    public function isMobile();

    /**
     * @return boolean
     */
    public function isTablet();

}
