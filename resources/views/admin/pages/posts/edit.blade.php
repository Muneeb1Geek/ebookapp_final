@extends("admin.admin_app")

@section("content")

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                 
                
                 {{-- {!! Form::open(array('url' => array('admin/sub_admin/add_edit'),'class'=>'form-horizontal','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}   --}}
                  <form action="#" method="POST">

                  
                  <input type="hidden" name="id" value="{{$post->id}}">
                  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.post_edit')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="post_text" value="{{$post->post_text ?? ""}}" class="form-control">
                    </div>
                  </div>

                  @if(isset($post->post_image) AND file_exists(public_path('posts/images/'.$post->post_image))) 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Current Image</label>
                    <div class="col-sm-8">                             
                           <img src="{{URL::to('posts/images/'.$post->post_image)}}" alt="Image" class="img-thumbnail" width="140">                        
                    </div>
                  </div>
                  @endif                  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.post_image')}}</label>
                    <div class="col-sm-8">
                      <input type="file" name="user_image" class="form-control">                     
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9 pl-1">
                      <button type="button" class="btn btn-primary waves-effect waves-light"> Update </button>                      
                    </div>
                  </div>
                </form>
                {{-- {!! Form::close() !!}  --}}
              </div>
            </div>            
          </div>              
        </div>
      </div>
      @include("admin.copyright") 
    </div> 
    <script type="text/javascript">
    
    @if(Session::has('flash_message'))     
 
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
        /*didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }*/
      })

      Toast.fire({
        icon: 'success',
        title: '{{ Session::get('flash_message') }}'
      })     
     
  @endif

  @if (count($errors) > 0)
                  
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<p>@foreach ($errors->all() as $error) {{$error}}<br/> @endforeach</p>',
            showConfirmButton: true,
            confirmButtonColor: '#10c469',
            background:"#1a2234",
            color:"#fff"
           }) 
  @endif

  </script>    

@endsection