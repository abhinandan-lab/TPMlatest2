<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartnerPreference extends Migration
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
            ],

            'age' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],

            'height' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            
            'language' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
            ],
            
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
            ],

            
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
            ],

            
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
            ],

            'baptized' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',

        ]);

        $db = db_connect();

        $this->forge->addKey('id', true);
        $this->forge->createTable('partner_preference');

        // $db->query("ALTER TABLE `user_info` ADD FOREIGN KEY ('user_id') REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION;");
        $db->query("ALTER TABLE `partner_preference` ADD FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION; ");

    }

    public function down()
    {
        $this->forge->dropTable('partner_preference');
    }
}
