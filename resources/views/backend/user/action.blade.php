<div class="d-flex order-actions justify-content-center">
    <a href="{{route('admin.user.show', $model)}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
    <a href="{{route('admin.user.edit', $model)}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
    <a href="{{route('admin.user.destroy', $model)}}" class="btn btn-sm btn-danger mr-1" id="delete" data-table="users-table"><i class="fas fa-trash"></i></a>
</div>
