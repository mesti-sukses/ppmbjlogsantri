<?php 
	/**
	* 
	*/
	class Migration_User_admin extends CI_Migration
	{
		
		public function up(){
			$this->dbforge->add_field(array(
				'id' => array(
					'type' => 'INT',
					'constraint' => 11,
					'auto_increment' => TRUE
					),
				'name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'
					),
				'username' => array(
					'type' => 'VARCHAR',
					'constraint' => '100'
					),
				'password' => array(
					'type' => 'VARCHAR',
					'constraint' => '128'
					)
				));

			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('user_admin');
		}

		public function down(){
			$this->dbforge->drop_table('user_admin');
		}
	}
?>