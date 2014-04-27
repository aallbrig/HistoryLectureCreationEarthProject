<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('lessons')->delete();
        DB::table('hotspots')->delete();
        $faker = Faker\Factory::create();
 				
				for ($i = 0; $i<10; $i++)
				{
				  $user = User::create(array('email' => $faker->email
				    												,'username'=>$faker->userName
				    												,'password'=>Hash::make('testpass')));
				  // echo("\nuser id: $user->id email: $user->email");
				  for ($j=0; $j < 10; $j++) { 
				  	$lesson = Lesson::create(array('title' => $faker->name
				  																,'description'=>$faker->text
				  																,'user_id'=>$user->id));
				  	// echo("\nlesson id: $lesson->id user_id: $user->id");
				  	for ($k=0; $k < 10; $k++) { 
				  		$hotspot = Hotspot::create(array('title'=> $faker->name
				  																		,'description'=>$faker->text
				  																		,'longitude'=>$faker->randomNumber(-180,180)
				  																		,'latitude'=>$faker->randomNumber(-90,90)
				  																		,'lesson_id'=> $lesson->id));
				  		echo("\nhotspot id: $hotspot->id lesson_id: $lesson->id");
				  	}

				  }
				  
				}
				echo("\nComplete");
    }

}