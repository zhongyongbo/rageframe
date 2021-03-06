<?php

use yii\db\Migration;

class m180104_024350_wechat_fans_tag_map extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%wechat_fans_tag_map}}', [
            'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT',
            'fan_id' => 'int(11) unsigned NOT NULL COMMENT \'粉丝id\'',
            'tag_id' => 'tinyint(3) unsigned NOT NULL DEFAULT \'0\' COMMENT \'标签id\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='微信_粉丝标签关联表'");
        
        /* 索引设置 */
        $this->createIndex('mapping','{{%wechat_fans_tag_map}}','fan_id, tag_id',1);
        $this->createIndex('fanid_index','{{%wechat_fans_tag_map}}','fan_id',0);
        $this->createIndex('tagid_index','{{%wechat_fans_tag_map}}','tag_id',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%wechat_fans_tag_map}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

