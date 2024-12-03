{{-- props = untuk ngasih tau kita punya properti untuk component ini --}}
@props(['active' => false])

{{-- $attributes = apapun yang dituliskan didalam component nya akan di marge/digabungkan kedalam componentnya/tag aslinya --}}
<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} 
    rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    {{ $slot }}
</a>
