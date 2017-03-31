<?php

namespace App;

class Subscriber extends BaseModel
{
    public static function newSubscriber($firstName, $lastName, $email, $regionShortcode)
    {
        $subscriber = self::create([
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email
        ]);
        
        return $subscriber;
    }
    
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
