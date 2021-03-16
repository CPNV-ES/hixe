<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
        return $this->users()->where('role_id', 1);
    }

    public function participants()
    {
        return $this->users()->where('role_id', '!=', 1);
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
        return $this->belongsToMany(Equipment::Class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::Class);
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
