<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $coutry;
    public $zipcode;
    public $new_image;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->profile->name;
        $this->email = $user->profile->email;
        $this->mobile = $user->profile->mobile;
        $this->image = $user->profile->image;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->province = $user->profile->province;
        $this->coutry = $user->profile->coutry;
        $this->zipcode = $user->profile->zipcode;
    }

    public function updateProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();

        $user->profile->mobile = $this->mobile;
        if ($this->new_image)
        {
            if ($this->image)
            {
                unlink('assets/images/profiles/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('profiles', $imageName);
            $user->profile->image = $imageName;
        }
        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->province = $this->province;
        $user->profile->country = $this->country;
        $user->profile->zipcode = $this->zipcode;
        $user->save();
        session()->flash('message', 'Profile has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.user.user-edit-profile-component')->layout('layouts.base');
    }
}
