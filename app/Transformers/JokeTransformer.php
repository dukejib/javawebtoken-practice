<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Joke;

class JokeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Joke $joke)
    {
        return [
            //Get the Joke
            'id' => $joke->id,
            'title' => $joke->title,
            'joke' => $joke->joke,
            'created_on' => $joke->created_at->toFormattedDateString(),
            // 'creator' => $joke->user
            'creator' => fractal($joke->user,new UserTransformer),
            'likes' => fractal($joke->likes,new LikeTransformer)
        ];
    }
}
