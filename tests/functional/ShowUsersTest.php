<?php

class ShowUsersTest extends TestCase
{
    use FunctionalHelper;

	public function testListAllRegistredUsers()
    {
        $this->haveAnAccount(['username' => 'Foo'])
        	 ->haveAnAccount(['username' => 'Bar'])
        	 ->visit('/users')
             ->see('Foo')
             ->see('Bar');
    }
}
