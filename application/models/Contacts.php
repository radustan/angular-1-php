<?php

class Contacts extends MY_Model
{
    protected $tableName = 'messages';

    public function getAllArray()
    {
        return array(
            array(
                'name' => 'radu',
                'email' => 'radu.stan@ggg.com',
                'message' => 'hello'
            )
        );
    }

    public function save(array $data)
    {
        return 'success';
    }
}

