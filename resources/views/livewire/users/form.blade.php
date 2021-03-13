<div class=" overflow-hidden sm:rounded-md">
  <div class="px-4 py-5 bg-white sm:p-6">
    <div class="grid grid-cols-6 gap-6">
      <div class="col-span-6 sm:col-span-3">
        <label for="first_name" class="block text-sm font-medium text-gray-700">nombre</label>
        <input type="text"
          class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          wire:model="name">
        @error('name') <span  class="text-red-400">{{$message}}</span> @enderror
      </div>
      <fieldset class="col-span-6 sm:col-span-6 lg:col-span-6">
        <label for="postal_code" class="block text-sm font-medium text-gray-700">
          Role
        </label>
        <div class="mt-4 flex ">
            @foreach ($roles as $role)
            <div class="mr-4  flex items-center">
                <input id="{{$role->name}}" name="push_notifications" type="radio"
                                    class="focus:ring-yellow-500 h-4 w-4 text-yellow-600 border-gray-300"
                                    wire:model="role_user" value="{{$role->name}}">
                <label for="{{$role->name}}" class="ml-3 block text-sm font-medium text-gray-700">
                                    {{$role->name}}
                </label>
            </div>
            @endforeach

        </div>
        @error('role_user') <span class="text-red-400">{{$message}}</span> @enderror
      </fieldset>



      <div class="col-span-6 sm:col-span-3">
        <label for="last_name" class="block text-sm font-medium text-gray-700">correo</label>
        <input type="text"
          class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          wire:model="email">
        @error('email') <span  class="text-red-400">{{$message}}</span> @enderror
      </div>

      <div class="col-span-6 sm:col-span-3">
        <label for="last_name" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password"
          class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          wire:model="password">
        @error('password') <span  class="text-red-400">{{$message}}</span> @enderror
      </div>
    </div>
  </div>
</div>
