<?php

namespace App\Models;

//Models
use App\Models\Ticket;

//Carbon 
use Carbon\Carbon;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* a User has many tickets */
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function scopeGetUserTickets($query, $email) {
        
        $user = $query->where('email', '=', $email)->first();

        if(!$user) {
            return null;
        }

        $query = Ticket::with('user')
            ->where('user_id', $user->id)
            ->paginate(10)
            ->through(fn($ticket) => [
                'id' => $ticket->id,
                'subject' => $ticket->subject,
                'publish_date' =>  Carbon::createFromFormat('Y-m-d H:i:s', $ticket->publish_date)
                                        ->format('m/d/Y H:i:s'),
                'name' => $ticket->user->name,
                'email' => $ticket->user->email
            ]);

        if(!$query->count()) {
            return null;
        }

        return $query;
    }
}
