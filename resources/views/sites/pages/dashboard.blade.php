{{-- @role('Super Admin' || '')
@include('userType.admin.adminDashboard')
@endrole

@role('User')
   @include('userType.user.userDashboard')
@endrole --}}


@hasanyrole('Super Admin|News Manager')
 @include('userType.admin.adminDashboard')
@else
   @include('userType.user.userDashboard')
@endhasanyrole