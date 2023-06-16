<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;
   // public $isOpen = false; // New property to control modal visibility
    public $status;
    public $statusUserId;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'passwordConfirmation' => 'required|same:password',
    ];

    public function render()
    {
        $query = User::orderBy('id', 'DESC');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        $users = $query->paginate(10);
      
        return view('livewire.users', compact('users'));
    }

    public function submitForm()
    {
        $this->validate();

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();
        $this->resetForm();
       // $this->isOpen = false; // Close the modal after form submission
        // Show a success message using Toastr.js
        $this->dispatchBrowserEvent('alert', ['message' =>'add user success']);
        $this->dispatchBrowserEvent('removeModalBackdrop',['id'=>'#myModal']); 
    }

    public function openModal()
    {
        $this->resetForm();
       // $this->isOpen = true; // Open the modal
      
    }
    
    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->passwordConfirmation = '';
        $this->resetValidation();
      
    }
    public function openStatusModal($userId)
    {
        $this->statusUserId = $userId;
      //  $this->isOpen = true;
    }
    public function updateStatus()
    {
        $user = User::findOrFail($this->statusUserId);
        $user->status = $this->status;
        $user->save();

     //   $this->isOpen = false;

        // Show a success message using Toastr.js or any other notification library
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'User status updated successfully!']);
       // $this->dispatchBrowserEvent('removeModalBackdrop',['id'=>'#statusModal']);
    }
   
}
