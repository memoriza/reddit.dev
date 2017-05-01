<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
	public function run()
	{
		$post = new Post();
		$post->title = 'First Post';
		$post->url = 'https://billy.com';
		$post->content = 'this is a unique amount of content';
		$post->created_by = User::all()->random()->id; 
		$post->save();

		$post1 = new Post();
		$post1->title = 'June';
		$post1->url = 'https://june.com';
		$post1->content = 'this is a unique amount of content';
		$post1->created_by = User::all()->random()->id;
		$post1->save();

		$post2 = new Post();
		$post2->title = 'Meow';
		$post2->url = 'https://meow.com';
		$post2->content = 'this is a unique amount of content';
		$post2->created_by = User::all()->random()->id;
		$post2->save();

		$post3 = new Post();
		$post3->title = 'Fart';
		$post3->url = 'https://fart.com';
		$post3->content = 'this is a unique amount of content';
		$post3->created_by = User::all()->random()->id;
		$post3->save();

		$post4 = new Post();
		$post4->title = 'Tree';
		$post4->url = 'https://tree.com';
		$post4->content = 'this is a unique amount of content';
		$post4->created_by = User::all()->random()->id;
		$post4->save();

		$post5 = new Post();
		$post5->title = 'Walrus';
		$post5->url = 'https://walrus.com';
		$post5->content = 'this is a unique amount of content';
		$post5->created_by = User::all()->random()->id;
		$post5->save();

		$post6 = new Post();
		$post6->title = 'Kyle';
		$post6->url = 'https://kyle.com';
		$post6->content = 'this is a unique amount of content';
		$post6->created_by = User::all()->random()->id;
		$post6->save();

		$post7 = new Post();
		$post7->title = 'Bob';
		$post7->url = 'https://bob.com';
		$post7->content = 'this is a unique amount of content';
		$post7->created_by = User::all()->random()->id;
		$post7->save();

		$post8 = new Post();
		$post8->title = 'Kaya';
		$post8->url = 'https://kaya.com';
		$post8->content = 'this is a unique amount of content';
		$post8->created_by = User::all()->random()->id;
		$post8->save();

		$post9 = new Post();
		$post9->title = 'Love';
		$post9->url = 'https://Love.com';
		$post9->content = 'this is a unique amount of content';
		$post9->created_by = User::all()->random()->id;
		$post9->save();

		$post10 = new Post();
		$post10->title = 'Alan Watts';
		$post10->url = 'https://alan.com';
		$post10->content = 'this is a unique amount of content';
		$post10->created_by = User::all()->random()->id;
		$post10->save();
	}
}