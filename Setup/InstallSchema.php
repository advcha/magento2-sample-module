<?php
namespace Advcha\HelloWorld\Setup;

use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\DB\Ddl\Table;
use \Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    /**
        * install tables
        *
        * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
        * @param \Magento\Framework\Setup\ModuleContextInterface $context
        * @return void
        * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
        */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('advcha_helloworld_post')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('advcha_helloworld_post')
            )
            ->addColumn(
                'post_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary'  => true,
                    'unsigned' => true,
                ],
                'Post ID'
            )
            ->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                ['nullable => false'],
                'Post Name'
            )
            ->addColumn(
                'url_key',
                Table::TYPE_TEXT,
                255,
                [],
                'Post URL Key'
            )
            ->addColumn(
                'post_content',
                Table::TYPE_TEXT,
                '64k',
                [],
                'Post Post Content'
            )
            ->addColumn(
                'tags',
                Table::TYPE_TEXT,
                255,
                [],
                'Post Tags'
            )
            ->addColumn(
                'status',
                Table::TYPE_INTEGER,
                1,
                [],
                'Post Status'
            )
            ->addColumn(
                'featured_image',
                Table::TYPE_TEXT,
                255,
                [],
                'Post Featured Image'
            )
            ->addColumn(
                'sample_country_selection',
                Table::TYPE_TEXT,
                3,
                [],
                'Post Sample Country Selection'
            )
            ->addColumn(
                'sample_upload_file',
                Table::TYPE_TEXT,
                255,
                [],
                'Post Sample File'
            )
            ->addColumn(
                'sample_multiselect',
                Table::TYPE_TEXT,
                '64k',
                [],
                'Post Sample Multiselect'
            )
            ->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                [],
                'Post Created At'
            )
            ->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                [],
                'Post Updated At'
            )
            ->setComment('Post Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('advcha_helloworld_post'),
                $setup->getIdxName(
                    $installer->getTable('advcha_helloworld_post'),
                    ['name','url_key','post_content','tags','featured_image','sample_upload_file'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name','url_key','post_content','tags','featured_image','sample_upload_file'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}
