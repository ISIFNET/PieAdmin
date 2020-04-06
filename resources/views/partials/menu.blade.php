@if($builder->visible($item))
    @if(isset($item['is_header']))
        <li class="nav-header">
            {{ $builder->translate($item['title']) }}
        </li>
    @elseif(! isset($item['children']))
        <li class="nav-item">
            <a href="{{ $builder->getUrl($item['uri']) }}" class="nav-link {!! $builder->isActive($item) ? 'active' : '' !!}">
                <i class="fa {{ $item['icon'] ?: 'feather icon-circle' }}"></i>
                <p>
                    {{ $builder->translate($item['title']) }}
                </p>
            </a>
        </li>
    @else
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa {{ $item['icon'] ?: 'feather icon-circle' }}"></i>
                <p>
                    {{ $builder->translate($item['title']) }}
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach($item['children'] as $item)
                    @include('admin::partials.menu', $item)
                @endforeach
            </ul>
        </li>
    @endif
@endif
