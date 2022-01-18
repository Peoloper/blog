<div class="d-flex order-actions justify-content-center">
    <a href="{{route('admin.post.show', $model)}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
    <a href="" class="btn btn-sm btn-dark  mr-1"><i class="fas fa-link"></i></a>
    @if(auth()->user()->can('edit all posts') || $model->user_id == auth()->id() && auth()->user()->can('edit own posts') )
        <a href="{{route('admin.post.edit', $model)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
    @endif
    @can('delete posts')
        <a href="{{route('admin.post.destroy', $model)}}" class="btn btn-sm btn-danger mr-1" id="delete" data-table="post-table"><i class="fas fa-trash"></i></a>
    @endcan
</div>
