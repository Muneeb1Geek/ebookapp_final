@extends("admin.admin_app")

@section("content")

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">
                          
                {{-- <div class="col-md-3">
                  <a href="{{URL::to('admin/pages/add')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20" data-toggle="tooltip" title="{{trans('words.add_page')}}"><i class="fa fa-plus"></i> {{trans('words.add_page')}}</a>
                </div> --}}
              </div>

                @if(Session::has('error'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>{{trans('words.post_text')}}</th>
                      <th>{{trans('words.post_image')}}</th>
                      <th>{{trans('words.no_of_likes')}}</th>
                      <th>{{trans('words.no_of_comments')}}</th>
                      <th>{{trans('words.user')}}</th>
                      <th>{{trans('words.action')}}</th>
                    </tr>
                  </thead>
                  <tbody>              
                    @foreach ($posts as $item)
                    <tr>
                        <td>{{$item->post_text}}</td>
                        <td>
                          <a href="{{asset('posts/images/' . $item->post_image)}}" target="_blank">View Image</a>
                        </td>
                        <td>{{count($item->likes)}}</td>
                        <td>{{count($item->comments)}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>
                            
                          <a href="{{url('admin/post/edit/' . $item->id)}}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                          <a href="#" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 m-r-5 data_remove" data-toggle="tooltip" data-id="{{$item->id}}" title="{{trans('words.delete')}}"> <i class="fa fa-trash"></i> </a>  
                        
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

                {{-- <nav class="paging_simple_numbers">
                @include('admin.pagination', ['paginator' => $pages_list]) 
                </nav> --}}
           
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright") 
    </div>

<script src="{{ URL::asset('admin_assets/js/jquery.min.js') }}"></script>
 
 <!-- SweetAlert2 -->
 <script src="{{ URL::asset('admin_assets/js/sweetalert2@11.js') }}"></script>
  
<script>
  $(".data_remove").click(function () {  
   
   var post_id = $(this).data("id");
   var action_name='post_delete';
 
   Swal.fire({
     title: '{{trans('words.dlt_warning')}}',
   text: "{{trans('words.dlt_warning_text')}}",
   icon: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '{{trans('words.dlt_confirm')}}',
   cancelButtonText: "{{trans('words.btn_cancel')}}",
   background:"#1a2234",
   color:"#fff"
 
 }).then((result) => {
  
     if(result.isConfirmed) { 
 
         $.ajax({
             type: 'post',
             url: "{{ URL::to('admin/ajax_delete') }}",
             dataType: 'json',
             data: {"_token": "{{ csrf_token() }}",id: post_id, action_for: action_name},
             success: function(res) {
 
               if(res.status=='1')
               {  
 
                  //  var selector = "#post_id_"+post_id;
                  //    $(selector ).fadeOut(1000);
                  //    setTimeout(function(){
                  //            $(selector ).remove()
                  //        }, 1000);
 
                  //  Swal.fire({
                  //    position: 'center',
                  //    icon: 'success',
                  //    title: '{{trans('words.deleted')}}!',
                  //    showConfirmButton: true,
                  //    confirmButtonColor: '#10c469',
                  //    background:"#1a2234",
                  //    color:"#fff"
                  //  });

                   location.reload();
                 
               } 
               else
               { 
                 Swal.fire({
                         position: 'center',
                         icon: 'error',
                         title: 'Something went wrong!',
                         showConfirmButton: true,
                         confirmButtonColor: '#10c469',
                         background:"#1a2234",
                         color:"#fff"
                        })
               }
               
             }
         });
     }
  
 })
 
 });
</script>

@endsection