<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProfileNotLikes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                    'type' => 'INT',
                    'constraint' => 20,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ],

            'user_id' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
            ],

            'notlikes_id' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => false,
            ],
            
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',

        ]);

        $db = db_connect();

        $this->forge->addKey('id', true);
        $this->forge->createTable('profiles_notlikes');

        // $db->query("ALTER TABLE `user_info` ADD FOREIGN KEY ('user_id') REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION;");
        $db->query("ALTER TABLE `profiles_notlikes` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION; ");

    }

    public function down()
    {
        $this->forge->dropTable('profiles_notlikes');
    }
}
