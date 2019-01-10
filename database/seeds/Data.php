<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class Data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $num = 1;
        $faker = Faker::create();
        foreach (range(1,5) as $index) {

            DB::table('users')->insert([
                'name' => $faker->name,
                'last_name' => $faker->lastname,
                'eap' => $faker->jobTitle,
                'my_tag' => $faker->jobTitle,
                'alias' => $faker->firstName,
                'code' => $faker->numberBetween($min = 10000000, $max = 99999999),
                'email' => 'demo'.$num.'@gmail.com',
                'phone' => $faker->numberBetween($min = 100000000, $max = 999999999),
                'password' => bcrypt('demo123'),
            ]);
            $num++;
        }

        $num = 1;
        foreach (range(1,5) as $index) {

            DB::table('orgnzs')->insert([
                'name' => $faker->name,
                'last_name' => $faker->lastname,
                'desc' => $faker->text($maxNbChars = 100),
                'alias' => $faker->firstName,
                'email' => 'demo'.$num.'@gmail.com',
                'dir' => $faker->address,
                'phone' => $faker->numberBetween($min = 100000000, $max = 999999999),
                'password' => bcrypt('demo123'),
            ]);
            $num++;
        }

        foreach (range(1,30) as $index) {

            DB::table('events')->insert([
                'orgnz_id' => $faker->numberBetween($min = 1, $max = 5),
                'title' => $faker->catchPhrase,
                'description' => $faker->text($maxNbChars = 200),
                'site' => $faker->address,
                'tag' => $faker->randomElement($array = array ('Matematica','Ingles','Tecnologia')).','.$faker->randomElement($array = array ('Literatura','Aleman','Programacion')),
                'group' => $faker->randomElement($array = array ('grupo 1','grupo 2','grupo 3','')),
                'closed' => $faker->randomElement($array = array (0,1)),
                'speaker' => $faker->name.', '.$faker->name('male').', '.$faker->name('female') ,
                'init_date' => $faker->dateTimeBetween($startDate = '-7 days', $endDate = 'now')->format('Y-m-d H:i:s'),
                'end_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 days')->format('Y-m-d H:i:s'),
            ]);
        }

        foreach (range(1,30) as $index) {

            DB::table('events')->insert([
                'orgnz_id' => $faker->numberBetween($min = 1, $max = 5),
                'title' => $faker->catchPhrase,
                'description' => $faker->text($maxNbChars = 200),
                'site' => $faker->address,
                'tag' => $faker->randomElement($array = array ('Matematica','Ingles','Tecnologia')).','.$faker->randomElement($array = array ('Literatura','Aleman','Programacion')),
                'group' => $faker->randomElement($array = array ('grupo 1','grupo 2','grupo 3','')),
                'closed' => $faker->randomElement($array = array (0,1)),
                'speaker' => $faker->name.', '.$faker->name('male').', '.$faker->name('female') ,
                'init_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 days')->format('Y-m-d H:i:s'),
                'end_date' => $faker->dateTimeBetween($startDate = '+7 days', $endDate = '+9 days')->format('Y-m-d H:i:s'),
            ]);
        }

        $num = 1;
        foreach (range(1,70) as $index) {

            DB::table('event_user')->insert([
                'event_id' => $faker->numberBetween($min = 1, $max = 60),
                'user_id' => $faker->numberBetween($min = 1, $max = 5),
                'interest' => $faker->randomElement($array = array ('interesa','asistire','removido')),
                'attended' => $faker->randomElement(array(0,1)),
                'payment' => $faker->randomElement(array(0,1)),
                'certificate_available' => $faker->randomElement(array(0,1)),
                'certificate_delivered' => $faker->randomElement(array(0,1)),
            ]);
            $num++;
        }
    }
}
