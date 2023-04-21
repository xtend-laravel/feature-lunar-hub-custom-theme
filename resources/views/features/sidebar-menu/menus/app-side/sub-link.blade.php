<a href="{{ route($item->route) }}"
   @class([
       'flex text-sm py-3 pl-12 border-b border-gray-800',
       'text-[#B8A179]' => $active,
       'text-gray-500 hover:text-[#B8A179] border-gray-200' => !$active,
   ])>
    {{ $item->name }}
</a>
