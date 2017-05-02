<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder 
{
	public function run()
	{
		$user = new User();
		$user->name = 'Billy';
		$user->email = 'billy@email.com';
		$user->password = 'password';
		$user->save();

		$user1 = new User();
		$user1->name = 'June';
		$user1->email = 'june@email.com';
		$user1->password = 'password';
		$user1->save();

		$user2 = new User();
		$user2->name = 'Meow';
		$user2->email = 'meow@email.com';
		$user2->password = 'password';
		$user2->save();

		$user3 = new User();
		$user3->name = 'Fart';
		$user3->email = 'fart@email.com';
		$user3->password = 'password';
		$user3->save();

		$user4 = new User();
		$user4->name = 'Tree';
		$user4->email = 'tree@email.com';
		$user4->password = 'password';
		$user4->save();

		$user5 = new User();
		$user5->name = 'Walrus';
		$user5->email = 'walrus@email.com';
		$user5->password = 'password';
		$user5->save();

		$user6 = new User();
		$user6->name = 'Kyle';
		$user6->email = 'kyle@email.com';
		$user6->password = 'password';
		$user6->save();

		$user7 = new User();
		$user7->name = 'Bob';
		$user7->email = 'bob@email.com';
		$user7->password = 'password';
		$user7->save();

		$user8 = new User();
		$user8->name = 'Kaya';
		$user8->email = 'kaya@email.com';
		$user8->password = 'password';
		$user8->save();

		$user9 = new User();
		$user9->name = 'Love';
		$user9->email = 'Love@email.com';
		$user9->password = 'password';
		$user9->save();

		$user10 = new User();
		$user10->name = 'Alan Watts';
		$user10->email = 'alan@email.com';
		$user10->password = 'password';
		$user10->save();
	}
}