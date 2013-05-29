<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addprofile extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('profile', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'user_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'domain' => 
             array(
              'type' => 'string',
              'length' => 15,
             ),
             'nickname' => 
             array(
              'type' => 'string',
              'length' => 50,
             ),
             'birthday' => 
             array(
              'type' => 'date',
              'length' => 25,
             ),
             'sexe' => 
             array(
              'type' => 'char',
              'length' => 1,
             ),
             'mobile' => 
             array(
              'type' => 'string',
              'length' => 15,
             ),
             'home_place' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'family_place' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'branche_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'filiere_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'semestre' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'other_email' => 
             array(
              'type' => 'string',
              'length' => NULL,
             ),
             'photo' => 
             array(
              'type' => 'string',
              'length' => NULL,
             ),
             'weekmail' => 
             array(
              'type' => 'boolean',
              'length' => 25,
             ),
             'autorisation_photo' => 
             array(
              'type' => 'boolean',
              'length' => 25,
             ),
             'created_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             'updated_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('profile');
    }
}