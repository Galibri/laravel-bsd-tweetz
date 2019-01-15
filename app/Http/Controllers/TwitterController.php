<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twitter;
use File;

class TwitterController extends Controller
{
    private $count = 10;
    private $format = 'array';
    /**
     * Return the view of twetts timeline
     *
     * @return view
     */
    public function twitterUserTimeline() 
    {
        $data = Twitter::getUserTimeline([
            'count' => $this->count,
            'format' => $this->format,
        ]);
        return view('twitter', compact('data'));
    }

    public function tweet(Request $request) {
        $this->validate($request, [
            'tweet' => 'required'
        ]);

        $newTweet = ['status' => $request->tweet];

        if(!empty($request->images)) {
            foreach($request->images as $key => $value) {
                $uploadedMedia = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
                if(!empty($uploadedMedia)) {
                    $newTweet['media_ids'][$uploadedMedia->media_id_string] = $uploadedMedia->media_id_string;
                }
            }
        }

        $twitter = Twitter::postTweet($newTweet);
        return back();
    }
}
