<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;

class Room extends Model
{
    /**
     * Empty guarded fields
     */
    protected $guarded = [];

    /**
     * Eloquent with Booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Get bookings data
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @param $name
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public static function createPermalink($name, $id = 0)
    {
        // Normalize the name
        $slug = str_slug($name);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = self::getRelatedPermalink($slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique permalink');
    }

    protected static function getRelatedPermalink($slug, $id = 0)
    {
        return self::select('permalink')->where('permalink', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
