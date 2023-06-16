<div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="pull-left">
                <button class="btn btn-success" data-toggle="modal" wire:click="openModal" data-target="#myModal">Create New User</button>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="pull-right">
                <input wire:model="search" type="text" class="form-control form-control-md" placeholder="Search by name or email">
            </div>
        </div>
    </div>
    
    <div wire:ignore.self class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
    
        <!-- Modal content -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalTitle">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="open = false">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submitForm">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input wire:model="name" type="text" class="form-control" id="username" placeholder="Enter full name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input wire:model="email" type="email" class="form-control" id="email" placeholder="Enter email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input wire:model="password" type="password" class="form-control" id="password" placeholder="Enter password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="passwordConfirmation">Retype Password</label>
                            <input wire:model="passwordConfirmation" type="password" class="form-control" id="passwordConfirmation" placeholder="Retype password">
                            @error('passwordConfirmation') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!-- Add more form fields as needed -->
    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="open = false">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                @php
                    $i=0;
                @endphp
                    @foreach ($users as $key => $userItem)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $userItem->name }}</td>
                            <td>{{ $userItem->email }}</td>
                            <td>
                                @if (!empty($userItem->getRoleNames()))
                                    @foreach ($userItem->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                            <button class="btn btn-sm" data-toggle="modal" wire:click="openStatusModal({{ $userItem->id }})" data-target="#statusModal">
                                @if ($userItem->status == 0)
                                <span class="badge badge-success">Approved</span>
                            @else
                                <span class="badge badge-danger">Banned</span>
                            @endif
                            </button>
                               
                            </td>
                            <td>
                               
                                <button wire:click="editPost({{ $userItem->id }})" class="btn btn-primary"> <i class="far fa-edit"></i></button>
                                <button onclick="deletePost({{ $userItem->id }})" class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" align="center">
                            No users Found.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
    <!-- Example modal for updating user status -->
  <!-- Example modal for updating user status -->
<div wire:ignore.self class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">

    <!-- Modal content -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Update User Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateStatus">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select wire:model="status" class="form-control" id="status">
                            <option value="" selected></option>
                            <option value="0">Approved</option>
                            <option value="1">Banned</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script>
        document.addEventListener('alert', event => {
            Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    toast: true,
                    title: 'add user success!',
                    showConfirmButton: false,
                    timer: 3000
                })
                console.log("okay");
                $('#myModal').modal('hide');
                $('#statusModal').modal('hide');
                $('.modal-backdrop').removeAttr('class');
                });
    </script>
</div>
