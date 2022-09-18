<x-filament::form wire:submit.prevent="onEditEventSubmit">
    <x-filament::modal id="fullcalendar--edit-event-modal" :width="$this->getModalWidth()">
        <x-slot name="header">
            <x-filament::modal.heading>
                {{ $this->getEditModalTitle() }}
            </x-filament::modal.heading>
        </x-slot>

        @if($this->isListeningCancelledEditModal())
            <div x-on:close-modal.window="if ($event.detail.id === 'fullcalendar--create-event-modal') Livewire.emit('cancelledFullcalendarEditEventModal')"></div>
        @endif

        {{ $this->editEventForm }}

        <x-slot name="footer">
            @if(!$this->editEventForm->isDisabled())
                <x-filament::button type="submit" form="onEditEventSubmit">
                    {{ $this->getEditModalSubmitButtonLabel() }}
                </x-filament::button>
            @endif

            @if($this->isListeningCancelledEditModal())
                <x-filament::button color="secondary"
                                    x-on:click="isOpen = false; Livewire.emit('cancelledFullcalendarEditEventModal')">
                    {{ $this->getEditModalCloseButtonLabel() }}
                </x-filament::button>
            @else
                <x-filament::button color="secondary" x-on:click="isOpen = false">
                    {{ $this->getEditModalCloseButtonLabel() }}
                </x-filament::button>
            @endif
        </x-slot>
    </x-filament::modal>
</x-filament::form>
