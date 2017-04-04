<?php
namespace Advcha\HelloWorld\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Advcha\HelloWorld\Model\Api\Data\PostInterface;

class Post extends AbstractModel implements IdentityInterface,PostInterface {
    const CACHE_TAG = 'advcha_helloworld_post';

    protected $_cacheTag = 'advcha_helloworld_post';

    protected $_eventPrefix = 'advcha_helloworld_post';
    
    protected function __construct() {
        $this->_init('Advcha\HelloWorld\Model\ResourceModel\Post');
    }

    public function getIdentities(){
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    
    public function getDefaultValues(){
        $values = [];
        
        return $values;
    }
}
