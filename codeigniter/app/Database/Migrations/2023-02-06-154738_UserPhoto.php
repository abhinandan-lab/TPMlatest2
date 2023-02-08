<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPhoto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                    'type' => 'INT',
                    'constraint' => 20,
                    'auto_increment' => TRUE
            ],

            'img_name' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],

            
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],

            
        ]);

        $db = db_connect();

        $this->forge->addKey('id', true);
        $this->forge->createTable('user_photo');

        // $db->query("ALTER TABLE `user_photo` ADD FOREIGN KEY ('user_id') REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION");
        $db->query("ALTER TABLE `user_photo` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION; ");
         
    }

    public function down()
    {
        $this->forge->dropTable('user_photo');
    }
}
