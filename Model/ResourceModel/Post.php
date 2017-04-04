<?php
namespace Advcha\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractDb {
    /**
        * Date model
        * 
        * @var \Magento\Framework\Stdlib\DateTime\DateTime
        */
    protected $_date;

    /**
        * constructor
        * 
        * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
        * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
        */
    protected function __construct(DateTime $date, Context $context) {
        $this->_date = $date;
        parent::__construct($context);
    }
    /**
        * Initialize resource model
        *
        * @return void
        */
    public function _construct(){
        $this->_init('advcha_helloworld_post', 'post_id');
    }
    /**
        * Retrieves Post Name from DB by passed id.
        *
        * @param string $id
        * @return string|bool
        */
    public function getPostNameById($id){
        $adapter = $this->getConnection();
        $select = $adapter->select()
                ->from($this->getMainTable(), 'name')
                ->where('post_id = :post_id');
        $binds = ['post_id' => (int)$id];
        return $adapter->fetchOne($select, $binds);
    }
    /**
        * before save callback
        *
        * @param \Magento\Framework\Model\AbstractModel|\Mageplaza\HelloWorld\Model\Post $object
        * @return $this
        */
    protected function _beforeSave(AbstractModel $object) {
        $object->setUpdateAt($this->_date->date());
        if($object->isObjectNew()){
            $object->setCreatedAt($this->_date->date());
        }
        return parent::_beforeSave($object);
    }
}
