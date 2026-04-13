<x-layouts.app :title="__('Categories')">
        <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <h1 class="text-2xl font-bold mb-4">{{__('Categories') }}</h1>

        <table class="table-auto w-full border"...>

        <div class="mt-4">
            {{$categories->links()}}
</div>
</div>
</x-layouts.app>