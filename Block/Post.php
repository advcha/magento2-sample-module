<?php
namespace Advcha\HelloWorld\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Advcha\HelloWorld\Model\PostFactory;

class Post extends Template
{
    protected $_postFactory;
    public function _construct(Context $context, PostFactory $postFactory){
        $this->_postFactory = $postFactory;
        parent::_construct($context);
    }

    public function _prepareLayout()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        foreach($collection as $item){
                var_dump($item->getData());
        }
        exit;
    }
}