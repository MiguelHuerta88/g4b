<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert out genres
         DB::table('genre')->insert(
         	[
         		[
	         		'name' => 'Hip Hop',
	         		'created_at' => Carbon::now(),
	         		'updated_at' => Carbon::now()
	        	 ],
	        	 [
	        	 	'name' => 'Reggae',
	        	 	'created_at' => Carbon::now(),
	         		'updated_at' => Carbon::now()
	        	 ],
	        	 [
	        	 	'name' => 'Rock',
	        	 	'created_at' => Carbon::now(),
	         		'updated_at' => Carbon::now()
	        	 ],
	        	 [
	        	 	'name' => 'House',
	        	 	'created_at' => Carbon::now(),
	         		'updated_at' => Carbon::now()
	        	 ],
	        	 [
	        	 	'name' => 'EDM',
	        	 	'created_at' => Carbon::now(),
	         		'updated_at' => Carbon::now()
	        	 ],
	        	 [
	        	 	'name' => 'Regional Mexicana',
	        	 	'created_at' => Carbon::now(),
	         		'updated_at' => Carbon::now()
	        	 ],
	        	 [
	        	 	'name' => 'Other',
	        	 	'created_at' => Carbon::now(),
	         		'updated_at' => Carbon::now()
	        	 ]
    		]	
     	);
    }
}
