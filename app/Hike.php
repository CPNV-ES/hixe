<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Hike extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'meeting_location', 'meeting_date', 'beginning_date', 'ending_date', 'min_num_participants', 'max_num_participants', 'difficulty', 'additional_info', 'drop_in_altitude'
    ];

    #region --- Eloquent relationships ---

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role_id');
    }

    public function guides()
    {
        return $this->users()->where('hike_user.role_id', 1); // Avoid ambiguous relations
    }

    public function participants()
    {
        return $this->users()->where('hike_user.role_id', '!=', 1); // Avoid ambiguous relations
    }

    public function destinations()
    {
        return $this->belongsToMany(Destination::class)->withPivot('order');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function type()
    {
        return $this->belongsTo(HikeType::class);
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }

    /*
    This function returns true if it's possible to be registered to an hike. Here's the conditions :
        - The maximum number of participants is not reached
        - The start date is in the future
    */
    public function couldBeRegistered(){
        // Get dates in carbon format
        $meeting_date = Carbon::createFromFormat("Y-m-d H:i:s", $this->meeting_date); 
        $now = Carbon::createFromFormat("Y-m-d H:i:s", Carbon::now());

        // Tests
        $is_max_participants_reached = $this->participants()->count() <= $this->max_num_participants;
        $is_meeting_date_in_future = $meeting_date->greaterThan($now);

        return $is_max_participants_reached && $is_meeting_date_in_future;
    }


    /**
     * Get hikes between two dates
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param int $start_date
     * @param int $end_date
     * @return void
     */
    public function scopeBetween($query, int $start_timestamp, int $end_timestamp) {
        $start_date = date('Y-m-d H:i:s', $start_timestamp);
        $end_date = date('Y-m-d H:i:s', $end_timestamp);
    
        return $query->where('beginning_date', '>=', $start_date)->where('ending_date', '<=',$end_date);
    }

    /**
     * @param Builder $query
     * @param string $search_query  The search query that will be used to match against participants firstnames and lastnames
     * 
     * @return Builder
     */
    public function scopeWithParticipants(Builder $query, string $search_query) {
        $query->whereHas('participants', function ($q) use ($search_query) {
            // Split The search query into multiple needles
            $needles = explode(' ', $search_query);

            if ($needles) {
                foreach($needles as $needle) {
                    $q = $q->where('firstname', 'like', "%{$needle}%")->orWhere('lastname', 'like', "%{$needle}%");
                }
            } else {
                $q->where('firstname', 'like', "%{$search_query}%")->orWhere('lastname', 'like', "%{$search_query}%");
            }

            return $q;
        });

        return $query;
    }

    #endregion
    #region --- Business ---
    public function isOpen() {
        return $this->state->id <= 2; // TODO Make it right using slugs
    }

    /**
     * Tells if a training is required for this hike
     * @param Training $t
     * @return false|int|string
     */
    public function trainingIsRequired (Training $t)
    {
        return array_search($t->id, $this->trainings()->pluck('trainings.id')->toArray()) !== FALSE;
    }

    /**
     * Tells if a piece of equipment is required for this hike
     * @param Equipment $t
     * @return false|int|string
     */
    public function equipmentIsRequired (Equipment $e)
    {
        return array_search($e->id, $this->equipment()->pluck('equipment.id')->toArray()) !== FALSE;
    }

    /**
     * Define the user with id = $gid as the sole guide of the hike
     * @param $gid
     */
    public function setOneGuide($gid)
    {
        $this->guides()->detach();
        $this->guides()->attach($gid, ['role_id' => 1]);
    }
    #endregion
}
