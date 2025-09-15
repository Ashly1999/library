<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'membership_no',
        'address',
        'image',
        'status',
        'join_date',
        'issue_date',
        'due_date',
        'book_id',

    ];
    protected $guarded = [];
    // Each user belongs to a book (optional)
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id'); // user.book_id → book.book_id
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
