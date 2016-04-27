<?php

class ShowUsersTest extends TestCase
{
    use FunctionalHelper;

    /** @test */
	public function list_all_users_who_are_registered()
    {
        $this->haveAnAccount(['username' => 'Foo'])
        	 ->haveAnAccount(['username' => 'Bar'])
        	 ->visit('/users')
             ->see('Foo')
             ->see('Bar');
    }
}
