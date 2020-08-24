<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone_number', 'password', 'avatar', 'merchant_online_name', 'bank_name', 'bank_account_number', 'account_active','user_type','current_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // //set all password that to be inserted into incrypted
    // public function setPasswordAttribute($value){
    //     $this->attributes['password'] = bcrypt($value);
    // }
    // //set all name that to be inserted into first letter uppercase
    // public function getNameAttribute($value){
    //     return ucfirst($value);
    // }

    public static function uploadAvatar($image){
        $id = Auth::id();
        $filename = $image->getClientOriginalName();
        
        (new self())->deleteOldImage();

        $image->storeAs($id.'_images',$filename,'public');
        auth()->user()->update(['avatar'=> $filename]);
    }
    
    protected function deleteOldImage(){
        $id = Auth::id();
        if(auth()->user()->avatar){
            // dd('/public/images/'.auth()->user()->avatar);
            Storage::delete('/public/'.$id.'_images/'.auth()->user()->avatar);
        }
    }

    
    public static function uploadMIcon($image){
        $id = Auth::id();
        $filename = $image->getClientOriginalName();
        
        (new self())->deleteOldIcon();

        $image->storeAs('images',$filename,'public');
        auth()->user()->update(['avatar'=> $filename]);
    }
    
    protected function deleteOldIcon(){
        $id = Auth::id();
        if(auth()->user()->avatar){
            // dd('/public/images/'.auth()->user()->avatar);
            Storage::delete('/public/'.'images/'.auth()->user()->avatar);
        }
    }
}
