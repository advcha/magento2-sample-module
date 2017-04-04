<?php
namespace Advcha\HelloWorld\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Display extends Template {
    public function __construct(Context $context) {
        parent::__construct($context);
    }
    
    public function sayHello(){
        return __('Hello World, Advcha!');
    }
}
