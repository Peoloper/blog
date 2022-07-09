<div class="d-flex order-actions justify-content-center">
    <a href="{{route('admin.post.show', $model)}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
    @if($model->is_published == 1)
        <a href="{{route('post',  $model->slug)}}" class="btn btn-sm btn-dark  mr-1"><i class="fas fa-link"></i></a>
    @endif
    @if(auth()->user()->can('edycja wszystkich postów') || $model->user_id == auth()->id() && auth()->user()->can('edycja własnych postów') )
        <a href="{{route('admin.post.edit', $model)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
    @endif
    @can('usuwanie postów')
        <a href="{{route('admin.post.destroy', $model)}}" class="btn btn-sm btn-danger mr-1" id="delete" data-table="post-table"><i class="fas fa-trash"></i></a>
    @endcan
</div>
