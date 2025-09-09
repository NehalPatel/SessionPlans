@php
    use Filament\Support\Facades\FilamentAsset;
    use Guava\Calendar\Enums\Context;
    use Filament\Support\Facades\FilamentColor;
    use Filament\Support\View\Components\ButtonComponent;
@endphp

<x-filament-widgets::widget>
    <x-filament::section
        :after-header="$this->getCachedHeaderActionsComponent()"
        :footer="$this->getCachedFooterActionsComponent()"
    >

        <style>
            .ec-event.ec-preview,
            .ec-now-indicator {
                z-index: 30;
            }
            
            /* Fix for calendar header button visibility */
            .ec-toolbar button {
                position: relative !important;
                z-index: 10 !important;
                background: transparent !important;
                border: 1px solid rgba(156, 163, 175, 0.5) !important;
                color: rgb(75, 85, 99) !important;
                padding: 6px 12px !important;
                border-radius: 6px !important;
                margin: 0 2px !important;
                cursor: pointer !important;
                white-space: nowrap !important;
                overflow: visible !important;
                font-size: 14px !important;
                font-weight: 500 !important;
                line-height: 1.5 !important;
                transition: all 0.2s ease !important;
            }
            
            .ec-toolbar button:hover {
                background: rgba(243, 244, 246, 0.8) !important;
                border-color: rgba(156, 163, 175, 0.8) !important;
                color: rgb(17, 24, 39) !important;
            }
            
            .ec-toolbar button.ec-active {
                background: rgb(59, 130, 246) !important;
                border-color: rgb(59, 130, 246) !important;
                color: white !important;
            }
            
            .ec-toolbar button.ec-active:hover {
                background: rgb(37, 99, 235) !important;
                border-color: rgb(37, 99, 235) !important;
                color: white !important;
            }
            
            .ec-toolbar {
                position: relative !important;
                z-index: 5 !important;
                padding: 10px 0 !important;
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                gap: 8px !important;
            }
            
            .ec-toolbar .ec-title {
                font-size: 18px !important;
                font-weight: 600 !important;
                color: rgb(17, 24, 39) !important;
            }
            
            .ec-header {
                position: relative !important;
                z-index: 1 !important;
                background: white !important;
            }
            
            /* Dark mode support */
            .dark .ec-toolbar button {
                border-color: rgba(75, 85, 99, 0.5) !important;
                color: rgb(209, 213, 219) !important;
            }
            
            .dark .ec-toolbar button:hover {
                background: rgba(55, 65, 81, 0.8) !important;
                border-color: rgba(75, 85, 99, 0.8) !important;
                color: white !important;
            }
            
            .dark .ec-toolbar .ec-title {
                color: white !important;
            }
            
            .dark .ec-header {
                background: rgb(17, 24, 39) !important;
            }
        </style>

        @if($heading = $this->getHeading())
            <x-slot name="heading">
                {{ $this->getHeading() }}
            </x-slot>
        @endif

        <div
            wire:ignore
            x-load
            x-load-src="{{ FilamentAsset::getAlpineComponentSrc('calendar', 'guava/calendar') }}"
            x-data="calendar({
                view: @js($this->getCalendarView()),
                locale: @js($this->getLocale()),
                firstDay: @js($this->getFirstDay()),
                dayMaxEvents: @js($this->getDayMaxEvents()),
                eventContent: @js($this->getEventContentJs()),
                eventClickEnabled: @js($this->isEventClickEnabled()),
                eventDragEnabled: @js($this->isEventDragEnabled()),
                eventResizeEnabled: @js($this->isEventResizeEnabled()),
                noEventsClickEnabled: @js($this->isNoEventsClickEnabled()),
                dateClickEnabled: @js($this->isDateClickEnabled()),
                dateSelectEnabled: @js($this->isDateSelectEnabled()),
                datesSetEnabled: @js($this->isDatesSetEnabled()),
                viewDidMountEnabled: @js($this->isViewDidMountEnabled()),
                eventAllUpdatedEnabled: @js($this->isEventAllUpdatedEnabled()),
                hasDateClickContextMenu: @js($this->hasContextMenu(Context::DateClick)),
                hasDateSelectContextMenu: @js($this->hasContextMenu(Context::DateSelect)),
                hasEventClickContextMenu: @js($this->hasContextMenu(Context::EventClick)),
                hasNoEventsClickContextMenu: @js($this->hasContextMenu(Context::NoEventsClick)),
                resources: @js($this->getResourcesJs()),
                resourceLabelContent: @js($this->getResourceLabelContentJs()),
                theme: @js($this->getTheme()),
                options: @js($this->getOptions()),
                eventAssetUrl: @js(FilamentAsset::getAlpineComponentSrc('calendar-event', 'guava/calendar')),
            })"
            @class(FilamentColor::getComponentClasses(ButtonComponent::class, 'primary'))
        >
            <div data-calendar></div>
            @if($this->hasContextMenu())
                <x-guava-calendar::context-menu/>
            @endif
        </div>
    </x-filament::section>
        <x-filament-actions::modals/>
</x-filament-widgets::widget>
