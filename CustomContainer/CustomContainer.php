<?php

namespace CustomContainer;

class Container extends \PhpOffice\PhpWord\Element\Section
{
    public function __construct($section)
    {
        parent::__construct($section->getSectionId());
        $this->elements = $section->getElements();
    }
}