<x-layouts.app :title="__('Uzytkownicy')">
<!-- Table responsive wrapper -->
<div class="overflow-x-auto bg-white dark:bg-neutral-700">

  <!-- Table -->
  <table class="min-w-full text-left text-sm whitespace-nowrap">

    <!-- Table head -->
    <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600 bg-neutral-50 dark:bg-neutral-800">
      <tr>
        <th scope="col" class="px-6 py-3">
          Id <flux:button href="{{route('uzytkownicy.index',['sortBy' => 'id', 'sortDirection' => $sortDirection === 'asc' ? 'desc' : 'asc',]) }}" size="xs" icon="bars-2"></flux:button>
        </th>
        <th scope="col" class="px-6 py-3">
          Imie/Nazwisko <flux:button href="{{route('uzytkownicy.index',['sortBy' => 'name', 'sortDirection' => $sortDirection === 'asc' ? 'desc' : 'asc',]) }}" size="xs" icon="bars-2"></flux:button>
        </th>
        <th scope="col" class="px-6 py-3">
          e-mail <flux:button href="{{route('uzytkownicy.index',['sortBy' => 'email', 'sortDirection' => $sortDirection === 'asc' ? 'desc' : 'asc',]) }}" size="xs" icon="bars-2"></flux:button>
        </th>
        <th scope="col" class="px-6 py-3">
          Rola
        </th>
      </tr>
    </thead>

    <!-- Table body -->
    <tbody>

     @foreach($user as $users)
        <tr class="border-b dark:border-neutral-600">
          <th scope="row" class="px-6 py-3">{{ $users->id }}</th>
          <td class="px-6 py-3">{{ $users->name }}</td>
          <td class="px-6 py-3">{{ $users->email }}</td>
          <td class="px-6 py-3">
            <div class="inline-flex">

              <flux:button.group>
                @foreach($roles as $role)
  <form method ="POST" action="{{ route('uzytkownicy.update-role', $users) }}">
  @csrf
  <flux:button
  type="submit"
  name="role"
  value="{{ $role->value }}"
  variant="{{ $users->hasRole($role->value) ? 'primary' : 'filled' }}"
  size="xs">
  {{$role->value }}
</flux:button>
</form>
    @endforeach
</flux:button.group>
</td>
</tr>
@endforeach
    </tbody>
  </table>
  <div class="mt-4">
{{$user->links()}}
</div>
</x-layouts.app>
