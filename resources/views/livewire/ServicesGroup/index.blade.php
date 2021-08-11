<button class="btn btn-primary pull-right" wire:click="add" type="button">اضافة مجموعة خدمات </button><br><br>

<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1">
        <thead>
            <tr>
                <th class="wd-15p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0">{{trans('backend/sections.name_sections')}}</th>
                <th class="wd-15p border-bottom-0">{{trans('backend/sections.description')}}</th>
                <th class="wd-20p border-bottom-0">{{trans('backend/sections.discount')}}</th>
                <th class="wd-20p border-bottom-0">{{trans('backend/sections.total amount')}}</th>
                <th class="wd-15p border-bottom-0">{{trans('backend/sections.Processes')}}</th>
            </tr>
        </thead>
        
        <tbody>
            
            @foreach ($groups as $group)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{$group->name}}</td>
                
                <td>{{\Str::limit($group->description, 50) }}</td>
                
                <td>{{$group->discount}}</td>

                <td>{{$group->totalamount}}</td>

                <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit{{ $group->id }}" title="{{ trans('backend/sections.edit_sections') }}"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete{{ $group->id }}" title="{{ trans('backend/sections.delete_sections') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
    
              
            
            