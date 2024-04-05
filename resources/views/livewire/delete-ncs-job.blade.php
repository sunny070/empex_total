<div class="textd-center">
    <button wire:click="toggleDeleteDialog({{$jobId}})" class="px-4 py-1 font-medium text-red-600 hover:text-red-500">Delete</button>
    <x-jet-dialog-modal wire:model="deleteDialog">
    <x-slot name="title">Confirmation</x-slot>
    <x-slot name="content">Are you sure you want to delete this news?</x-slot>
    <x-slot name="footer">
        <button wire:click="deleteJob" class="px-4 text-red-600 hover:text-red-500">Yes</button>
        <button wire:click="cancelDelete" class="px-4 text-green-600 hover:text-green-500">No</button>
    </x-slot>
  </x-jet-dialog-modal>
</div>
