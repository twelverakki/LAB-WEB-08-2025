<a {{$attributes}}
    class="{{ $active ? 'text-white bg-[#ffc83e] rounded-sm md:bg-transparent md:text-[#ffc83e] md:p-0' : 'text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#ffc83e] md:p-0'}} block py-2 px-3" aria-current="{{ $active ? 'page' : false }}">
    {{$slot}}
</a>