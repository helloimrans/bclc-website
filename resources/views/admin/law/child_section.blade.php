@foreach ($childs as $child)
    <tr>
        <td>
            {{ $loop->iteration }}
        </td>
        <td>
            {{ $child->title }}
        </td>
        <td>
            {{ @$child->parent->title }}
        </td>
        <td>
            {!! substr(strip_tags($section->description), 0, 50) !!}...
        </td>
        <td>{{ $child->sort }}</td>
        <td>
            @if ($child->status == 1)
                <span class="badge badge-light-success">Active</span>
            @else
                <span class="badge badge-light-warning">Deactive</span>
            @endif
        </td>
        <td>
            <a class="me-1 editSection" hrefjavascript:;" id="{{ $child->id }}" data-bs-toggle="tooltip"
                data-bs-original-title="Edit">
                <i class="far fa-edit text-dark"></i>
            </a>
            <a class="me-1 deleteSection" href="javascript:;" data-bs-toggle="tooltip"
                data-bs-original-title="Delete">
                <i class="far fa-trash-alt text-danger"></i>
            </a>
        </td>
    </tr>

    @if (count($child->childs))
        @include('admin.law.child_section', [
            'childs' => $child->childs,
        ])
    @endif
@endforeach
