<a href="{{route ('user.profile')}}" class="btn btn-primary">Perfil</a>

$('#myTable').DataTable( {
    buttons: [
        'pdf'
    ]
} );

$('#myTable').DataTable( {
    buttons: [
        {
            extend: 'pdf',
            text: 'Save current page',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        }
    ]
} );

// Controller
public function getUsers()
{
    $users = User::select(['id', 'name', 'email', 'phone', 'created_at']);

    return Datatables::of($users)
        ->editColumn('created_at', function ($user) {
            return $user->created_at->format('Y/m/d');
        })
        ->filterColumn('created_at', function ($query, $keyword) {
            $query->whereRaw("DATE_FORMAT(created_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
        })
        ->addColumn('role', function ($user) {
            return '<a class="btn btn-primary" href="#">Admin</a>';
        })
        ->addColumn('action', function ($user) {
            return '<a href="'.route('admin.users.edit', $user->id).'" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
            <a href="'.route('admin.users.destroy', $user->id).'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>';
        })
        ->editColumn('id', 'ID: {{$id}}')
        ->make(true);
}

//View
@section('content')
<table id="users-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Member since</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.datatables.users') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'created_at', name: 'created_at' },
                { data: 'role', name: 'role', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
<strong i="15">@endsection</strong>

Debe especificar las columnas sin formato que tienen contenido html.

Utilice ->rawColumns(['role', 'action'])

Consulte https://yajrabox.com/docs/laravel-datatables/master/raw-columns para ver la ref.

use DataTables;

Route::get('user-data', function() {
    $model = App\User::query();

    return DataTables::eloquent($model)
                ->addColumn('link', '<a href="#">Html Column</a>')
                ->addColumn('action', 'path.to.view')
                ->rawColumns(['link', 'action'])
                ->toJson();
});	
