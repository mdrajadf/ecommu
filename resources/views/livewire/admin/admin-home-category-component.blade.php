<div>
    <style>
        nav svg {
            height: 20px;

        }
        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Home Categories
                        {{-- <div class="row">
                            <div class="col-md-6">All Categories</div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Choose Category</label>
                                <div class="col-md-4" wire:ignore>
                                    <select name="categories[]" id="" class="sel-categories form-control" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No Of Products</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" wire:model="numberofproducts">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" name="" id="" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        {{-- @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <a href="{{ route('admin.editcategory', ['category_slug'=>$category->slug]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.sel-categories').select2();
            $('.sel-categories').on('change', function(e) {
                var data = $('.sel-categories').select2('val');
                @this.set('selected_categories', data);
            });
        });
    </script>
@endpush
