@extends('main.template')

@section('head-section')
    <!-- Datatables -->

	<script src="{{asset('atlantis/examples')}}/assets/js/plugin/datatables/datatables.min.js"></script>
@endsection

@section('main')
<div class="container-fluid">
    <div class="mt-5 px-4">
        @include('blog.breadcumb')
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">

            <div class="col-12 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Blog Posts</span>
                <h3 class="page-title">Manage Blog Milik {{ Auth::user()->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                        @if(session() -> has('success'))
                        <div class="alert alert-primary alert-dismissible fade show mx-2 my-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>

                        <script>
                            var notify = $.notify('<strong>Saving</strong> Do not close this page...', { allow_dismiss: false });
                            notify.update({ type: 'success', '<strong>Success</strong> Your page has been saved!' });
                        </script>

                            <strong>{{Session::get( 'success' )}}</strong>
                        </div>


                        @elseif(session() -> has('error'))

                        <div class="alert alert-primary alert-dismissible fade show mx-2 my-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>{{Session::get( 'error' )}}</strong>  You should check in on some of those fields below.

                        @endif




                    <div class="card-body">
                        <a href="{{ url('blog/create') }}" >   <button class="btn btn-primary btn-border btn-round mb-3">Buat Blog</button></a>
                        <table id="basic-datatables" class="table table-bordered table-responsive       @if (count($blogs) < 1)
                        d-none
                      @endif">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">JUDUL</th>
                                <th scope="col">CONTENT</th>
                                <th scope="col">PENULIS</th>
                                <th scope="col">KATEGORI</th>
                                <th scope="col">AKSI</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($blogs as $blog)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{asset($blog->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $blog->title }}</td>
                                    <td> <a href="{{route('blog.show',$blog->id)}}">
                                        <button type="button" class="btn btn-outline-primary">Baca Blog</button>
                                    </a></td>
                                    <td>{{ $blog->user_id}}</td>
                                    @php
                                    $cat = $blog->category;
                                    $each_cat = implode('', (array)$cat);

                                    @endphp
                                    <td>{{  $each_cat }}</td>
                                    <td class="text-center">
                                        <form id="delete-post-form" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button  onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger ">HAPUS</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Blog belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- {{ $blogs->links() }} --}}
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).on('click', '.button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                type: "POST",
                url: "{{url('/destroy')}}",
                data: {id:id},
                success: function (data) {
                              //
                    }
            });
    });
});

</script>
{{-- Toastr --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Datatables -->
<script src="{{asset('atlantis/examples')}}/assets/js/plugin/datatables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>


<script>
//message with toastr
@if(session()-> has('success'))
    toastr.success('{{ session('success') }}', 'BERHASIL!');
@elseif(session()-> has('error'))
    toastr.error('{{ session('error') }}', 'GAGAL!');
@endif
</script>


@endsection



