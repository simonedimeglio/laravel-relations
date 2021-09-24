<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Author;
use App\Tag;
use Faker\Generator as Faker;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tagsList = [
            'NEWS',
            'REVIEW',
            'HOW-TO',
            'SPORT',
            'TECH - GEEK',
            'ART - CULTURE',
            'MUSIC - CINEMA',
            'SCIENCE',
            'VARIOUS'
        ];

        $listOftagsID = [];

        foreach($tagsList as $tag) {
            $tagObj = new Tag();
            $tagObj->tag_name = $tag;
            $tagObj->save();
            $listOftagsID[] = $tagObj->id;
        }
        

        $listOfAuthorID = [];

        for ($i = 0; $i < 10; $i++) {
            $authorObject = new Author();
            $authorObject->name = $faker->name();
            $authorObject->email = $faker->email();

            $authorObject->save();
            $listOfAuthorID[] = $authorObject->id;
        }

        for ($i = 0; $i < 10; $i++) {

            $articleObject = new Article();
            $articleObject->title = $faker->sentence(2);
            $articleObject->img = $faker->imageUrl(640, 480, 'User', true); 
            $articleObject->paragraph = $faker->paragraph(3);
            $articleObject->date= $faker->date('Y_m_d');

            $randCategoryKey = array_rand($listOfAuthorID, 1);
            $authorID = $listOfAuthorID[$randCategoryKey];
            $articleObject->author_id = $authorID;

            $articleObject->save();
        }
    }
}
