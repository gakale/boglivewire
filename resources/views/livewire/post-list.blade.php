<div  class="px-3 py-6 lg:px-7">

    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="text-gray-600">
            @if($search)
                Searching {{$search }}
            @endif
        </div>
        <div  class="flex items-center space-x-4 font-light ">
            <button wire:click="setSort('asc')" class=" {{ $sort === 'asc' ? 'border-b border-gray-700' : ' text-gray-500' }} py-4">Latest</button>
            <button wire:click="setSort('desc')" class=" {{ $sort === 'desc' ? 'border-b border-gray-700' : 'text-gray-500' }} py-4 ">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-post.post-item :post="$post" />
        @endforeach
    </div>
</div>

    <div class="my-3">
        {{ $this->posts->links() }}
    </div>

