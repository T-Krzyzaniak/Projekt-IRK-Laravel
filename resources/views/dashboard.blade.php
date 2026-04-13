<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <img src="{{ asset('storage/Small2O.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover">
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <img src="{{ asset('storage/Small1O.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover">
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <img src="{{ asset('storage/Small3O.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover">

            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <img src="{{ asset('storage/BannerO.jpg') }}" alt="" class="absolute inset-0 h-full w-full object-cover">
    </div>
</x-layouts.app>
