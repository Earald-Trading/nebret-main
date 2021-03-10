<?php

namespace Database\Factories;

use App\Models\HouseType;
use App\Models\ListingType;
use App\Models\State;
use App\Models\User;
use App\Models\Upload;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class UploadFactory extends Factory
{
    /**
     * Have we downloaded the files
     *
     * @var bool
     */
    protected static $download_run = false;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Upload::class;

    /**
     * Download the images for the uploads
     *
     * @return void
     */
    protected function download()
    {
        if (static::$download_run) {
            return;
        }

        $download_dir = sys_get_temp_dir() . "/public";

        if (! File::exists($download_dir)) {
            File::makeDirectory($download_dir);
        }
        $urls = [
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Cover_001.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Cover_002.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Interior_001.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Interior_002.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Interior_003.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Interior_004.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Interior_005.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Interior_006.jpg',
            'https://noahrealestateplc.com/images/projects_gallery/16/Noah_Centrum_-_Interior_007.jpg',
        ];

        $i = 0;
        foreach ($urls as $url) {
            $filename = "{$download_dir}/{$i}.jpg";
            if (File::exists($filename)) {
                continue;
            }

            $response = Http::get($url);
            File::put($filename, $response->body());
            ++$i;
        }

        static::$download_run = true;
        return $download_dir;
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        $this->faker->addProvider(new \Faker\Provider\Youtube($this->faker));
        $download_dir = $this->download();
        return $this->afterMaking(function (Upload $upload) {
            $upload->user_id = User::inRandomOrder()->first()->id;
            $upload->admin_id = User::where('role', 'agent')->inRandomOrder()->first()->id;
            $upload->house_type = HouseType::inRandomOrder()->first()->type;
            $upload->listing_type = ListingType::inRandomOrder()->first()->type;
            $upload->subcity = State::inRandomOrder()->first()->state;
            $upload->images = hash(
                'sha256',
                "{$upload['logline']} {$upload['latitude']} {$upload['longtiude']} {$upload['houseno']}"
            );

        })->afterCreating(function (Upload $upload) use($download_dir) {
            File::copyDirectory($download_dir, storage_path("app/{$upload->images}"));
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'youtube_id' => basename($this->faker->youtubeEmbedUri),
            'description' => $this->faker->paragraphs(2, true),
            'description_am' => $this->faker->paragraphs(2, true),
            'comparative_analysis' => $this->faker->paragraphs(3, true),
            'comparative_analysis_am' => $this->faker->paragraphs(3, true),
            'beds' => random_int(1, 10),
            'baths' => random_Int(1, 8),
            'footprint' => $this->faker->randomNumber(3, false),
            'lot' => $this->faker->randomNumber(4,false),
            'year' => $this->faker->year,
            'price' => $this->faker->randomNumber(5, false) * 100,
            'latitude' => $this->faker->latitude(8.84297, 9.08783),
            'longitude' => $this->faker->longitude(38.65345, 38.90751),
            'wereda' => $this->faker->randomNumber(2, false),
            'houseno' => $this->faker->randomElement([$this->faker->randomNumber(4, false), "New"]),
            'featured' => $this->faker->boolean,
            'openhouse' => $this->faker->boolean,
            'newconstruction' => $this->faker->boolean,
            'reduced_price' => $this->faker->boolean,
            'job_finished' => $this->faker->boolean,
        ];
    }
}
