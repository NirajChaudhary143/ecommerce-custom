@extends('admin.adminPanel')

@section('main-section')
    <div class="user-title">
        Store Users
    </div>
    <div class="user-table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th width="40px">S.N</th>
                    <th width="500px">Name</th>
                    <th>Role</th>
                    <th>Added At</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tr>
                    <td>1</td>
                    <td style="display: flex; align-items:center">
                        <div class="profilePic">
                            <img src="{{asset($user->user_profile)}}" alt="" srcset="">
                        </div>
                        <div class="user-detail">
                            <div  style="text-transform:capitalize; font-weight:bold">
                                {{$user->name}}
                            </div>
                            <div style="text-transform: lowercase; font-size:10px; color: rgb(94 98 102); margin-top:-7px">
                                {{$user->email}}
                            </div>
                        </div>
                    </td>
                    <td>@foreach ($user->roles as $role)
                        <div class="roleDiv">
                            {{$role->name}}                            
                        </div>
                    @endforeach</td>
                    <td>{{$user->created_at->format('m-d-y')}} (m-d-y)</td>
                    <td></td>
                </tr>
                
        </table>
    </div>
@endsection