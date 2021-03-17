<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\User;
use App\Models\Upload;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Combination of user_id and upload_id
     *
     * @var array
     */
    static $combo;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        static::$combo = static::$combo ?: [];

        return $this->afterMaking(function (Like $like) {
            do {
                $user_id = User::inRandomOrder()->first()->id;
                $upload_id = Upload::inRandomOrder()->first()->id;
            } while(Like::where(compact('user_id', 'upload_id'))->first() || in_array([$user_id, $upload_id], static::$combo));

            static::$combo[]=[$user_id, $upload_id];
            $like->fill(compact('user_id', 'upload_id'));
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
        ];
    }
}
