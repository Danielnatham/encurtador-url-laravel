<div>
    <form wire:submit.prevent="saveLink">
        <div class="mb-4">
            <label for="url" class="text-gray-100" >URL</label>
            <x-input wire:model.lazy="url" id="url" class="block my-2 w-full dark:text-gray-800" type="text" placeholder="https://google.com.br" required autofocus />
            @error('url') <span class="text-red-500 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="slug" class="text-gray-100">Slug</label>
            <x-input wire:model.lazy="slug" id="slug" class="block my-2 w-full" type="text" placeholder="minha-nova-slug" />
            @error('slug') <span class="text-red-500 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button
                wire:click="resetForm"
                type="button"
                class="inline-flex items-center px-4 py-2 bg-gray-400 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-100 mr-2"
            >
                Limpar
            </button>
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-500 border rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-100"
            >
                Criar
            </button>
        </div>
    </form>
</div>